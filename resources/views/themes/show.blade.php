@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between"><h4>Theme Details for {{ $theme->name }}</h4>
                        <a href="/themes"><button class="btn btn-primary">Go Back</button></a>
                    </div>

                    <div class="card-body">
                        <div>
                            <h4>Name</h4>
                            <p>{{ $theme->name }}</p>
                        </div>
                        <div>
                            <h4>CDN Url</h4>
                            <p>{{ $theme->cdn_url }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
