@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">Edit Student</h1>
      </div>
    </div>
</section>

<div class="container">
<form action="/students/{{$student->id}}" method="POST">
        @csrf
        @method('PUT')
        <label class='label'>First Name</label>
        <div class="control">
            <input type="text" class="input" value="{{$student->first_name}}" name="first_name">
        </div>
        <label class='label'>Last Name</label>
        <div class="control">
            <input type="text" class="input" value="{{$student->last_name}}" name="last_name">
        </div>
        <label class='label'>Email</label>
        <div class="control">
            <input type="email" class="input" value="{{$student->email}}" name="email">
        </div>
        {{-- TODO: protect password. --}}
        <label class='label'>Password</label>
        <div class="control">
            <input type="password" class="input" value="{{$student->password}}" name="password">
        </div>

        <label class='label'>Matriculation Date</label>
        <div class="control">
            <input type="date" class="input" value="{{$student->matriulcation_date}}" name="matriculation_date">
        </div>

        <div class="control">
            <input type="hidden" class="input" value="{{$student->currently_enrolled}}" name="currently_enrolled">
        </div>

        <button class='button' type='submit'>Submit</button>
    </form>
</div>


@endsection

