<?php

namespace App\Http\Controllers;

use GrahamCampbell\Flysystem\FlysystemManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FolderController extends Controller
{
    protected $flysystem;

    public function __construct(FlysystemManager $flysystem)
    {
        $this->middleware('auth');
        $this->flysystem = $flysystem;
    }

    public function store(Request $request)
    {
        Storage::makeDirectory('storage/', $request->input('folder'));

        return redirect()->back();
    }
}
