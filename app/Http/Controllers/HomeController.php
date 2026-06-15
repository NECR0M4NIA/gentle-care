<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Book;

class HomeController extends Controller
{
    function index() {
        return view('home');
    }

    function history() {
        return view('history');
    }
}
