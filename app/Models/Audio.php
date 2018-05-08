<?php

namespace App\Models;

class Audio extends File
{
    /**
     * @return string
     */
    public function getIconAttribute()
    {
        return 'far fa-file-audio';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getViewAttribute()
    {
        return view('partials.audio', ['path' => $this->base_path]);
    }
}