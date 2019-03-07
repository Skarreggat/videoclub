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
        $tipo = Tipo::all();
        return view('catalog.create',array('edades' => $edades, 'tipos' => $tipo));
    }

    public function getEdit($id)
    {
      $movie = Movie::findOrFail($id);
      $edades = Edad::all();
      $tipo=Tipo::all();
      $cadaTipo=Tipus_Movie::all();
      $arrayFor[] = null;
      foreach ($cadaTipo as $cadaTip) {
          if($id == $cadaTip->id_movies){
            array_push($arrayFor, $cadaTip->id_tipus);
        }
    }
        //dd($movie->id_edades);
    return view('catalog.edit', array('movie' => $movie, 'edades' => $edades, 'tipos' => $tipo, 'arrayForms'=>$arrayFor));
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
     //dd($request->input('formatos'));
 $m->save();
 foreach ($request->input('formatos') as $value) {
    $t = new Tipus_Movie;
    $t->id_movies = $m->id;
    $t->id_tipus = $value;
    $t->save();
}

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
    $tipmov = Tipus_Movie::all();
    foreach($tipmov as $ti){
        if($id==$ti->id_movies){
            $ti->delete();
        }
    }

    foreach ($request->input('formatos') as $value) {
        $t = new Tipus_Movie;
        $t->id_movies = $m->id;
        $t->id_tipus = $value;
        $t->save();
    }
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
 $tipmov = Tipus_Movie::all();
 foreach($tipmov as $ti){
    if($id==$ti->id_movies){
        $ti->delete();
    }
}

$m->delete();
Notification::success("La película se ha borrado correctamente");
return redirect()->action('CatalogController@getIndex');
}

public function showFormato(){
    $formato = Tipo::all();
    return view('formato.lista', array('arrayFormatos' => $formato));
}
public function getEditFormato($id){
    $formato = Tipo::findOrFail($id);
    return view('formato.editFormato', array('formato' => $formato));
}
public function putEditFormato(Request $request, $id){

   $formato = Tipo::findOrFail($id);
   $formato->tipo = $request->input('tipo');
   $formato->save();
   Notification::success("TIPO ACTUALIZADO/modificado!!");
   return redirect('formato/lista');
}

public function getCreateFormato()
{
    return view('formato.createFormato');
}

public function postCreateFormato(Request $request)
{
 $m = new Tipo;
 $m->tipo = $request->input('tipo');
 $m->save();
 Notification::success("El formato se ha guardado correctamente");
 return redirect()->action('CatalogController@showFormato');
}

public function deleteFormato(Request $request, $id){

 $m = Tipo::findOrFail($id);
 $m->delete();
 Notification::success("El formato se ha borrado correctamente");
 return redirect()->action('CatalogController@showFormato');
}


}
