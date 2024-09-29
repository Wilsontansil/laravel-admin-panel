<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'name' => 'master',
            'email' => 'master567@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $this->call(PermissionSeeder::class);

        $user->assignRole('master');
    }
}
