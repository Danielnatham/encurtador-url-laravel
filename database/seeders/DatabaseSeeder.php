<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\User;
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
            User::factory()
                ->create([
                    'name' => 'Usuario',
                    'email' => 'user@test.com',
                ]);

            Link::factory()
                ->count(100)
                ->create();
    }
}
