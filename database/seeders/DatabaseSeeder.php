<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Candidate;
use App\Enums\Auth\RoleType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class
        ]);
                 $this->call([
            RoleSeeder::class
        ]);
         $this->call([
            PracownikSeeder::class
        ]);
        $this->call([
            CandidateSeeder::class
        ]);

        $Grupa1 = User::factory(10)->withoutTwoFactor()->create();   
        Candidate::factory(10)
        ->sequence(fn ($sequence) => ['user_id' => $Grupa1[$sequence->index]->id])
        ->create();






        User::factory()->withoutTwoFactor()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ])->assignRole(RoleType::ADMIN->value);

        User::factory()->withoutTwoFactor()->create([
            'name' => 'Test User1',
            'email' => 'test1@example.com',
        ])->assignRole(RoleType::WORKER->value);
    }
}
