<?php

namespace App\Http\Controllers;

use App\Models\inventarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\InventariosController;
use App\Http\Controllers\HistorialesController;

class InventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inventario()
    {
        $datos = DB::select('SELECT nombre AS PRODUCTO,SUM(cantidad) AS TOTAL_INVENTARIO FROM inventarios JOIN productos WHERE (inventarios.id_producto = productos.id) GROUP BY PRODUCTO ORDER BY TOTAL_INVENTARIO DESC');
        return $datos;
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
        if($request ->isJson()){
            $datos = $request->json()->all();
            $sql =DB::select('SELECT cantidad FROM inventarios WHERE id_bodega='.$datos['id_bodega'].' AND id_producto ='.$datos['id_producto']);            
            if($sql ==  NULL){
                $cantidad=0;
            
            }else{foreach($sql as $data){
                $cantidad=$data->cantidad;
                }}
            
            $update= DB::table('inventarios')
                    ->updateOrInsert(
                        ['id_bodega'=>$datos['id_bodega'], 'id_producto'=> $datos['id_producto']],                        
                        ['cantidad' => $cantidad + $datos['cantidad']]

                    );

            return 'Operacion Realizada Correctamente';
        
            //posibilidad de realizar todo el proceso paso por paso 

            // $sql =DB::select('SELECT * FROM inventarios WHERE id_bodega='.$datos['id_bodega'].' AND id_producto ='.$datos['id_producto']);            
            // if($sql ==  NULL){
            //     inventarios::create($datos);
            //     return 'nuevo inventario creado';

            // }
            // else{
            //     // $update= DB::table('inventarios')
            //     return 'Combinacion encontrada';

            // }
        }
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function defaultProduct(Request $request)
    {
        if($request ->isJson()){
            $datos = $request->json()->all();
            $datos['id_bodega']=1;
            $sql= DB::select('SELECT id FROM productos WHERE nombre=?', [$datos['nombre']]);
            foreach($sql as $data){
                $id=$data->id;
            }
            
            $datos['id_producto']= $id;
            inventarios::create($datos);
            return 'Envio exitoso';
            

        }

        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function show(inventarios $inventarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function edit(inventarios $inventarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inventarios $inventarios)
    {
        //
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function traslado(Request $request)
    {
        if($request ->isJson()){
            $datos = $request->json()->all();
            $sql =DB::select('SELECT * FROM inventarios WHERE id='.$datos['id_inventario']);            
            if($sql ==  NULL){
               return 'Inventario no existe en la base de datos';
            
            }else{
                foreach($sql as $data){
                    if($datos['id_bodega_origen']=$data->id_bodega){
                        if($datos['cantidad'] > $data->cantidad){
                            return 'Cantidad a sacar mayor al stock, no es posible continuar';
                        }
                        else{
                            $salida= DB::table('inventarios')
                                ->where('id_bodega',$datos['id_bodega_origen'])
                                ->where('id_producto',$data->id_producto);
                            $salida->decrement('cantidad',$datos['cantidad']);


        $sql =DB::select('SELECT cantidad FROM inventarios WHERE id_bodega='.$datos['id_bodega_destino'].' AND id_producto ='.$data->id_producto);            
            if($sql ==  NULL){
                $cantidad=0;
            
            }else{foreach($sql as $entrada){
                $cantidad=$entrada->cantidad;
                }}
            
            $update= DB::table('inventarios')
                    ->updateOrInsert(
                        ['id_bodega'=>$datos['id_bodega_destino'], 'id_producto'=> $data->id_producto],                        
                        ['cantidad' => $cantidad + $datos['cantidad']]

                    );

                        

                        }
                        app(HistorialesController::class)->store($request);
                        return 'Operacion Completada';
                        
                        
                    }
                
                }}
            
            }
           
            
        
    }
 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function prueba(Request $request)
    {

        $myRequest = new \Illuminate\Http\Request();
                            $myRequest->setMethod('POST');
                            $myRequest->request->add(['id_bodega'=> 2,
                            'id_producto'=>9,
                            'cantidad'=>5]);
                            
                            


$this->store($myRequest);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventarios $inventarios)
    {
        //
    }

    
}
