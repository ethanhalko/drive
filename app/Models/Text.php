<?php

namespace App\Models;

use GrahamCampbell\Flysystem\Facades\Flysystem;

class Text extends File
{
    /**
     * @return string
     */
    public function getIconAttribute()
    {
        return 'far fa-file-alt';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getViewAttribute()
    {
        $content = Flysystem::read($this->abstractFile);

        return view('partials.text', ['content' => $content]);
    }
}