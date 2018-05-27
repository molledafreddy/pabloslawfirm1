<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Component;
use App\Button;

class ComponentController extends Controller
{
    

    public function getComponetsbyId(Request $request){
        try {
            
            $section_id=$request->id;
            $objSection=new Section();
            $objComponent= new Component();
            $objButton= new Button();
            
            $data_sections=$objSection::find($section_id);
            $components=$objSection::find($section_id)->detailComponent()->get()->all();
            $detailcomponent=array();
                if(!empty($components)){
                    $data_button=array();
                    $data_modal=array();
                    foreach ($components as $val) {
                        $data_button=array();
                        $data_modal=array();
                        if(!empty($val->button_id)){
                           $data_button=$objComponent::find($val->id)->detailButton()->first();
                           if(!empty($data_button->modal_id)){
                              $data_modal=$objButton::find($data_button->id)->detailModal()->first();
                           }
                          
                        }
                        $val->detailbutton=$data_button;
                        $val->detailmodal=$data_modal;
                        $detailcomponent[]=$val;
                    }
            }
            $data_sections->components=$detailcomponent; 
            return response()->json( [ 'data' => $data_sections , 'msg' => '' ], 200);
        } catch (Exception $e) {
            \Log::error('Error LINE: '.$e->getLine().' FILE: '.$ex->getFile());
            return response()->json( [ 'data' => '' , 'msg' => '' ], 500);
        }
    }


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * [update function que modifica el componente en especifico de una seccion]
     * @param  Request $request [objcomponente]
     * @param  [type]  $id      [id]
     * @return [type]           [json]
     */
    public function update(Request $request,$id)
    {
        try {
            $request=$request->all();
            $objButton= new Button();
            $objComponent=new Component();
            $objComponent=$objComponent::find($id);
            $objComponent->image=$request["objContent"]["image"];
            $objComponent->title=$request["objContent"]["title"];
            $objComponent->subtitle=$request["objContent"]["subtitle"];
            $objComponent->description=$request["objContent"]["description"];
            $button_id=$request["objContent"]["button_id"];
            $objButton=$objButton::find($button_id);
            $objButton->button_name=$request["objContent"]["detailbutton"]["button_name"];
            if($objComponent->save() && $objButton->save()){
                return response()->json( [ 'oper' => true , 'msg' => '' ], 200);
            }
        } catch (Exception $e) {
           \Log::error('Error update Componentente LINE: '.$e->getLine().' FILE: '.$ex->getFile());
            return response()->json( [ 'oper' => false , 'msg' => 'Error al Updatear Componentente LINE: '.$e->getLine().' FILE: '.$ex->getFile() ], 500); 
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $objComponent=new Component();
            $objComponent=$objComponent::find($id);
            if($objComponent->delete()){
                return response()->json( [ 'oper' => true , 'msg' => '' ], 200);
            }
        } catch (Exception $e) {
           \Log::error('Error delete Componentente LINE: '.$e->getLine().' FILE: '.$ex->getFile());
            return response()->json( [ 'oper' => false , 'msg' => 'Error al Updatear Componentente LINE: '.$e->getLine().' FILE: '.$ex->getFile() ], 500); 
        }
    }
}
