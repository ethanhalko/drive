<?php

namespace App\Http\Controllers;

use App\Factories\FileFactory;
use GrahamCampbell\Flysystem\FlysystemManager;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @param FlysystemManager $flysystem
     * @param FileFactory $fileFactory
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, FlysystemManager $flysystem, FileFactory $fileFactory)
    {
        $root = $request->get('root', 'storage');

        $files = [];
        $directories = [];
        foreach ($flysystem->listContents($root) as $item) {
            if ($item['type'] == 'dir') {
                $directories[] = $item;
            } else if ($item['type'] == 'file') {
                $files[] = $fileFactory->create($item['path']);
            }
        }

        $levels = collect(explode('/', $root));

        return view('home', [
            'files' => $files,
            'directories' => $directories,
            'levels' => $levels
        ]);
    }
}
