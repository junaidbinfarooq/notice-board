<?php

namespace Database\Seeders;

use App\Models\Story;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Admin',
            'is_admin' => 1,
        ]);

        Story::factory(50)->create([
            'user_id' => $user->id
        ]);
    }
}
