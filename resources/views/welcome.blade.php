@extends('layouts.master')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="jumbotron text-center">
                    <h1 class="display-4">Welcome to My Blog</h1>

                    @if (Auth::user())
                    <h3>{{Auth::user()->name}}</h3>
                    <a class="btn btn-info" href="/post">Go to Post Page</a>
                    @else
                    <p class="lead">This is a simple Blog</p>
                    <hr class="my-4">
                    <a class="btn btn-primary" href="/login">Login</a>
                    <a class="btn btn-info" href="/register">Registation</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
