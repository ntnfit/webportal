<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FixAssetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Fix Asset';
        return view('fixAsset', compact('title'));
    }
}
