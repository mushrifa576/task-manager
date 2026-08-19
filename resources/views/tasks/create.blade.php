@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">New Task</h2>

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"></textarea>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                    Save Task
                </button>
                <a href="{{ route('tasks.index') }}"
                   class="text-gray-500 hover:text-gray-700 text-sm font-medium px-4 py-2">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection