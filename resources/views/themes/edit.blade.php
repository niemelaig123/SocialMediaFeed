@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between"><h4>{{ $theme->name }}</h4>
                        <a href="/themes"><button class="btn btn-primary">Go Back</button></a>
                    </div>

                    <div class="card-body">
                        <form action="/themes/{{ $theme->id }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" value="{{ $theme->name }}">

                                @error("name")
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{--For Email--}}
                            <div class="form-group">
                                <label for="cdn_url">CDN Url</label>
                                <input name="cdn_url" type=cdn_url class="form-control" id="cdn_url" aria-describedby="cdn_urlHelp" value="{{ $theme->cdn_url }}">
                                @error("cdn_url")
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary">Update Theme</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


