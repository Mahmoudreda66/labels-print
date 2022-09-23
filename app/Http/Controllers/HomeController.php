<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        mustAuth();
    }

    public function index()
    {
        return redirect('/models-stickers');
    }
}
