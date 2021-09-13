<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            'created_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('settings')->insert([
            'key' => 'shop_name',
            'value' => 'Tokoku',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('settings')->insert([
            'key' => 'address',
            'value' => 'Surabaya',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('settings')->insert([
            'key' => 'phone',
            'value' => '09876654321',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('settings')->insert([
            'key' => 'email',
            'value' => 'email@email.com',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
