@extends('layouts.masterlayouts')

@section('title')
    Add Class Name
@endsection


@section('content')
    @if (session('success'))
        <p class="text-success">{{ session('success') }}</p>

    @endif

@endsection