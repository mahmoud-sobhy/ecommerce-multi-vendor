<?php

namespace App\Listeners;

use App\Events\VisitTheVideo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseCounter
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VisitTheVideo $event): void
    {
        $this->updateviewer($event->viewerCount);
    }

    public function updateviewer($viewerCount){

        $viewerCount->viewers = $viewerCount->viewers + 1;
        $viewerCount->save();
    }
}
