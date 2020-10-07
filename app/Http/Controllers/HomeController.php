<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function vivifyGet($first_name = 'Roger')
    {
        return view('vivify', ['first_name' => $first_name]);
    }

    public function vivifyPost()
    {
        echo "<h1>You are POST-ing to Vivify!</h1>";
    }

    public function vivifyPut()
    {
        echo "<h1>You are PUT-ing to Vivify!</h1>";
    }

    public function vivifyPatch()
    {
        echo "<h1>You are PATCH-ing to Vivify!</h1>";
    }

    public function vivifyDelete()
    {
        echo "<h1>You are DELETE-ing to Vivify!</h1>";
    }
}
