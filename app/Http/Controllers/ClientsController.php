<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller
{
    function listClients(){
        $objClient=new Client;
        $data=$objClient->orderBy('id', 'desc')->get();
        return response()->json( [ 'data' => $data ], 200);
    }

    function editClient(Request $request){
        try {
            if(!empty($request->id)){
                $objClient= new Client();
                $objClient=$objClient::find($request->id);
                $objClient->name=$request->name;
                $objClient->email=$request->email;
                $objClient->phone=$request->phone;
                $objClient->address=$request->address;
                if($objClient->save()){
                    return response()->json( ['oper'=>'update', 'alert' => 'success' , 'msg' => 'Operación realizada con exito' ], 200);
                }else{
                    return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error en la operacion' ], 500);
                }
            }else{
                if($this->createClient($request)){
                    return response()->json( ['oper'=>'insert','alert' => 'success' , 'msg' => 'Cliente creado con exito' ], 200);
                }else{
                    return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error en la operacion' ], 500);
                }
            }      
        
        } catch (Exception $e) {
            \Log::error('Error Modificar Cliente: '.$request->email.' LINE: '.$e->getLine().' FILE: '.$ex->getFile());
            return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error Modulo Cliente' ], 500);
        }
        
    }

    function createClient($request){
        try {
             $objClient= new Client();
             $objClient->name=$request->name;
                $objClient->email=$request->email;
                $objClient->phone=$request->phone;
                $objClient->address=$request->address;
                if($objClient->save()){
                    return true;
                }else{
                   return false;
                }

         } catch (Exception $e) {
            \Log::error('Error al Crear Cliente: '.$request->email.' LINE: '.$e->getLine().' FILE: '.$ex->getFile());
            return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error Modulo Cliente' ], 500);
        }
    }
        function deleteClient(Request $request){;
        try {
             $idclient=$request->idclient;
             $objClient= new Client();
             $dataCient=$objClient::find($idclient);
             if($dataCient->delete()){
                return response()->json( ['alert' => 'success' , 'msg' => 'Operación realizada con exito' ], 200);
             }else{
                return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error en la operacion' ], 500);
             }

         } catch (Exception $e) {
            \Log::error('Error al Crear Cliente: '.$request->email.' LINE: '.$e->getLine().' FILE: '.$ex->getFile());
            return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error Modulo Cliente' ], 500);
        }

    }
}
