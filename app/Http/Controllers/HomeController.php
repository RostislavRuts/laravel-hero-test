<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;

class HomeController extends Controller
{
    public function index()
    {
        $heroes = Hero::paginate(5);;
        return view('heroes.index', compact('heroes'));
    }

}
