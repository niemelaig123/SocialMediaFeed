<?php

namespace App\Http\Controllers;


use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
        $this->middleware("IsUserAdmin");
    }

    public function index()
    {
        $users = User::all();
        return view('user.home', compact("users"));
    }


    public function create()
    {
        return view("user.create");
    }

    public function store(Request $request)
    {

        $user = request()->validate([
          "name" => "required",
          "email" => "required|email",
          "password" => "required"
        ]);
        $data = request(); // Getting rest of properties after validating mains
        // Gotta hash them passwords yo
        $user["password"] = password_hash($data["password"], PASSWORD_BCRYPT);

        $email = $data["email"];
        $user = User::create($user);
        $userId = DB::table("users")->where("email", $email)->value("id");


        // If admin box is checked
        if (isset($data["userAdmin"])) {
            DB::table("roles_users")->insertOrIgnore([
                "user_id" => $userId,
                "role_id" => 1
            ]);
        }
        // If mod box is checked
        if (isset($data["moderator"])) {
            DB::table("roles_users")->insertOrIgnore([
                "user_id" => $userId,
                "role_id" => 2
            ]);
        }
        // If theme box is checked
        if (isset($data["themeManager"])) {
            DB::table("roles_users")->insertOrIgnore([
                "user_id" => $userId,
                "role_id" => 3
            ]);
        }

        return redirect("/users/".$userId);

    }

    public function show($id)
    {
        $user = User::find($id);
        $roles = DB::table("roles_users")->where("user_id", $user->id)->pluck("role_id");
        return view("user.show", compact("user", "roles"));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = DB::table("roles_users")->where("user_id", $user->id)->orderBy("role_id")->pluck("role_id");
        return view("user.edit", compact("user", "roles"));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required"
        ]);
        $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);
        $user = User::findOrFail($id);
        $user->update($data);

        $data = request();
        // If admin box is checked
        if (isset($data["userAdmin"])) {
            if (!DB::table("roles_users")->where("user_id", "=", $id)->where("role_id", "=", 1)->exists()) {
                DB::table("roles_users")->insertOrIgnore([
                    "user_id" => $id,
                    "role_id" => 1
                ]);
            }
        }
        // If mod box is checked
        if (isset($data["moderator"])) {
            if (!DB::table("roles_users")->where("user_id", "=", $id)->where("role_id", "=", 2)->exists()) {
                DB::table("roles_users")->insertOrIgnore([
                    "user_id" => $id,
                    "role_id" => 2
                ]);
            }
        }
        // If theme box is checked
        if (isset($data["themeManager"])) {
            if (!DB::table("roles_users")->where("user_id", "=", $id)->where("role_id", "=", 3)->exists()) {
                DB::table("roles_users")->insertOrIgnore([
                    "user_id" => $id,
                    "role_id" => 3
                ]);
            }
        }

        return redirect("/users/".$id);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        DB::table("roles_users")->where("user_id", "=", $id)->delete();


        return redirect("home");
    }


}
