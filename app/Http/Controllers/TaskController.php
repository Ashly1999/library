<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        $i=2;
      
        return view('task',compact('i'));
    }

    public function view()
    {
        $rty = "amma";
        $reverse = strrev($rty);
        return view('task', compact('rty','reverse'));
    }
}
