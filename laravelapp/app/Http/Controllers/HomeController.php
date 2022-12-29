<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
        Make a single route controller: https://youtu.be/HUvqykIg3go
        
        command: php artisan make:controller HomeController
    */
    public function __invoke()
    {
        return view('index');
    }
}
