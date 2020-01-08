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
        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'Shop Owner',
            'slug' => 'shop-owner',
        ]);
        DB::table('roles')->insert([
            'name' => 'Service Provider',
            'slug' => 'service-provider',
        ]);
        DB::table('roles')->insert([
            'name' => 'User',
            'slug' => 'user',
        ]);
    }
}
