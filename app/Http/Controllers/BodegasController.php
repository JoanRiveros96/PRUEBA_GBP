<?php

namespace App\Http\Controllers;

use App\Models\bodegas;
use App\Models\users;
use Illuminate\Http\Request;


class BodegasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos= bodegas::where('estado',1)
                ->orderBy('nombre')
                ->get();
        return  $datos;
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
        // Debido a que se han designado automaticamente los valores: id, estado, created_by, updated_by
        // Solo se deben ingresar como json los datos nombre y id_responsable, teniendo en cuenta que el 
        // id_responsable debe ser existente en la tabla users
        if($request ->isJson()){
            $datos = $request->json()->all();

            $responsableExist= users::where('id', $datos['id_responsable'])->exists();
            bodegas::create($datos);

            if($responsableExist == FALSE){
                return response()->json(['error' => 'Invalid parameters'],status:406);
            }
            return 'Envio exitoso';

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bodegas  $bodegas
     * @return \Illuminate\Http\Response
     */
    public function show(bodegas $bodegas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bodegas  $bodegas
     * @return \Illuminate\Http\Response
     */
    public function edit(bodegas $bodegas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bodegas  $bodegas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bodegas $bodegas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bodegas  $bodegas
     * @return \Illuminate\Http\Response
     */
    public function destroy(bodegas $bodegas)
    {
        //
    }
}
