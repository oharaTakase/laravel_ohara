<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test; // this is a inport the Testmodel to use eloquant

class TestController extends Controller
{
    public function index(){
        // The process of DB
        $values = Test::all();

        // dd($values);

        return view('tests.test', compact('values'));
    }
}
