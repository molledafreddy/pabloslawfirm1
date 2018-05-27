<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CaseClient;
use App\Status;
use App\User;
use App\Client; 
use App\CaseUser;
use Carbon\ Carbon;
use Log;

class CaseController extends Controller
{

    function listCases(){

        $data= CaseClient::search(request()->from, request()->to)->get();
        return response()->json( [ 'data' => $data ], 200);
    }

    function listCreateCase(){
        $status=new Status;
        $status = $status->orderBy('id', 'desc')->get();

        $lawyers=new User;
        $lawyers = $lawyers->where('roles_id', 3)->orderBy('id', 'desc')->get();

        $clients= Client::all();

        return response()->json( [ 'status' => $status, 'lawyers' => $lawyers, 'clients' => $clients ], 200);   
    }

    function editCase(Request $request){
        Log::debug('ingreso al metodo');
        try {
            if(!empty($request->id)){
                $objCase= new CaseClient();
                $objCase=$objCase::find($request->id);
                $objCase->status=$request->status;
                $objCase->description=$request->description;
                $objCase->user_id=1;
                $objCase->date_created=$request->date_created;
                if($objClient->save()){
                    return response()->json( ['oper'=>'update', 'alert' => 'success' , 'msg' => 'Operación realizada con exito' ], 200);
                }else{
                    return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error en la operación' ], 500);
                }
            }else{
                if($this->CaseClient($request)){
                    return response()->json( ['oper'=>'insert','alert' => 'success' , 'msg' => 'Caso creado con exito' ], 200);
                }else{
                    return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error en la operacion' ], 500);
                }
            }      
        
        } catch (Exception $e) {
            \Log::error('Error Modificar Cliente: '.$request->email.' LINE: '.$e->getLine().' FILE: '.$ex->getFile());
            return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error Modulo Cliente' ], 500);
        }
        
    }

    function createCase(Request $request){
        try {
            
            Log::debug('ingreso al metodo createCase'.request()->date_created);
            $date = date_format(Carbon::parse(request()->date_created)-> addDay(), 'Y-m-d');
                $objCase= new CaseClient();
                $objCase->status_id=$request->status_id;
                $objCase->description=$request->description;
                $objCase->date_created=$date;
                $objCase->save();
                return $objCase;
                $asistent = CaseUser::create([
                    'user_id' => Auth::id(),
                    'case_id' => $objCase->id,
                ]);

                $lawyer = CaseUser::create([
                    'user_id' => request()->lawyer,
                    'case_id' => $objCase->id,
                ]);

                if($objCase){
                    return response()->json( ['oper'=>'insert','alert' => 'success' , 'msg' => 'Caso creado con exito' ], 200);
                }else{
                   return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error en la operacion' ], 500);
                }

         } catch (Exception $e) {
            \Log::error('Error al Crear Cliente: '.$request->email.' LINE: '.$e->getLine().' FILE: '.$ex->getFile());
            return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error Modulo Caso' ], 500);
        }
    }


    function deleteCase(Request $request){;
        try {
             $idcase =$request->idcase;
             $objCase = new CaseClient();
             $dataCase = $objCase::find($idcase);
             if($dataCase->delete()){
                return response()->json( ['alert' => 'success' , 'msg' => 'Operación realizada con exito' ], 200);
             }else{
                return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error en la operacion' ], 500);
             }

         } catch (Exception $e) {
            \Log::error('Error al Crear Caso: '.$request->email.' LINE: '.$e->getLine().' FILE: '.$ex->getFile());
            return response()->json( [ 'alert' => 'danger' , 'msg' => 'Error Modulo Caso' ], 500);
        }

    }


    function getCasesByAsisassistant(Request $request){
        $objCase = new CaseClient();
        $data=$objCase->Orderby('case_clients.id','asc')->join('status', 'case_clients.status_id', '=', 'status.id')
        ->join('clients', 'case_clients.client_id', '=', 'clients.id')
        ->select('case_clients.*','clients.name as name_cliente', 'status.name as name_status')
        ->get()->all();
        
        foreach ($data as $value) {
            $abogados=array();
            $asistentes=array();
            $case_id=$value->id;
            $date = new \DateTime($value->date_created);
            $value->date_created=$date->format('d/m/Y');
            $CaseUser= new CaseUser();
            $usersCases=$CaseUser->where('case_id',$case_id)->get()->all();
            foreach ($usersCases as $val) {
                $User= new User();
                $data_user=$User->where('id',$val->user_id)->get();
                if($data_user[0]->roles_id==2){ //asistentes
                    $arr=array();
                    $arr["user_id"]=$data_user[0]->id;
                    $arr["name"]=$data_user[0]->name;
                    $asistentes[]=$arr;
                }else if($data_user[0]->roles_id==3){ //abogados
                    $arr=array();
                    $arr["user_id"]=$data_user[0]->id;
                    $arr["name"]=$data_user[0]->name;
                    $abogados[]=$arr;
                }     
            }
            $value->asistentes=$asistentes;
            $value->abogados=$abogados;  
            
        }
        return response()->json( ['data' => $data ], 200);
    }

}
