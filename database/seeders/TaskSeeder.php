<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('tasks') as $task) {
            Task::factory()->create([
                'name' => $task,
            ]);
        }
    }
}
