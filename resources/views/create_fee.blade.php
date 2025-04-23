@extends('layouts.masterlayouts')

@section('title')
    Add Class Name
@endsection


@section('content')
<div class="alert alert-light mt-3" role="alert">

    @if (session('success'))
        <p class="text-success">{{ session('success') }}</p>
        
    @endif
    <h5>Add Fees Management</h5>

    <form method="POST" action="{{route('fees_manage')}}">
        @csrf
        <div class="input-group mb-3">
            
            
            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Fees Head</label>
                <select class="form-control" name="fees_head">
                    <option value="">!---Select Fees Head---!</option>
                    <option value="Monthly Fee">Monthly Fee</option>
                    <option value="Admission Fee">Admission Fee</option>
                    <option value="Semester Fee">Semester Fee</option>

                </select>
            </div>

            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Fees Type</label>
                <select class="form-control" name="fees_type">
                    <option value="">!---Select Fees Type---!</option>
                    <option value="Batch Based">Batch Based</option>
                    <option value="Class Based">Class Based</option>

                </select>
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
                <label for="exampleInputName2">Amount</label>
                <input type="number" name="amount" value="{{old('amount')}}" class="form-control" id="exampleInputName2" placeholder="Amount">
                @error('amount')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <div style="margin-top: 20px">
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
            </div>
            
            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Select Month</label>
                <select class="form-control" name="month[]" multiple="multiple" >
                    <option value="">all</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>

                </select>
            </div>

            
        </div>
       

    </form>
   
    
</div>

<div class="container-fluid">
    <table class="table mt-5">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Fees Head</th>
            <th scope="col">Fees Type</th>
            <th scope="col">Class</th>
            <th scope="col">Batch</th>
            <th scope="col">Amount</th>
            <th scope="col">Month</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          
            @foreach ($view_fees as $view_table)
            <tr>
              <th scope="row">{{$view_table->id}}</th>
              <td>{{$view_table->fees_head }}</td>
              <td>{{$view_table->fees_type}}</td>
              <td>{{$view_table->select_class}}</td>
              <td>{{$view_table->batch_class}}</td>
              <td>{{$view_table->amount}}</td>
              <td>{{$view_table->select_month}}</td>
              <td>{{$view_table->status}}</td>
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