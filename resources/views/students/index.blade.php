@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-body">
        <div class="container">
        <h1 class="title">Students</h1>
        </div>
    </div>
</section>

    <div class="container">
        <a href="/" class="button">Go back</a>
        <a href="/students/create" class="button is-pulled-right">Create Student</a>
    </div>

    {{-- <div class="container is-pulled-right"> --}}

    </div>

    <div class="container">

        @if (count($students) > 0)
        <table class='table'>
            <tbody>
                @foreach ($students as $student)
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
