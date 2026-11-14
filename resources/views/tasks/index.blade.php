@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">All Tasks</h1>
            <p class="text-sm text-gray-500">Manage your daily tasks and track completion status.</p>
        </div>
        <a href="{{ route('tasks.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded">
            + Create Task
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-200 text-sm">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="border border-gray-200 px-4 py-3 font-semibold">Title</th>
                    <th class="border border-gray-200 px-4 py-3 font-semibold">Description</th>
                    <th class="border border-gray-200 px-4 py-3 font-semibold">Due Date</th>
                    <th class="border border-gray-200 px-4 py-3 font-semibold">Status</th>
                    <th class="border border-gray-200 px-4 py-3 font-semibold text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-200 px-4 py-3 font-medium">{{ $task->title }}</td>
                        <td class="border border-gray-200 px-4 py-3 text-gray-600">{{ $task->description ?? '—' }}</td>
                        <td class="border border-gray-200 px-4 py-3">{{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</td>
                        <td class="border border-gray-200 px-4 py-3">
                            @if ($task->status === 'done')
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Done</span>
                            @elseif ($task->status === 'in_progress')
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">In Progress</span>
                            @else
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Pending</span>
                            @endif
                        </td>
                        <td class="border border-gray-200 px-4 py-3 text-center space-x-2">
                            <a href="{{ route('tasks.edit', $task) }}" class="inline-block bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded text-xs">
                                Edit
                            </a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Archive this task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                                    Archive
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border border-gray-200 px-4 py-6 text-center text-gray-500">
                            No active tasks found. Click "+ Create Task" to add one.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection