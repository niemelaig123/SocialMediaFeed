<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("themes")->insert([
            "name" => "Materia",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/materia/bootstrap.min.css",
            "created_by" => 1
        ]);
        DB::table("themes")->insert([
            "name" => "Minty",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css",
            "created_by" => 1
        ]);
        DB::table("themes")->insert([
            "name" => "Sandstone",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/sandstone/bootstrap.min.css",
            "created_by" => 1
        ]);
        DB::table("themes")->insert([
            "name" => "Sketchy",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/sketchy/bootstrap.min.css",
            "created_by" => 1
        ]);
        DB::table("themes")->insert([
            "name" => "Solar",
            "cdn_url" => "https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/solar/bootstrap.min.css",
            "created_by" => 1
        ]);
    }
}
