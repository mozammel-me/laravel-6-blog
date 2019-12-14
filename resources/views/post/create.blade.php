@extends('layouts.master')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h2 class="text-center">New Post</h2>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endforeach
                @endif

                {!! Form::open(['action' => 'PostController@store']) !!}
                <div class="form-group">
                    <label for="">Title</label>
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="">Details</label>
                    {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Create New Post', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>


@endsection
