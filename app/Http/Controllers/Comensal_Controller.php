<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Comensal_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mantenimientos/comensal');
    }

    public function ver_servir()
    {
        return view('mantenimientos/servir');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comensal = new \App\Comensal();
        $comensal->nombres= $request->input('nombres');
        $comensal->apellido_paterno= $request->input('apellido_paterno');
        $comensal->apellido_materno= $request->input('apellido_materno');
        $comensal->numero_documento= $request->input('numero_documento');
        $comensal->huella1= $request->input('huella1');
        $comensal->huella2= $request->input('huella2');
        $comensal->activo=$request->input('activo');
        $comensal->cliente_id= $request->input('cliente_id');
        $comensal->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_numeric($id)) {
            return \App\Comensal::find($id);
        } else if($id == "*"){
            return \App\Comensal::all();
        }
    }

    public function listar()
    {
        return \App\Comensal::where('cliente_id',Input::get('cliente_id'))->get();
    }

    public function buscar()
    {
        return \App\Comensal::where('cliente_id',Input::get('cliente_id'))->where('numero_documento',Input::get('numero_documento'))->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $comensal = \App\Comensal::find($id);
        $comensal->nombres= $request->input('nombres');
        $comensal->apellido_paterno= $request->input('apellido_paterno');
        $comensal->apellido_materno= $request->input('apellido_materno');
        $comensal->numero_documento= $request->input('numero_documento');
        $comensal->huella1= $request->input('huella1');
        $comensal->huella2= $request->input('huella2');
        $comensal->activo=$request->input('activo');
        $comensal->cliente_id= $request->input('cliente_id');
        $comensal->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comensal = \App\Comensal::find($id);
        $comensal->delete();
    }
}

