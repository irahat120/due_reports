@extends('layouts.masterlayouts')

@section('title')
    Student Information
@endsection


@section('content')
<div class="alert alert-light mt-3" role="alert">

    @if (session('success'))
        <p class="text-success">{{ session('success') }}</p>
        
    @endif
    <h5>Add Student</h5>

    <form method="POST" action="{{route('insert_student')}}">
        @csrf
        <div class="input-group mb-3">
            
            
            <div class="form-group col-md-6 p-2">
                <label for="exampleInputName2">Name</label>
                <input type="text" name="s_name" value="{{old('s_name')}}" class="form-control" id="exampleInputName2" placeholder="Student Name">
                @error('s_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Gender</label> <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div> 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                @error('gender')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputName2">phone</label>
                <input type="number" name="phone_number" value="{{old('phone_number')}}" class="form-control" id="exampleInputName2" placeholder="Phone Number">
                @error('phone_number')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Select Class</label>
                <select class="form-control" name="class_name">
                    <option value="">!---Select Class---!</option>
                    @foreach ($view_class as $class_name)
                        <option value="{{$class_name->c_name}}">{{$class_name->c_name}}</option>
                     @endforeach
                </select>
                @error('class_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Select Batch</label>
                <select class="form-control" name="branch_name">
                    <option value="">!---Select Batch---!</option>
                    @foreach ($view_batch as $batch_name)
                        <option value="{{$batch_name->b_name}}">{{$batch_name->b_name}}</option>
                    @endforeach
                </select>
                @error('branch_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputName2">Roll Number</label>
                <input type="number" name="roll_number" value="{{old('roll_number')}}" class="form-control" id="exampleInputName2" placeholder="Roll Number">
                @error('roll_number')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Father Name</label>
                <input type="text" name="f_name" value="{{old('f_name')}}" class="form-control" id="exampleInputEmail2" placeholder="Father Name">
                @error('f_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Mother Name</label>
                <input type="text" name="m_name" value="{{old('m_name')}}" class="form-control" id="exampleInputEmail2" placeholder="Mother Name">
                @error('m_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Submit">
        </div>

    </form>
   
    
</div>

<div class="container-fluid">
    <table class="table mt-5">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">User Registration Number</th>
            <th scope="col">Student Name</th>
            <th scope="col">Roll Number</th>
            <th scope="col">Gender</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Class</th>
            <th scope="col">Batch</th>
            <th scope="col">Status</th>
            <th scope="col">Modify</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          
            @foreach ($view_student as $student_info)
            <tr>
              <th scope="row">{{$student_info->id}}</th>
              <td>{{$student_info->u_registration_number }}</td>
              <td>{{$student_info->s_name}}</td>
              <td>{{$student_info->roll}}</td>
              <td>{{$student_info->gender}}</td>
              <td>{{$student_info->phone}}</td>
              <td>{{$student_info->class_name}}</td>
              <td>{{$student_info->batch_name}}</td>
              <td>{{$student_info->status}}</td>
              <td>
                <a href="" class="btn btn-danger"> Delete</a>
                <a href="" class="btn btn-info">Edit</a>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection