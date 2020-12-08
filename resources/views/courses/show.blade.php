@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ $course->name }}</h1>
                <h2 class="subtitle">
                    <small>Start Date: {{ $course->start_date }} </small>
                    <p>Duration: {{ $course->weeks }} weeks</p>
                </h2>
            </div>
        </div>
    </section>


    <div class="container">
        <a href="/courses" class="button">Go back</a>
        <a href="/courses/{{$course->id}}/edit" class="button">Edit</a>
    </div>

    <div class="container">
        {{ $course->description }}

        {{-- delete button --}}
        <form action="/courses/{{$course->id}}" method="POST" >
            @csrf
            @method('DELETE')
            <button class='button is-danger' type='submit'>Delete</button>
        </form>
    </div>

    {{-- <h2>Students</h2> --}}
    <div class="container">
        @if (count($course->students) > 0)
        <table class='table'>
            <thead>
                <th>
                    <td>Email</td>
                    <td>First</td>
                    <td>Last</td>
                </th>
            </thead>
            <tbody>
                @foreach ($course->students as $student)
                    <tr>
                        <td><a href="/students/{{$student->id}}">{{$student->email}}</a></td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @else
            <p>No students found</p>
        @endif
    </div>




@endsection
