<?php

namespace App\Models;

class Video extends File
{
    public function getIconAttribute()
    {
        return 'far fa-file-video';
    }

    public function streamFile()
    {
        return 'foo';
    }

    public function getViewAttribute()
    {
        return view('partials.video', ['path' => $this->base_path]);
    }
}