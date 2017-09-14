<?php

namespace App\Listeners;

use App\Events\FileUploaded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ProcessUploadedFile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FileUploaded $event
     * @return void
     */
    public function handle(FileUploaded $event)
    {
        Log::debug('Starting import..');
        foreach (file(storage_path('app/' . $event->path)) as $no => $line) {
            Log::debug($no . '|  ' . $line);
        }
        Log::debug('Import finished!');
    }
}
