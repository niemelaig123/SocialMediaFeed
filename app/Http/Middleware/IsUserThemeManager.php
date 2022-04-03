<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IsUserThemeManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles = DB::table("roles_users")->where("user_id", Auth::user()->id)->pluck("role_id");
        if ($roles->contains(3)){
            return $next($request);
        } else {
            Session::flash("message", "Denied - You do not have permissions to access Themes Management");
            Session::flash("flash_type", "alert-danger");
            return redirect()->back();
        }

    }
}
