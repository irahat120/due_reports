@extends('layouts.masterlayouts')

@section('title')
    Student Information
@endsection


@section('content')
<div class="alert alert-light mt-3" role="alert">

    @if (session('success'))
        <p class="text-success">{{ session('success') }}</p>
        
    @endif
    <h5 style="float: left">Student list</h5>
    <a style="float: right" class="btn btn-primary" href="{{route('student_info')}}">Add Student</a>


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