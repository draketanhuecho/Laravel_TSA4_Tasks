<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Task Completed</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; padding: 20px;">
    <h2 style="color: #16a34a;">Task Marked as Done</h2>
    <p>A task in <strong>Tasks for Today</strong> has been marked as completed:</p>
    <ul>
        <li><strong>Title:</strong> {{ $task->title }}</li>
        <li><strong>Description:</strong> {{ $task->description ?? 'No description provided' }}</li>
        <li><strong>Due Date:</strong> {{ $task->due_date ?? 'N/A' }}</li>
        <li><strong>Status:</strong> {{ ucfirst($task->status) }}</li>
    </ul>
    <p style="font-size: 0.9em; color: #666;">Completed on: {{ now()->format('F j, Y g:i A') }}</p>
</body>
</html>