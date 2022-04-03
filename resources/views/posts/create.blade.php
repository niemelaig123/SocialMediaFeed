@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Post</div>

                    <div class="card-body">
                        <form action="/posts" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title">

                                @error("title")
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{--For Email--}}
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" type="text" class="form-control" id="content" aria-describedby="contentHelp" rows="8" placeholder="Enter Content">
                                </textarea>
                                @error("content")
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary">Create Post</button>
                                <a href="/posts"><button type="submit" class="btn btn-light">Go Back</button></a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

