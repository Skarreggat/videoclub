<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Edad;
use Notification;

class CatalogController extends Controller
{
	public function getIndex()
	{
		$movies = Movie::all();
		return view('catalog.index', array('arrayPeliculas' => $movies));
	}

	public function getShow($id)
	{
		$movie = Movie::findOrFail($id);
        $paraEdad = $movie->id_edades;
        $edad = Edad::findOrFail($paraEdad);
        $yee = $edad->edad;
		return view('catalog.show', array('movie' => $movie, 'edad' => $yee));
	}

	public function getCreate()
	{
		return view('catalog.create');
	}

	public function getEdit($id)
	{
		$movie = Movie::findOrFail($id);
		return view('catalog.edit', array('movie' => $movie));
	}

	public function postCreate(Request $request)
    {
    	$m = new Movie;
        $m->title = $request->input('title');
        $m->year = $request->input('year');
        $m->director = $request->input('director');
        $m->poster = $request->input('poster');
        $m->synopsis = $request->input('synopsis');

        $m->save();
        Notification::success("La película se ha guardado/modificado correctamente");
        return redirect()->action('CatalogController@getIndex');
    }

    public function putEdit(Request $request, $id){

    	$m = Movie::findOrFail($id);
    	$m->title = $request->input('title');
        $m->year = $request->input('year');
        $m->director = $request->input('director');
        $m->poster = $request->input('poster');
        $m->synopsis = $request->input('synopsis');

        $m->save();
        Notification::success("La película se ha guardado/modificado correctamente");
        return redirect('/catalog/show/' . $id);
    }

    public function putRent(Request $request, $id){

    	$m = Movie::findOrFail($id);
    	$m->rented = 1;

        $m->save();
        Notification::success("La película se ha alquilado correctamente");
        return redirect('/catalog/show/' . $id);
    }

    public function putReturn(Request $request, $id){

    	$m = Movie::findOrFail($id);
    	$m->rented = 0;

        $m->save();
        Notification::success("La película se ha devuelto correctamente");
        return redirect('/catalog/show/' . $id);
    }

    public function deleteMovie(Request $request, $id){

    	$m = Movie::findOrFail($id);
    	$m->delete();
        Notification::success("La película se ha borrado correctamente");
        return redirect()->action('CatalogController@getIndex');
    }

}
