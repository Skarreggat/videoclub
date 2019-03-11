<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class APICatalogController extends Controller
{
    public function index()
    {
        return response()->json( Movie::all() );
    }

    public function store(Request $request)
    {
        $m = new Movie;
        $m->title = $request->input('title');
        $m->year = $request->input('year');
        $m->director = $request->input('director');
        $m->poster = $request->input('poster');
        $m->synopsis = $request->input('synopsis');

        $m->save();
        return response()->json([ 'error' => false,
          'msg' => 'La película se ha creado correctamente' ]);
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return response()->json($movie);
    }

    public function update(Request $request, $id)
    {        
        $m = Movie::findOrFail($id);
        if(isset($request->title)){
            $m->title = $request->input('title');   
        }
        if(isset($request->year)){
            $m->year = $request->input('year');
        }
        if(isset($request->director)){
            $m->director = $request->input('director');
        }
        if(isset($request->poster)){
            $m->poster = $request->input('poster');
        }
        if(isset($request->synopsis)){
            $m->synopsis = $request->input('synopsis');
        }
        
        $m->save();
        return response()->json([ 'error' => false, 'msg' => 'La película se ha modificado correctamente' ]);
    }

    public function destroy($id)
    {
        $m = Movie::findOrFail($id);
        $m->delete();
        return response()->json( ['error' => false,
          'msg' => 'La película se ha borrado correctamente' ] );
    }

    public function putRent($id) {
        $m = Movie::findOrFail( $id );
        $m->rented = true;
        $m->save();
        return response()->json( ['error' => false,
          'msg' => 'La película se ha marcado como alquilada' ] );
    }

    public function putReturn($id) {
        $m = Movie::findOrFail( $id );
        $m->rented = false;
        $m->save();
        return response()->json( ['error' => false,
          'msg' => 'La película se ha marcado como devuelta' ] );
    }
}
