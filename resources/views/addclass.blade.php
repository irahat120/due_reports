@extends('layouts.masterlayouts')

@section('title')
    Add Class Name
@endsection


@section('content')
    @if (session('success'))
        <p class="text-success">{{ session('success') }}</p>

    @endif
    <div class="alert alert-light" role="alert">
        <h5>Add Classes</h5>

        <form method="POST" action="{{route('class_name_insert')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Class Name</label>
                <input type="text" name="class_name" class="form-control" id="exampleFormControlInput1" placeholder="Class Name">
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
                <th scope="col">Batch Name</th>
                <th scope="col">Status</th>
                <th scope="col">Modify</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              
                @foreach ($view_class as $class)
                <tr>
                  <th scope="row">{{$class->id}}</th>
                  <td>{{$class->c_name}}</td>
                  <td>{{$class->status}}</td>
                  <td>
                    <a href="" class="btn btn-danger"> Delete</a>
                    <a href="{{route('edit_class', $class->id)}}" class="btn btn-info">Edit</a>
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection