<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Menu_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mantenimientos/menu');
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
        $menu = new \App\Menu();
        $menu->fecha= $request->input('fecha');
        $menu->cliente_id= $request->input('cliente_id');
        $menu->plato_id= $request->input('plato_id');
        $menu->save();
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
            return \App\Menu::find($id);
        } else if($id == "*"){
            return \App\Menu::all();
        }
    }

    public function listar()
    {
        $fecha = Input::get('fecha');
        $cliente_id = Input::get('cliente_id');

        $menus =  \App\Menu::where([
            ['cliente_id','=', $cliente_id],
            ['fecha', '=', $fecha],
        ])->get();

        foreach ($menus as $menu){
            $menu->plato;
            $menu->cliente;
        }
        return $menus;
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
        $menu = \App\Menu::find($id);
        $menu->fecha= $request->input('fecha');
        $menu->cliente_id= $request->input('cliente_id');
        $menu->plato_id= $request->input('plato_id');
        $menu->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = \App\Menu::find($id);
        $menu->delete();
    }
}
