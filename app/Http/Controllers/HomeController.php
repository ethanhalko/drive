<?php

namespace App\Http\Controllers;

use App\Factories\FileFactory;
use GrahamCampbell\Flysystem\FlysystemManager;

class HomeController extends Controller
{

    protected $fileManager;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', '2fa']);
    }

    /**
     * @param FlysystemManager $flysystem
     * @param FileFactory $fileFactory
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(FlysystemManager $flysystem, FileFactory $fileFactory)
    {
        $files = [];

        foreach ($flysystem->listContents('storage') as $file) {
            $files[] = $fileFactory->create($file['path']);
        }

        return view('home', ['files' => $files]);
    }
}
