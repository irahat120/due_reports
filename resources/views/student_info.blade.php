@extends('layouts.masterlayouts')

@section('title')
    Student Information
@endsection


@section('content')
<div class="alert alert-light mt-3" role="alert">
    <h5>Add Student</h5>

    <form method="POST" action="{{route('insert_student')}}">
        @csrf
        <div class="input-group mb-3">
            
            
            <div class="form-group col-md-6 p-2">
                <label for="exampleInputName2">Name</label>
                <input type="text" name="s_name" class="form-control" id="exampleInputName2" placeholder="Student Name">
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Gender</label> <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" id="inlineRadio1" value="Male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div> 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" id="inlineRadio2" value="Female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputName2">phone</label>
                <input type="number" name="phone_number" class="form-control" id="exampleInputName2" placeholder="Phone Number">
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Select Class</label>
                <select class="form-control" name="class_name">
                    <option value="">!---Select Class---!</option>
                    @foreach ($view_class as $class_name)
                        <option value="{{$class_name->c_name}}">{{$class_name->c_name}}</option>
                     @endforeach
                </select>
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Select Batch</label>
                <select class="form-control" name="branch_name">
                    <option value="">!---Select Batch---!</option>
                    @foreach ($view_batch as $batch_name)
                        <option value="{{$batch_name->b_name}}">{{$batch_name->b_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputName2">Roll Number</label>
                <input type="number" name="roll_number" class="form-control" id="exampleInputName2" placeholder="Roll Number">
            </div>
            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Father Name</label>
                <input type="text" name="f_name"  class="form-control" id="exampleInputEmail2" placeholder="Father Name">
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Mother Name</label>
                <input type="text" name="m_name" class="form-control" id="exampleInputEmail2" placeholder="Mother Name">
            </div>
            
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Submit">
        </div>

    </form>
   
    
</div>
@endsection