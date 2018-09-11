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
        $path = $request->get('path', 'storage');
        $file = $request->file('file');
        $name = $file->getClientOriginalName();

        $file->storeAs($path, $name);

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param FileFactory $fileFactory
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, FileFactory $fileFactory)
    {
        $path = $request->get('path', 'storage');
        $file = $fileFactory->create($path);

        return view('view', ['file' => $file]);
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

    /**
     * @param Request $request
     * @return mixed
     */
    public function download(Request $request)
    {
        return Storage::download('storage/' . $request->file);
    }
}
