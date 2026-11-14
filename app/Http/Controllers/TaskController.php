<?php

namespace App\Http\Controllers;

use App\Mail\TaskCompletedMail;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function welcome()
    {
        $todayTasks = Task::where('is_archived', false)
            ->whereDate('due_date', today())
            ->get();

        return view('welcome', compact('todayTasks'));
    }

    public function index()
    {
        $tasks = Task::where('is_archived', false)
            ->latest()
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'required|date',
            'status'      => 'required|in:pending,in_progress,done',
        ]);

        $validated['task_date'] = $validated['due_date'];
        $validated['is_archived'] = false;
        $task = Task::create($validated);

        if ($task->status === 'done') {
            Mail::to(config('mail.notification_recipient'))
                ->send(new TaskCompletedMail($task));
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'required|date',
            'status'      => 'required|in:pending,in_progress,done',
        ]);

        $validated['task_date'] = $validated['due_date'];

        $wasNotDone = $task->status !== 'done';
        $isNowDone  = $validated['status'] === 'done';

        $task->update($validated);

        if ($wasNotDone && $isNowDone) {
            Mail::to(config('mail.notification_recipient'))
                ->send(new TaskCompletedMail($task));
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->update(['is_archived' => true]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task archived successfully.');
    }
}