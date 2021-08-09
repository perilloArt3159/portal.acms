<?php

namespace Database\Seeders;

use Database\Seeders\Auth\UserSeeder;
use Database\Seeders\Members\MemberCategorySeeder;
use Database\Seeders\Members\MemberSeeder; 

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
        if (env('APP_DEBUG')) 
        {
            $this->call(
                [
                    UserSeeder::class,
                    MemberCategorySeeder::class,
                    MemberSeeder::class,  
                ]
            );
        }
    }
}
