<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
	public function home()
	{		
	    return view('home');
	}
}
