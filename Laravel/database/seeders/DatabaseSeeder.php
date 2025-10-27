<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Eating;
use App\Models\Event;
use App\Models\Health;
use App\Models\Measure;
use App\Models\Sleep;
use App\Models\Training;
use App\Models\User;
use Database\Factories\MeasureFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'username'=> 'TestUser',
            'name' => 'UserTest',
            'email'=> 'Test@example.com',
            'password' => '12345Aa!',
            'birth_date' => '1999-01-01',
            'gender'=> 'nő'
        ]);
            Health::factory()->create([
                'user_id' => 1,
                'weight' => 56,
                'height' => 171,
                'date' => '2024-04-30'
            ]);
            Event::factory()->create([
               'user_id' => 1,
               'event_date' => '2024-04-30',
               'event_description' =>  "Napi edzés - futás, kondi"
            ]);
            Sleep::factory()->create([
                'event_id' => 1,
                'sleep_durration' => '8:02',
                'number_of_awaking' => 2,
                'sleep_quality' => 'Szendergés'
            ]);
            Training::factory()->create([
                'event_id' => 1,
                'number_of_steps' => 6502,
                'training_intensity' => 'Közepes',
                'training_durration' => '2:20',
                'training_type' => 'Futás',
                'training_location' => 'Futópálya'
            ]);
            Eating::factory()->create([
                'event_id' => 1,
                'calories_morning' => 600,
                'calories_evening' => 900,
                'calories_noon' => 500,
                'medicine' => 'C-vitamin',
                'amount_of_liquid' => 4
            ]);
            Measure::factory()->create([
                'event_id' => 1,
                'pulse' => 95,
                'blood_pressure' => '120/77'
            ]);
        for($i = 0; $i<10; $i++)        
        {
            $health = Health::factory()->for($user)->create();
            $event = Event::factory()->for($user)->create();
            $sleep = Sleep::factory()->for($event)->create();
            $training = Training::factory()->for($event)->create();
            $eating = Eating::factory()->for($event)->create();
            $measure = Measure::factory()->for($event)->create();
        }
    }
}
