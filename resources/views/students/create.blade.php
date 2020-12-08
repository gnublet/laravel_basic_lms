@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">Create Student</h1>
      </div>
    </div>
</section>

<div class="container">
    <form action="/students" method="POST">
        @csrf
        <label class='label'>First Name</label>
        <div class="control">
            <input type="text" class="input" placeholder="First Name" name="first_name">
        </div>
        <label class='label'>Last Name</label>
        <div class="control">
            <input type="text" class="input" placeholder="Last Name" name="last_name">
        </div>
        <label class='label'>Email</label>
        <div class="control">
            <input type="email" class="input" placeholder="email" name="email">
        </div>
        <label class='label'>Password</label>
        <div class="control">
            <input type="password" class="input" placeholder="password" name="password">
        </div>

        <label class='label'>Matriculation Date</label>
        <div class="control">
            <input type="date" class="input" placeholder="2020-12-30" name="matriculation_date">
        </div>

        <div class="control">
            <input type="hidden" class="input" value="0" name="currently_enrolled">
        </div>

        <button class='button' type='submit'>Submit</button>
    </form>
</div>


@endsection

