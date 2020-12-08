@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">Create Course</h1>
      </div>
    </div>
</section>

<div class="container">
    <form action="/courses" method="POST">
        @csrf
        <label class='label'>Name</label>
        <div class="control">
            <input type="text" class="input" placeholder="Course Name" name="name">
        </div>
        <label class='label'>Description</label>
        <div class="control">
            <input type="text" class="input" placeholder="description" name="description">
        </div>
        <label class='label'>Start Date</label>
        <div class="control">
            <input type="date" class="input" placeholder="2020-12-30" name="start_date">
        </div>
        <label class='label'>Duration (weeks)</label>
        <div class="control">
            <input type="text" class="input" placeholder="2" name="weeks">
        </div>

        <button class='button' type='submit'>Submit</button>
    </form>
</div>


@endsection

