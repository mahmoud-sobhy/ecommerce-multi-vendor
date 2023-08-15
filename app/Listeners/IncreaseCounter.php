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
    public function handle(VisitTheVideo $event)
    {
        if (!session()->has('vidioIsVisited')) {
            $this->updateviewer($event->viewerCount);
        }else{
            return false;
        }
    }

    public function updateviewer($viewerCount){

        $viewerCount->viewers = $viewerCount->viewers + 1;
        $viewerCount->save();

        session()->put('vidioIsVisited',$viewerCount->id);
    }
}
