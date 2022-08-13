<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;
use Validator;

class Events extends Controller
{

    function list(){

        $list = Event::all();
        $msg = 'Something Wrong';
        if($list->isNotEmpty()){

            $data = $list->toArray();
            $msg = 'Data Successfully Fetched';

        }else{
            $msg = 'Data not found';
        }
        return response()->json([
                    'success' => 1,
                    'message' => $msg,
                    'data'    => $data
        ]);

    }

    function getActiveEvents(){

        $list = Event::where('created_at','>=', date('Y-m-d').' 00:00:00')->get();
       
        $data = null;
       $msg = 'Something Wrong';
        if($list->isNotEmpty()){

            $data = $list->toArray();
            $msg = 'Data Successfully Fetched';

        }else{
            $msg = 'Data not found';
        }
        return response()->json([
                    'success' => 1,
                    'message' => $msg,
                    'data'    => $data
         ]);

    }


    function create(Request $request){
        $rules=array(
             'name' => 'required',
            'slug' => 'required|unique:events,slug,'.$request->id,
        );
        $validator=Validator::make($request->all(),$rules);
        $success_response = 0;
        $data =  null;
        $msg = 'Something Wrong';
        if($validator->fails()){
           $msg = $validator->errors();
        }else{

            $record = array(
                    'name' => $this->inputStripTag($request->name),
                    'slug' => $this->inputStripTag($request->slug),
            );
            $dataHas = Event::where('id',$request->id)->get()->first();
            if($dataHas){
                $update_obj = $dataHas->update($record);
                $success_response = 1;
                $data = $update_obj;
                $msg = 'Updated Successfully';
            }else{
                $save_obj = Event::create($record);
            
                if($save_obj){
                    $success_response = 1;
                    $data = $save_obj;
                    $msg = 'Save Successfully';
                }
            }
        }

        return response()->json([
                    'success' => $success_response,
                    'message' => $msg,
                    'data'    => $data,
        ]);
    }


    function getEvent(Request $request){

        $list = Event::where('id',$request->id)->get()->first();
        $data = null;
        $msg = 'Something Wrong';
        if(isset($list)){

            $data = $list->toArray();
            $msg = 'Data Successfully Fetched';

        }else{
            $msg = 'Data not found';
        }
        return response()->json([
                    'success' => 1,
                    'message' => $msg,
                    'data'    => $data
         ]);
    }

    
    function updateEvent(Request $request){
        
        $rules=array(
             'name' => 'required',
            'slug' => 'required|unique:events,slug,'.$request->id,
        );
        $validator=Validator::make($request->all(),$rules);
        $success_response = 0;
        $data =  null;
        $msg = 'Something Wrong';
        if($validator->fails()){
           $msg = $validator->errors();
        }else{

            $record = array(
                    'name' => $this->inputStripTag($request->name),
                    'slug' => $this->inputStripTag($request->slug),
            );
            $dataHas = Event::where('id',$request->id)->get()->first();
            if($dataHas){
                $update_obj = $dataHas->update($record);
                $success_response = 1;
                $data = $update_obj;
                $msg = 'Updated Successfully';
            }else{
                $save_obj = Event::create($record);
            
                if($save_obj){
                    $success_response = 1;
                    $data = $save_obj;
                    $msg = 'Save Successfully';
                }
            }
        }

        return response()->json([
                    'success' => $success_response,
                    'message' => $msg,
                    'data'    => $data,
        ]);
       
    }


    function inputStripTag($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    function delete(Request $request){

        $list = Event::where('id',$request->id)->get()->first();
        $data = null;
        $msg = 'Something Wrong';
        if(isset($list)){

            $data = $list->delete();
            $msg = 'Deleted Successfully';

        }else{
            $msg = 'Data not found';
        }
        return response()->json([
                    'success' => 1,
                    'message' => $msg,
                    'data'    => $data
         ]);
       
    }

    
}
