@extends('layouts.masterlayouts')

@section('title')
    Edit Class Name
@endsection


@section('content')

    <div class="alert alert-light" role="alert">
        <h5>Edit Class Name</h5>

        <form method="POST" action="{{route('update_class', $view_class_name->id)}}">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Class Name</label>
                <input type="text" name="class_name" value="{{$view_class_name->c_name}}" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Submit">
            </div>

        </form>
       
        
    </div>

@endsection