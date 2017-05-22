<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cliente_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mantenimientos/cliente');
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
        $cliente = new \App\Cliente();
        $cliente->ruc= $request->input('ruc');
        $cliente->razon_social= $request->input('razon_social');
        $cliente->representante= $request->input('representante');
        $cliente->usuario= $request->input('usuario');
        $cliente->clave= $request->input('clave');
        $cliente->save();
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
            return \App\Cliente::find($id);
        } else if($id == "*"){
            return \App\Cliente::all();
        }
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
        $cliente = \App\Cliente::find($id);
        $cliente->ruc= $request->input('ruc');
        $cliente->razon_social= $request->input('razon_social');
        $cliente->representante= $request->input('representante');
        $cliente->usuario= $request->input('usuario');
        $cliente->clave= $request->input('clave');
        $cliente->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = \App\Cliente::find($id);
        $cliente->delete();
    }
}
