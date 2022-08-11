<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function about()
    {
        $appname = config('app.name');
        $debug = config('app.debug');
        $version = config('app.version');

        return view('about', compact('appname', 'debug', 'version'));
    }
}
