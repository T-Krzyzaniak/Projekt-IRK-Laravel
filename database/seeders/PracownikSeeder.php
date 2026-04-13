<?php

namespace Database\Seeders;

use App\Models\Pracownik;
use App\Models\patients;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PracownikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $Grupa = Pracownik::factory(10)->create();

        patients::factory(20)
        ->recycle($Grupa)
        ->create();


    }
}
