<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create(); //creates 5
        /*
        factory(App\Type::class, 5)->create(); //creates 5
        factory(App\Vendor::class, 5)->create(); //creates 5
        factory(App\Platform::class, 5)->create();
        */
    }
}
