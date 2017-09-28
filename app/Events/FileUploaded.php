<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FileUploaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $path;

    /**
     * Create a new event instance.
     *
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }
}
