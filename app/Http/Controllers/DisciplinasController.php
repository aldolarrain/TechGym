<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplinas;

class DisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buscar= $request->buscar;
        if($buscar==''){
            $disciplinas = Disciplinas::all();
        }
        else{
            $disciplinas= Disciplinas::where('nombre', 'like', '%'.$buscar.'%')->get();
        }
        return $disciplinas;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $disciplinas= new Disciplinas;
        $disciplinas->nombre=$request->nombre;
        $disciplinas->descripcion=$request->descripcion;
        $disciplinas->save();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
