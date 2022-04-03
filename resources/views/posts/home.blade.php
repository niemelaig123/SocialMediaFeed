@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h1>Da Feed</h1>
                        @if(Auth::user())
                            <a href="/posts/create"><button class="btn btn-primary">Create New Post</button></a>
                        @endif
                    </div>
                        @if (Session::has("message"))
                            <div class="alert {{ Session::get("flash_type") }}">
                                <p><strong>{{ Session::get("message") }}</strong></p>
                            </div>
                        @endif
                    <div class="card-body">

                        @foreach($posts as $post)
                            <div class="card mt-lg-1">
                                <div class="card-header">
                                    <h2>{{ $post->title }}</h2>
                                </div>
                                <div class="card-body">
                                    {{ $post->content }}
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    Post by {{ $post->author }} at {{ $post->created_at }}
                                    <div class="buttons">
                                        @if(Auth::user())
                                            @if(Auth::user()->id == $post->created_by)
                                                <a href="/posts/{{ $post->id }}/edit"><button class="btn btn-warning">Edit Post</button></a>
                                                <form action="/posts/{{ $post->id }}/delete" method="post" class="flex-row d-inline-flex">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger">Delete Post</button>
                                                </form>
                                            @elseif($roles->contains(2))
                                                <a href="/posts/{{ $post->id }}/edit"><button class="btn btn-warning">Edit Post</button></a>
                                                <form action="/posts/{{ $post->id }}/delete" method="post" class="flex-row d-inline-flex">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger">Delete Post</button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
