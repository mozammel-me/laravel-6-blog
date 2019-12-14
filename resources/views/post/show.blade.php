@extends('layouts.master')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">{{ $post->title }}</h2>
                        <div class="text-right">
                            @if ($post->user_id === Auth::id())
                            <!-- {{ $id = Crypt::encryptString($post->id) }} -->
                            <a class="btn btn-warning btn-sm" href="{{route('post.edit', $id)}}">Edit post</a>
                            @endif

                        </div>
                        <p>{{$post->details }}</p>
                        <p><span class="float-right">
                                Author: {{$post->user->name}}
                                <br>
                                Published: {{ date('d-M-Y', strtotime($post->created_at)) }}
                            </span>
                        </p>
                    </div>
                </div>
                <br>
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
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Comment</h3>
                        {!! Form::open(['action' => 'CommentController@store']) !!}
                        <div class="form-group">
                            <label for="">Comment</label>
                            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::hidden('post_id', $post->id) !!}
                        {!! Form::submit('Post Comment', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            @foreach ($post->comments as $comment)
                            <p>{{ $comment->comment }}</p>
                            <div class="text-right">
                                <span>
                                        Commented by: {{$comment->user->name}}
                                        <br>
                                        Date: {{ date('d-M-Y', strtotime($comment->created_at)) }}
                                </span>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
