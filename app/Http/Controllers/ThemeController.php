<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    public function __construct() {
        $this->middleware("auth")->except("set");
        $this->middleware("IsUserThemeManager")->except("set");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all();
        return view('themes.home', compact("themes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("themes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theme = request()->validate([
            "name" => "required",
            "cdn_url" => "required"
        ]);
        $theme["created_by"] = Auth::user()->id;

        //dd($theme);
         Theme::insert([
            "name" => $theme["name"],
            "cdn_url" => $theme["cdn_url"],
            "created_by" => $theme["created_by"]
        ]);
        return redirect("themes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        $theme = Theme::find($theme->id);
        return view("themes.show", compact("theme"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view("themes.edit", compact("theme"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $data = request()->validate([
            "name" => "required",
            "cdn_url" => "required"
        ]);
        $data["updated_by"] = Auth::user()->id;

        DB::table("themes")->where("id", "=", $theme->id)->update([
            "name" => $data["name"],
            "cdn_url" => $data["cdn_url"],
            "updated_by" => $data["updated_by"]
        ]);

        return redirect("/themes/".$theme->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        $data = Theme::findOrFail($theme->id);

        DB::table("themes")->where("id", "=", $theme->id)->update([
            "deleted_by" => Auth::user()->id
        ]);

        $data->delete();

        return redirect("themes");
    }

    public function set(Theme $theme) {
        //dd($theme);
        if ($theme->name != "Default") {
            return redirect()->back()->withCookie("theme", $theme->id);
        } else {
            Cookie::queue(Cookie::forget("theme"));
            return redirect()->back();
        }

    }
}
