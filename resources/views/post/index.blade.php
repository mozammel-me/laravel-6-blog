@extends('layouts/master')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h2 class="text-center">All Post</h2>
                @if (session()->get('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach ($posts as $post)
                <div class="card">
                    <div class="card-body">
                        <h3>{{$post->title}}</h3>

                        <p><span class="float-right">
                                Author: {{ $post->user->name }}
                                <br>
                                Published: {{ date('d-M-Y', strtotime($post->created_at)) }}
                            </span>
                        </p>
                        </p>
                        <a class="btn btn-info btn-sm" href="{{ route('post.show', $post->id) }}">Details</a>

                    </div>
                </div>
                <br>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
