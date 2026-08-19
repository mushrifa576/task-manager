@extends('layouts.app')

@section('content')
    <div class="flex justify-end mb-6">
        <a href="{{ route('tasks.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
            + New Task
        </a>
    </div>

    <div class="space-y-3">
        @forelse ($tasks as $task)
            <div class="bg-white rounded-xl shadow-sm p-4 flex items-center justify-between hover:shadow-md transition">
                <div>
                    <p class="font-semibold text-gray-800 {{ $task->completed ? 'line-through text-gray-400' : '' }}">
                        {{ $task->title }}
                    </p>
                    @if ($task->description)
                        <p class="text-sm text-gray-500 mt-1">{{ $task->description }}</p>
                    @endif
                    <span class="inline-block mt-2 text-xs font-medium px-2 py-0.5 rounded-full
                        {{ $task->completed ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $task->completed ? 'Completed' : 'Pending' }}
                    </span>
                </div>
                <div class="flex items-center gap-3 text-sm">
                    <a href="{{ route('tasks.show', $task) }}" class="text-gray-500 hover:text-gray-800">View</a>
                    <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 hover:text-indigo-800">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-400 py-16 bg-white rounded-xl border border-dashed">
                No tasks yet — create your first one above.
            </div>
        @endforelse
    </div>
@endsection