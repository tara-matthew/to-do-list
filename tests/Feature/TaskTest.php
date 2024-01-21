<?php

namespace Tests\Feature;

use App\Http\Controllers\TaskController;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_displays_a_list_of_tasks(): void
    {
        $tasks = Task::factory(2)->create();

        $this->get(route('home'))
            ->assertStatus(200)
            ->assertSeeInOrder([$tasks[0]->name, $tasks[1]->name]);
    }

    public function test_it_stores_a_task(): void
    {
        $data = [
            'name' => 'My test task',
        ];

        $response = $this->post(route('tasks.store'), $data);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('tasks', $data);
        $response->assertSessionHas('message', 'Task My test task '.'created successfully');
    }

    public function test_it_deletes_a_task(): void
    {
        $task = Task::factory()->create();
        $this->assertDatabaseHas('tasks', ['id' => $task->id]);

        $response = $this->delete(route('tasks.destroy', $task));
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);

        $response->assertRedirect('/');
        $response->assertSessionHas('message', 'Task '.$task->name.' deleted successfully');
    }

    public function test_it_updates_a_task(): void
    {
        Carbon::setTestNow();

        $task = Task::factory()->create();
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'completed_at' => null]);

        $response = $this->patch(route('tasks.update', $task));
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'completed_at' => now()]);

        $response->assertRedirect('/');
        $response->assertSessionHas('message', 'Task '.$task->name.' completed successfully');
    }

    public function test_store_validates_using_a_form_request(): void
    {
        $this->assertActionUsesFormRequest(
            TaskController::class,
            'store',
            StoreTaskRequest::class
        );
    }
}
