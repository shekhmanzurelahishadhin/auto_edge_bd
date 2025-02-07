<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    /**
     * Display a list of backup files.
     */
    public function index()
    {
        Gate::authorize('backup.index');

        // Check if backup disks are configured
        if (!count(config('backup.backup.destination.disks'))) {
            dd(trans('backpack::backup.no_disks_configured'));
        }

        $backups = [];

        // Loop through configured disks and gather backup files
        foreach (config('backup.backup.destination.disks') as $disk_name) {
            $disk = Storage::disk($disk_name);
            $adapter = $disk->getAdapter();
            $files = $disk->allFiles();

            // Collect backup files (only .zip files)
            foreach ($files as $file) {
                if (substr($file, -4) == '.zip' && $disk->exists($file)) {
                    $backups[] = [
                        'file_path' => $file,
                        'file_name' => str_replace('backup/', '', $file),
                        'file_size' => $disk->size($file),
                        'last_modified' => $disk->lastModified($file),
                        'disk' => $disk_name,
                        'download' => ($adapter instanceof \League\Flysystem\Local\LocalFilesystemAdapter),
                    ];
                }
            }
        }

        // Reverse the backups array to show the newest first
        $data['backups'] = array_reverse($backups);

        return view('backend.backup.index', $data);
    }

    /**
     * Create a new backup.
     */
    public function create()
    {
        Gate::authorize('backup.create');

        try {
            // Run the backup command
            Artisan::call('backup:run');
            $output = Artisan::output();

            // Flash a success message
            flash()->addSuccess('Database Backup created successfully.');

            return redirect()->back();
        } catch (\Exception $e) {
            // Log the error and flash an error message
            \Log::error('Backup failed: ' . $e->getMessage());
            flash()->addError('Backup failed: ' . $e->getMessage());

            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Download a backup file.
     */
    public function download(Request $request)
    {
        Gate::authorize('backup.download');

        $disk = Storage::disk($request->input('disk'));
        $file_name = $request->input('file_name');
        $adapter = $disk->getAdapter();

        // Check if the file exists and is downloadable
        if ($adapter instanceof \League\Flysystem\Local\LocalFilesystemAdapter && $disk->exists($file_name)) {
            $storage_path = $disk->path($file_name);
            return response()->download($storage_path);
        } else {
            flash()->addWarning('This backup file does not exist or cannot be downloaded.');
            return redirect()->back();
        }
    }

    /**
     * Delete a backup file.
     */
    public function delete($file_name)
    {
        Gate::authorize('backup.destroy');

        $disk = Storage::disk('public');

        // Check if the file exists and delete it
        if ($disk->exists($file_name)) {
            $disk->delete($file_name);
            flash()->addSuccess('Backup file deleted successfully.');
        } else {
            flash()->addWarning('This backup file does not exist.');
        }

        return redirect()->back();
    }
}
