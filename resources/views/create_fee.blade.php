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
            </div>
            <div class="form-group col-md-6 p-2">
                <label for="exampleInputEmail2">Select Month</label>
                <select class="form-control" name="ary[]" multiple="multiple">
                    <option value="Option 1">Option 1</option>
                    <option value="Option 2">Option 2</option>
                    <option value="Option 3">Option 3</option>
                    <option value="Option 4">Option 4</option>
                    <option value="Option 5">Option 5</option>
                </select>
            </div>
            
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Submit">
        </div>

    </form>
   
    
</div>

@endsection