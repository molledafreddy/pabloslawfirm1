<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Component;
use App\Button;


class SectionController extends Controller
{
    

    public function getComponetsbySection(Request $request){
        try {
            //$section_id=$request->id; //services
            $objSection=new Section();
            $objComponent= new Component();
            $objButton= new Button();
            
            $data_sections=$objSection->select('id','name','identifier')->get();
            foreach ($data_sections as $value) {
                $components=$objSection::find($value->id)->detailComponent()->get()->all();
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
                $value->components=$detailcomponent;
            }
 
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
