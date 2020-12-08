@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">Edit Course</h1>
      </div>
    </div>
</section>

<div class="container">
<form action="/courses/{{$course->id}}" method="POST">
        @csrf
        @method('PUT')
        {{-- spoof post request as a PUT request using _method --}}
        {{-- <input name="_method" type="hidden" value="PUT"> --}}
        <label class='label'>Name</label>
        <div class="control">
            <input type="text" class="input" value="{{$course->name}}" name="name">
        </div>
        <label class='label'>Description</label>
        <div class="control">
            <input type="text" class="input" value="{{$course->description}}" name="description">
        </div>
        <label class='label'>Start Date</label>
        <div class="control">
            <input type="date" class="input" value="{{$course->start_date}}" name="start_date">
        </div>
        <label class='label'>Duration (weeks)</label>
        <div class="control">
            <input type="text" class="input" value="{{$course->weeks}}" name="weeks">
        </div>

        <button class='button' type='submit'>Submit</button>
    </form>
</div>


@endsection

