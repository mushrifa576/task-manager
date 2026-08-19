@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">
            {{ $task->title }} {{ $task->completed ? '✅' : '' }}
        </h2>
        <p class="text-gray-600 mb-4">{{ $task->description ?? 'No description.' }}</p>
        <p class="text-xs text-gray-400 mb-6">Created {{ $task->created_at->diffForHumans() }}</p>

        <div class="flex gap-3 text-sm">
            <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Edit</a>
            <a href="{{ route('tasks.index') }}" class="text-gray-500 hover:text-gray-700">Back to list</a>
        </div>
    </div>
@endsection