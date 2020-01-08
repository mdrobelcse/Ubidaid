<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'MD.Admin',
            'owner_name' => 'MD.Admin',
            'username' => 'admin',
            'email' => 'admin@ecommerce.com',
            'phone' => '01736997101',
            'image' => 'default.png',
            'profile' => 'default.png',
            'password' => bcrypt('rootadmin'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Shop owner',
            'owner_name' => 'Shop owner',
            'username' => 'shopowner',
            'email' => 'shopowner@ecommerce.com',
            'phone' => '01736997102',
            'image' => 'default.png',
            'profile' => 'default.png',
            'password' => bcrypt('rootshop'),
    
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'name' => 'Service Provider',
            'owner_name' => 'Service Provider',
            'username' => 'serviceprovider',
            'email' => 'serviceprovider@ecommerce.com',
            'phone' => '01736997103',
            'image' => 'default.png',
            'profile' => 'default.png',
            'password' => bcrypt('rootservice'),
        ]);

        DB::table('users')->insert([
            'role_id' => '4',
            'name' => 'User',
            'owner_name' => 'User',
            'username' => 'user',
            'email' => 'user@ecommerce.com',
            'phone' => '01736997104',
            'image' => 'default.png',
            'profile' => 'default.png',
            'password' => bcrypt('rootuser'),
        ]);

    }
}
