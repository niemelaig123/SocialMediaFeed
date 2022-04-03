@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New User</div>

                    <div class="card-body">
                        <form action="/users" method="post">
                            @csrf
                            {{--For their given name--}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">

                                @error("name")
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{--For Email--}}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">

                                @error("email")
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{--For password--}}
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter Password">

                                @error("password")
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{--For user admin role--}}
                            <div class="form-group">
                                <label for="password">User Administrator</label>
                                <input name="userAdmin" type="checkbox" class="form-control" id="userAdmin" value="userAdmin">

                                <label for="password">Moderator</label>
                                <input name="moderator" type="checkbox" class="form-control" id="moderator" value="moderator">

                                <label for="password">Theme Manager</label>
                                <input name="themeManager" type="checkbox" class="form-control" id="themeManager" value="themeManager">
                            </div>
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
