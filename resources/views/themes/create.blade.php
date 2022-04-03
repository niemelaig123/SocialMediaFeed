@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Theme</div>

                    <div class="card-body">
                        <form action="/themes" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter CDN Name">

                                @error("name")
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{--For Email--}}
                            <div class="form-group">
                                <label for="cdn_url">CDN Url</label>
                                <input name="cdn_url" type=cdn_url class="form-control" id="cdn_url" aria-describedby="cdn_urlHelp" placeholder="Enter CDN Url">
                                @error("cdn_url")
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary">Add Theme</button>
                                <a href="/themes"><button type="submit" class="btn btn-light">Go Back</button></a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


