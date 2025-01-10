<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Adapter\Local;
use Request;

class BackupController extends Controller
{
    public function index()
    {
        Gate::authorize('backup.index');

        if (! count(config('backup.backup.destination.disks'))) {
            dd(trans('backpack::backup.no_disks_configured'));
        }

        $this->data['backup'] = [];

        foreach (config('backup.backup.destination.disks') as $disk_name) {
            $disk = Storage::disk($disk_name);
            $adapter = $disk->getAdapter();
            $files = $disk->allFiles();

            // make an array of backup files, with their filesize and creation date
            foreach ($files as $k => $f) {
                // only take the zip files into account
                if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                    $this->data['backup'][] = [
                        'file_path' => $f,
                        'file_name' => str_replace('backup/', '', $f),
                        'file_size' => $disk->size($f),
                        'last_modified' => $disk->lastModified($f),
                        'disk' => $disk_name,
                        'download' => ($adapter instanceof Local) ? true : false,
                    ];
                }
            }
        }

        // reverse the backup, so the newest one would be on top
        $data['backups'] = array_reverse($this->data['backup']);

        return view('backend.backup.index', $data);
    }

    public function create()
    {
        Gate::authorize('backup.create');
        try {
            // start the backup process
            Artisan::call('backup:run');
            $output = Artisan::output();
            flash()->addSuccess('Database Backup create Successfully');

            return redirect()->back();
        } catch (\Exception $e) {
            Response::error($e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Downloads a backup zip file.
     */
    public function download()
    {
        Gate::authorize('backup.download');

        $disk = Storage::disk(Request::input('disk'));
        $file_name = Request::input('file_name');
        $adapter = $disk->getAdapter();

        if ($adapter instanceof Local) {
            $storage_path = $disk->getAdapter()->getPathPrefix();

            if ($disk->exists($file_name)) {
                return response()->download($storage_path.$file_name);
            } else {
                flash()->addWarning('This Backup file does not exists');

                return redirect()->back();
            }
        } else {
            flash()->addWarning('This Backup file does not exists');

            return redirect()->back();
        }
    }

    /**
     * Deletes a backup file.
     */
    public function delete($file_name)
    {

        Gate::authorize('backup.destroy');

        $filepath = Storage::disk('public')->url($file_name);
        if (($filepath)) {
            Storage::disk('public')->delete($file_name);
            flash()->addSuccess('Your Backup file Delete Successfully', 'Backup file Deleted');

            return redirect()->back();
        } else {
            notify()->warning('This Backup file does not exists', 'File does\'nt Exists');

            return redirect()->back();
        }

        /*
         * old format
         *
         *  $disk = Storage::disk(Request::input('disk'));
         if ($disk->exists($file_name)) {
             $disk->delete($file_name);
              flash()->addSuccess('Your Backup file Delete Successfully', 'Backup file Deleted');
             return redirect()->back();
         } else {
             notify()->warning('This Backup file does not exists', 'File does\'nt Exists');
             return redirect()->back();
         }*/
    }
}
