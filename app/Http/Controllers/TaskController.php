<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    public function index(): View
    {
        return view('tasks', [
            'tasks' => Task::all()
        ]);
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $task = Task::create($request->validated());

        return back()->with('message', 'Task ' . $task->name . ' created successfully');
    }

    public function update(Task $task): RedirectResponse
    {
        // TODO we may want a form request if for example we wanted to 'uncomplete' a task
        $task->update([
            'completed_at' => now()
        ]);

        return back()->with('message', 'Task ' . $task->name . ' completed successfully');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return back()->with('message', 'Task ' . $task->name . ' deleted successfully');
    }
}
