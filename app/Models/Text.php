<?php

namespace App\Models;

use GrahamCampbell\Flysystem\Facades\Flysystem;

class Text extends File
{
    public function getIconAttribute()
    {
        return 'far fa-file-alt';
    }

    public function streamFile()
    {
        return 'foo';
    }

    public function getViewAttribute()
    {
        $content = Flysystem::read($this->abstractFile);

        return view('partials.text', ['content' => $content]);
    }
}