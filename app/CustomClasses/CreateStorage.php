<?php

namespace App\CustomClasses;

use Illuminate\Support\Facades\Storage;
use \Carbon\Carbon;

class CreateStorage
{
    public function getStoragePath($mainFolder)
    {
        if (Storage::disk('files_disk')->exists('/' . $mainFolder)) {

            $year = Carbon::today()->format('Y'); //2024

            // Check if the main folder exists, create if not
            $mainFolderPath = '/' . $mainFolder . '/' . $year;

            if (!Storage::disk('files_disk')->exists($mainFolderPath)) {
                Storage::disk('files_disk')->makeDirectory($mainFolderPath, 0777, true);
            }

            return $mainFolderPath;
        }
    }

    public function getLogStoragePath($mainFolder)
    {
        $mainFolderPath = '/' . $mainFolder;

        // Check if the main folder exists, create if not
        if (!Storage::disk('files_disk')->exists($mainFolderPath)) {
            Storage::disk('files_disk')->makeDirectory($mainFolderPath, 0777, true);
        }

        return $mainFolderPath;

    }

}
