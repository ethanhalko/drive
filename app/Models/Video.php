<?php

namespace App\Models;

class Video extends File
{
    /**
     * @return string
     */
    public function getIconAttribute()
    {
        return 'far fa-file-video';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getViewAttribute()
    {
        return view('partials.video', ['path' => $this->base_path]);
    }
}