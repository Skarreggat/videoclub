<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Edad;
use App\Tipo;
use App\Tipus_Movie;
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
        $ed = $edad->edad;
        $tip = Tipus_Movie::all();
        $tipoo = Tipo::all();
        return view('catalog.show', array('movie' => $movie, 'edad' => $ed, 'tipMovs' => $tip, 'tipos' => $tipoo));
    }

    public function getCreate()
    {
        $edades = Edad::all();
        return view('catalog.create',array('edades' => $edades));
    }

    public function getEdit($id)
    {
      $movie = Movie::findOrFail($id);
      $edades = Edad::all();
        //dd($movie->id_edades);
      return view('catalog.edit', array('movie' => $movie, 'edades' => $edades));
  }

  public function postCreate(Request $request)
  {
   $m = new Movie;
   $m->title = $request->input('title');
   $m->year = $request->input('year');
   $m->director = $request->input('director');
   $m->poster = $request->input('poster');
   $m->synopsis = $request->input('synopsis');
   $m->id_edades = $request->input('id_edades');

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
   $m->id_edades = $request->input('id_edades');

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
