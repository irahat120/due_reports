@extends('layouts.masterlayouts')

@section('title')
    Add Class Name
@endsection


@section('content')
<div class="alert alert-light mt-3" role="alert">

    @if (session('success'))
        <p class="text-success">{{ session('success') }}</p>
        
    @endif
    <h5>Add Student</h5>

    <form method="POST" action="{{route('view_fee_management')}}">
        @csrf
        <div class="input-group mb-3">

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Select Class</label>
                <select class="form-control" name="id">
                    <option value="">!---Select Class---!</option>
                    @foreach ($view_student as $student) 

                        {{$student->class_name}}
                        <option value="{{$student->id}}">{{ $student->id." | ".$student->s_name . " | " . $student->class_name . " | " . $student->batch_name. " | " . $student->roll}}</option>

                        @endforeach
                </select>
            </div>
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Submit">
        </div>

        

    </form>
    @foreach ($view_student_profile as $profile )


        <div class="card mt-2 col-md-6 p-2">
            <div class="card-body">
              <h5 class="card-title">Id: {{$profile->id}}</h5>
              <h5 class="card-title">Student Name: {{$profile->s_name}}</h5>
              <h5 class="card-title">Class: {{$profile->class_name}}</h5>
              <h5 class="card-title">Batch: {{$profile->batch_name}}</h5>
              <h5 class="card-title">Roll: {{$profile->roll}}</h5>
            </div>
        </div>
        <div class="container-fluid">
            <table class="table mt-5">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fees Head</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Fees Type</th>
                    <th scope="col">Class</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Amount </th>
                    <th scope="col">Due</th>
                  </tr>
                </thead>
               
                @foreach ($view_student_fees as  $view_fees)

                    @foreach ($view_student_months_due as $Months)
                        @if ($Months->format('F') == $view_fees->select_month)
                            @if ($profile->class_name == $view_fees->select_class)


                                <tbody class="table-group-divider">
                                
                                    <tr>
                                        <th>{{$view_fees->id}}</th>
                                        <td>{{$view_fees->fees_head}}</td>
                                        <td>{{$view_fees->select_month}}</td>
                                        <td>{{$view_fees->fees_type}}</td>
                                        <td>{{$view_fees->select_class}}</td>
                                        <td>{{$view_fees->batch_class}}</td>
                                        <td>{{$view_fees->amount}}</td>
                                        <td>{{$view_fees->status}}</td>
                                    </tr>
                                
                            
                                </tbody>
                            @endif
                        @endif
                    @endforeach
                @endforeach
            </table>
        </div>
                
        @endforeach
        
   
    
</div>
@endsection