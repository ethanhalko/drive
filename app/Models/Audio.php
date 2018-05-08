<?php

namespace App\Models;

class Audio extends File
{
    public function getIconAttribute()
    {
        return 'far fa-file-audio';
    }

    public function streamFile()
    {
        return 'foo';
    }

    public function getViewAttribute()
    {
        return view('partials.audio', ['path' => $this->base_path]);
    }
}