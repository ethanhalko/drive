<?php

namespace App\Models;

class Image extends File
{
    /**
     * @return string
     */
    public function getIconAttribute()
    {
        return 'far fa-file-image';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getViewAttribute()
    {
        return view('partials.image', ['path' => $this->getBasePathAttribute()]);
    }
}