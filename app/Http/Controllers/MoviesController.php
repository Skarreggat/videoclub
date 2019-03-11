<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
	public function showMovie($id='Hola')
	{
		//$user = Movie::findOrFail($id);
		//return view('user.profile', array('user' => $user));
		return $id;
	}
}
