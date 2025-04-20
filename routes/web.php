<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassesController;
use App\Models\add_batch;
use App\Models\add_class;
use App\Models\student_info;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/student', function () {
    return view('student_info',[
        'view_class' => add_class::all(),
        'view_batch' => add_batch::all(),
        'view_student' => student_info::all()]);
})->name('student_info');


Route::get('/addclasses', function () {
    return view('addclass',['view_class' => add_class::all()]);
})->name('add_class');

Route::get('/addbatches', function () {
    return view('addbatch', ['view_batch' => add_batch::all()]);
})->name('add_batch');

Route::get('/edit_class_name/{id}',function(string $id){
    return view('edit_class_name',['view_class_name' =>add_class::findOrFail($id)]);
})->name('edit_class');

Route::get('/edit_batch_name/{id}',function(string $id){
    return view('edit_batch_name',['view_batch_name' =>add_batch::findOrFail($id)]);
})->name('edit_batch');



Route::Post
(
    '/insert_class', 
    [ClassesController::class, 
    'class_insert']
)->name('class_name_insert');

Route::Post('/insert_batch', [ClassesController::class, 'batch_insert'])->name('batch_name_insert');

Route::Post('/insert_student', [ClassesController::class, 'insert_student_information'])->name('insert_student');

Route::Post('/update_class_name/{id}', [ClassesController::class, 'update_class_name'])->name('update_class');
Route::Post('/update_Batch_name/{id}', [ClassesController::class, 'update_batch_name'])->name('update_batch');
