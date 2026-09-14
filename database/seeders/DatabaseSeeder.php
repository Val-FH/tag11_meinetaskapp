<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //funktion um user anzulegen 10 stück
         User::factory(10)->create();
         $user_ids =$users->pluck("id")->toArray();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $tasks = [
            ['title' => 'IT Basics', 'description' => 'Grundlegende Programmierung', 'done' => true,'user_id' => Arr::random($user_ids)],
            ['title' => 'Laravel Basics', 'description' => 'Routing und Controller in Laravel', 'done' => true, 'user_id' => Arr::random($user_ids)],
            ['title' => 'Java Basics', 'description' => 'Grundlegende Java-Konzepte', 'done' => true, 'user_id' => Arr::random($user_ids)],
            ['title' => 'It Professionels', 'description' => 'Vertiefung Programmierung allgemein', 'done' => true, 'user_id' => Arr::random($user_ids)],
            ['title' => 'Laravel Professionels', 'description' => 'Vertiefung Laravel', 'done' => true, 'user_id' => Arr::random($user_ids)],
            ['title' => 'Java Professionels', 'description' => 'Vertiefung Java', 'done' => true, 'user_id' => Arr::random($user_ids)],

            ['title' => 'Zugriffe in Laravel', 'description' => 'Authorisierung und Gruppierung in Laravel', 'done' => false, 'user_id' => Arr::random($user_ids)],
        ];

        foreach($tasks as $task)
            Task::create($task);

    }
}
