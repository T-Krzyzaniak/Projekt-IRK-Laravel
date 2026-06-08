<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Course::factory()->create([
            'name' => 'Elektrotechnika',
            'collegium' => 'Collegium Mechanicus',
            'tryb' => 'Stacjonarny',
            'semestry' => '7',
            'oplata' => 'Brak',
        ]);

        Course::factory()->create([
            'name' => 'Elektrotechnika',
            'collegium' => 'Collegium Mechanicus',
            'tryb' => 'Niestacjonarny',
            'semestry' => '7',
            'oplata' => '3090zł/sem.',
        ]);  
        Course::factory()->create([
            'name' => 'Dietetyka',
            'collegium' => 'Collegium Novum',
            'tryb' => 'Stacjonarny',
            'semestry' => '6',
            'oplata' => 'Brak',

        ]);     
        Course::factory()->create([
            'name' => 'Dietetyka',
            'collegium' => 'Collegium Novum',
            'tryb' => 'Niestacjonarny',
            'semestry' => '6',
            'oplata' => '2090zł/sem.',
        ]);
        Course::factory()->create([
            'name' => 'Zarządzanie',
            'collegium' => 'Collegium Novum',
            'tryb' => 'Stacjonarny',
            'semestry' => '6',
            'oplata' => 'Brak',
        ]);
        
        Course::factory()->create([
            'name' => 'Zarządzanie',
            'collegium' => 'Collegium Novum',
            'tryb' => 'Niestacjonarny',
            'semestry' => '6',
            'oplata' => '2590zł/sem.',
        ]);
        
        Course::factory()->create([
            'name' => 'Logistyka',
            'collegium' => 'Collegium Novum',
            'tryb' => 'Stacjonarny',
            'semestry' => '6',
            'oplata' => 'Brak',
            ]); 

            Course::factory()->create([
            'name' => 'Logistyka',
            'collegium' => 'Collegium Novum',
            'tryb' => 'Niestacjonarny',
            'semestry' => '6',
            'oplata' => '2090zł/sem.',
        
        ]);
        Course::factory()->create([
            'name' => 'Informatyka',
            'collegium' => 'Collegium Oecologicum',
            'tryb' => 'Stacjonarny',
            'semestry' => '7',
            'oplata' => 'Brak',
        ]);
        Course::factory()->create([
            'name' => 'Informatyka',
            'collegium' => 'Collegium Oecologicum',
            'tryb' => 'Niestacjonarny',
            'semestry' => '7',
            'oplata' => '4000zł/sem.',
        ]);






    }
}
