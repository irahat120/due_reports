<?php

namespace App\Http\Controllers;

use App\Models\add_batch;
use App\Models\add_class;
use App\Models\student_info;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function class_insert(Request $request)  {
       
        $add_class_name = new add_class;
        $add_class_name->c_name = $request->class_name;
        $add_class_name->save();

        return redirect()->route('add_class')->with('success','Insert Class name Successfully!');
    }

    public function batch_insert(Request $request)  {
       
        $add_batch_name = new add_batch;
        $add_batch_name->b_name = $request->Batch_name;
        $add_batch_name->save();

        return redirect()->route('add_batch')->with('success','Insert Batch name Successfully!');
    }


    public function update_class_name($id, Request $request){

        $update_class_name = add_class::find($id);
        $update_class_name->c_name = $request->class_name;
        $update_class_name->save();
        return redirect()->route('add_class')->with('success','Update Class name Successfully!');


    }

    public function update_batch_name($id, Request $request){

        $update_batch_name = add_batch::find($id);
        $update_batch_name->b_name = $request->Batch_name;
        $update_batch_name->save();

        return redirect()->route('add_batch')->with('success','Update Batch name Successfully!');


    }

    
    public function insert_student_information(Request $request) {
        
        return $request->all();
        // $insert_student_info = new student_info;
        // $insert_student_info->all();



    }

}
