<?php

namespace App\Http\Controllers;

use App\Factories\FileFactory;
use GrahamCampbell\Flysystem\FlysystemManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $name = $file->getClientOriginalName();

        $file->storeAs('storage', $name);

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

    /**t
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $this->flysystem->delete($request->file);

        return redirect()->back();
    }
}
