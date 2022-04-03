@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>User Management Dashboard</h3></div>


                </div>

                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between"><h4>Users</h4>
                        <a href="/users/create"><button class="btn btn-primary">Create New Admin User</button></a>
                    </div>

                    <div class="card-body">

                        <ul class="list-group">
                            @foreach($users as $user)
                                <li class="list-group-item">
                                    <div class="justify-content-between d-flex flex-row">
                                        <div>{{ $user->name }}</div>
                                        <div>
                                            <a href="/users/{{ $user->id }}"><button class="btn btn-success">Show</button></a>
                                            <a href="/users/{{ $user->id }}/edit"><button class=" btn btn-warning">Edit</button></a>
                                            <form action="/users/{{ $user->id }}/delete" method="post" class="flex-row d-inline-flex">
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
