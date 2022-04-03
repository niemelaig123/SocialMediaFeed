@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between"><h4>{{ $user->name }}</h4>
                        <a href="/users"><button class="btn btn-primary mt-2">Return to Admin page</button></a>
                    </div>

                    <div class="card-body">
                        <h2>Roles</h2>
                        <ul class="list-group">
                            @foreach($roles as $role)
                                @if($role == 1)
                                    <li class="list-group-item">User Administrator</li>
                                @elseif($role == 2)
                                    <li class="list-group-item">Moderator</li>
                                @elseif($role == 3)
                                    <li class="list-group-item">Theme Manager</li>
                                @else
                                    <li class="list-group-item">User has no admin permissions</li>
                                @endif

                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
