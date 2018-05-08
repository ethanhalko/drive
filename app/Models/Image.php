<?php

namespace App\Models;

class Image extends File
{
    public function getIconAttribute()
    {
        return 'far fa-file-image';
    }

    public function streamFile()
    {
        return 'foo';
    }

    public function getViewAttribute()
    {
        return view('partials.image', ['path' => $this->getBasePathAttribute()]);
    }
}