<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        return view('videos');
    }
}