@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero-body">
            <div class="container">
            <h1 class="title">{{ $student->first_name }} {{ $student->last_name}}</h1>
                <h2 class="subtitle">
                    <small>Matriculation Date: {{ $student->matriculation_date }} </small>
                    {{-- <p>Duration: {{ $student->weeks }} --}}
                </h2>
            </div>
        </div>
    </section>


    <div class="container">
        <a href="/students" class="button">Go back</a>
        <a href="/students/{{$student->id}}/edit" class="button">Edit</a>
    </div>

    <div class="container">
        {{-- <a href="/students/enroll" class="button">Add Course</a> --}}
        <form action="/students/enroll" method="POST" >
            @csrf
            <div class="control">
                <input type="hidden" class="input" value="{{$student->id}}" name="student_id">
            </div>
            <label class='label'>Course ID</label>
            <div class="control">
                <input type="text" class="input" placeholder="0" name="course_id">
            </div>
            <button class='button' type='submit'>Enroll</button>
        </form>
        @if (count($student->courses) > 0)
        <table class='table'>
            <tbody>
                @foreach ($student->courses as $course)
                    <tr>
                        <td><a href="/courses/{{$course->id}}">{{$course->name}}</a></td>
                        <td>{{$course->start_date}}</td>
                        {{-- <td>{{$student->last_name}}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

        @else
            <p>No courses found</p>
        @endif

        {{-- delete button --}}
        <form action="/students/{{$student->id}}" method="POST" >
            @csrf
            @method('DELETE')
            <button class='button is-danger' type='submit'>Delete</button>
        </form>
    </div>




@endsection
