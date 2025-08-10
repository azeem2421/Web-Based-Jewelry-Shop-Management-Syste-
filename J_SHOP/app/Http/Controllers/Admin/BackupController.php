<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\Commands\BackupCommand;
use Spatie\Backup\Helpers\Format;
use Illuminate\Http\Request;
use Artisan;



class BackupController extends Controller
{
   public function index()
{
    // Get the disk from config, e.g., 'local'
    $disk = \Storage::disk(config('backup.backup.destination.disks')[0]);

    // Backup folder name - usually same as APP_NAME from config
    $backupFolder = config('backup.backup.name');

    // Get all files in the backup folder, filter zip files
    $backups = collect($disk->allFiles($backupFolder))
        ->filter(fn($file) => str_ends_with($file, '.zip'))
        ->map(function ($file) use ($disk) {
            return (object) [
                'file_name' => basename($file),
                'file_path' => $file,
                'file_size' => Format::humanReadableSize($disk->size($file)),
                'last_modified' => date('Y-m-d H:i:s', $disk->lastModified($file)),
            ];
        })
        ->sortByDesc('last_modified')
        ->values();

    return view('admin.backup.index', compact('backups'));
}
    public function createBackup()
    {
        try {
            Artisan::call('backup:run');
            return redirect()->back()->with('success', 'Backup created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Backup failed: ' . $e->getMessage());
        }
    }

    public function downloadBackup($fileName)
    {
        $disk = \Storage::disk(config('backup.backup.destination.disks')[0]);
        if (!$disk->exists(config('backup.backup.name') . '/' . $fileName)) {
            abort(404);
        }
        return response()->download($disk->path(config('backup.backup.name') . '/' . $fileName));
    }

    public function deleteBackup($fileName)
    {
        $disk = \Storage::disk(config('backup.backup.destination.disks')[0]);
        if ($disk->exists(config('backup.backup.name') . '/' . $fileName)) {
            $disk->delete(config('backup.backup.name') . '/' . $fileName);
            return redirect()->back()->with('success', 'Backup deleted successfully.');
        }
        return redirect()->back()->with('error', 'Backup not found.');
    }
}
