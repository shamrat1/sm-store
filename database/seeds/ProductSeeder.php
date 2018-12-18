<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(8),
            'email' => str_random(12).'@mail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
