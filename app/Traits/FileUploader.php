<?php

namespace App\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

trait FileUploader
{
    public function unlink($file = '')
    {
        if ($file && File::exists(public_path($file))) {
            unlink($file);
        }
    }

    public function fileUpload($file, $location, $updateFile = false)
    {
        if ($file) {
            $currentDate = Carbon::now()->toDateString();
            $pre = $currentDate.'-'.substr(uniqid(), 7, 10);
            $file_name = $pre.'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name = $file_name.'.'.$ext;
            $upload_path = $location.'/';
            $file_url = $upload_path.$file_full_name;
            if (isset($updateFile)) {
                $this->unlink($updateFile);
            }
            $file->move($upload_path, $file_full_name);

            return $file_url;
        }
    }
}
