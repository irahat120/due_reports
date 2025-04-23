<?php

namespace App\Http\Controllers;

use App\Models\add_batch;
use App\Models\add_class;
use App\Models\fees_manage;
use App\Models\student_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ClassesController extends Controller
{

    //Insert function start------------------------------------------

    public function insert_fees_manage(Request $request){

        // dd($request->all());
        $fees_head =  $request->fees_head;
        $fees_type =  $request->fees_type;
        $class_name =  $request->class_name;
        $branch_name =  $request->branch_name;
        $amount =  $request->amount;
        $string = $request->month;
        foreach($string as $s){
            $fee = DB::table('fees')
            ->insert([
                'fees_head' => $fees_head,
                'fees_type' => $fees_type,
                'select_class' => $class_name,
                'batch_class' => $branch_name,
                'amount' => $amount,
                'select_month' =>$s,
                'created_at' => now(),
                'updated_at' =>now(),
            ]);

        }
        return redirect()->route('create_fee')->with('success','Create Fees Successfully!');

    }

    public function insert_student_information(Request $request) {

        $validated = $request->validate([
            's_name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'class_name' => 'required',
            'branch_name' => 'required',
            'roll_number' => 'required|unique:posts',
            'f_name' => 'required',
            'm_name' => 'required',
        ]);
        
        $auto_generate_Number = rand(100,1000);
        $insert_student_info = new student_info;
        $insert_student_info->s_name = $request->s_name;
        $insert_student_info->u_registration_number  = $auto_generate_Number;
        $insert_student_info->gender = $request->gender;
        $insert_student_info->phone = $request->phone_number;
        $insert_student_info->class_name = $request->class_name;
        $insert_student_info->batch_name = $request->branch_name;
        $insert_student_info->roll = $request->roll_number;
        $insert_student_info->father_name = $request->f_name;
        $insert_student_info->mother_name = $request->m_name;

        $insert_student_info->save();
        return redirect()->route('student_info')->with('success','add student Successfully!');

    }


    public function class_insert(Request $request)  {

        $validated = $request->validate([
            'class_name' => 'required'
        ]);
       
        $add_class_name = new add_class;
        $add_class_name->c_name = $request->class_name;

        $add_class_name->save();
        return redirect()->route('add_class')->with('success','Insert Class name Successfully!');
    }

    public function batch_insert(Request $request)  {

        $validated = $request->validate([
            'Batch_name' => 'required'
        ]);
       
        $add_batch_name = new add_batch;
        $add_batch_name->b_name = $request->Batch_name;

        $add_batch_name->save();
        return redirect()->route('add_batch')->with('success','Insert Batch name Successfully!');
    }


    //Insert function ends------------------------------------------

    //Update function start------------------------------------------

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

    //Update function ends------------------------------------------

    //View function start------------------------------------------
    

    public function student_view(){
        $student_list = DB::table('student_infos')->get();
        $class_list = DB::table('add_classes')->get();
        $batch_list = DB::table('add_batches')->get();

        return view('student_info',['view_student' => $student_list,'view_class' => $class_list,'view_batch' => $batch_list]);
    }


    public function class_view(){
        $class_view = DB::table('add_classes')->get();
        // $class_view = DB::table('add_classes')->limit(5)->get();

        return view('addclass',['view_class' =>$class_view]);

    }

    public function batch_view(){
        $batch_view = DB::table('add_batches')->get();

        return view('addbatch',['view_batch' =>$batch_view]);

    }

    public function fees_management(){
        $create_fees = DB::table('fees')->get();
        $class_list = DB::table('add_classes')->get();
        $batch_list = DB::table('add_batches')->get();

        return view('create_fee',['view_fees' => $create_fees,'view_class' => $class_list,'view_batch' => $batch_list]);
    }

    public function view_data(Request $request){

        
        

        $student_list = DB::table('student_infos')->get();

        $id = $request->id;

        $student_fees = DB::table('fees')->get();

        $student_profile = DB::table('student_infos')->where('id',$id)->get();

        return view('create_fee_management',[
            'view_student_profile' => $student_profile,
            'view_student' => $student_list,
            'view_student_fees' => $student_fees
        ]);

    }



    //View function ends------------------------------------------


}
