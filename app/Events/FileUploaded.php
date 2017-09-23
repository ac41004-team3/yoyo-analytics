<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

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
