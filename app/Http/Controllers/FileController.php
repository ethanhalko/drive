<?php

namespace App\Http\Controllers;

use App\Factories\FileFactory;
use GrahamCampbell\Flysystem\FlysystemManager;
use Illuminate\Http\Request;

class FileController extends Controller
{
    protected $flysystem;

    public function __construct(FlysystemManager $flysystem)
    {
        $this->middleware('auth');
        $this->flysystem = $flysystem;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $path = 'storage/' . $file->getClientOriginalName();

        //TODO: Add logic to rename files with duplicate names

        $this->flysystem->put($path, file_get_contents($file));

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param FileFactory $fileFactory
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, FileFactory $fileFactory)
    {
        $file = $fileFactory->create('storage/' . $request->file);

        return view('view', [ 'view' => $file->view ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $this->flysystem->delete('storage/' . $request->file);

        return redirect()->back();
    }
}
