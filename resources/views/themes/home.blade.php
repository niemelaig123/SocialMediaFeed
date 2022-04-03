@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Theme Management Dashboard</h3></div>
                </div>

                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between"><h4>Themes</h4>
                        <a href="/themes/create"><button class="btn btn-primary">Add New Theme</button></a>
                    </div>

                    <div class="card-body">

                        <ul class="list-group">
                            @foreach($themes as $theme)
                                <li class="list-group-item">
                                    <div class="justify-content-between d-flex flex-row">
                                        <div>{{ $theme->id }}</div>
                                        <div>{{ $theme->name }}</div>
                                        <div>
                                            <a href="/themes/{{ $theme->id }}"><button class="btn btn-success">Details</button></a>
                                            <a href="/themes/{{ $theme->id }}/edit"><button class=" btn btn-warning">Edit</button></a>
                                            <form action="/themes/{{ $theme->id }}/delete" method="post" class="flex-row d-inline-flex">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger">Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

