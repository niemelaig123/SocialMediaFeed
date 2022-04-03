<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
            "name" => "User Administrator",
            "description" => "Exactly what it sounds like"
        ]);
        DB::table("roles")->insert([
            "name" => "Moderator",
            "description" => "Exactly what it sounds like"
        ]);
        DB::table("roles")->insert([
            "name" => "Theme Manager",
            "description" => "Exactly what it sounds like"
        ]);
    }
}

