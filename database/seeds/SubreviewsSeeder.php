<?php

use Illuminate\Database\Seeder;

class SubreviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SubReviews::class,20)->create();
    }
}
