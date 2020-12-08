@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-body">
        <div class="container">
        <h1 class="title">Courses</h1>
        </div>
    </div>
</section>

    <div class="container">
        <a href="/" class="button">Go back</a>
        <a href="/courses/create" class="button is-pulled-right">Create Course</a>
    </div>

    {{-- <div class="container is-pulled-right"> --}}

    </div>

    <div class="container">

        @if (count($courses) > 0)
        <table class='table'>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Course Name</td>
                    <td>Start Date</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td><a href="/courses/{{$course->id}}">{{$course->name}}</a></td>
                        <td>{{$course->start_date}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @else
            <p>No roles found</p>
        @endif
    </div>

@endsection
