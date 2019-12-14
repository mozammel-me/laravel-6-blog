@extends('layouts.master')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h2 class="text-center">Edit the post</h2>
                @if (session()->get('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
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
               <!-- {{ $id = Crypt::encryptString($post->id) }} -->
                {!! Form::model($post, ['method' => 'PATCH','action' => ['PostController@update', $id]]) !!}
                <div class="form-group">
                    <label for="">Title</label>
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="">Details</label>
                    {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@endsection
