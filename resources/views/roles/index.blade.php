@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">Roles</h1>
      </div>
    </div>
</section>
    @if (count($roles) > 0)
            <div class="container">
                @foreach ($roles as $role)
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">{{$role->name}}</p>
                        </header>
                    </div>

            @endforeach
            </div>
            <div class="container" style='none'>
                {{$roles->links()}}
            </div>

    @else
        <p>No roles found</p>
    @endif
@endsection

