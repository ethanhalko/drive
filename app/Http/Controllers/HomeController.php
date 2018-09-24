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
        $this->middleware(['auth']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }
}
