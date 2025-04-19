@extends('layouts.masterlayouts')

@section('title')
    Edit Batch Name
@endsection


@section('content')

    <div class="alert alert-light" role="alert">
        <h5>Edit Batch Name</h5>

        <form method="POST" action="{{route('update_batch', $view_batch_name->id)}}">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Class Name</label>
                <input type="text" name="Batch_name" value="{{$view_batch_name->b_name}}" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Submit">
            </div>

        </form>
       
        
    </div>

@endsection