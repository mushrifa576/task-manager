@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center
                sm:justify-between gap-4 mb-8">

        <div>
            <p class="text-sm font-medium text-indigo-600 mb-1">
                YOUR WORKSPACE
            </p>

            <h2 class="text-3xl font-bold text-slate-900">
                My Tasks
            </h2>

            <p class="text-slate-500 mt-1">
                Manage and track your tasks easily.
            </p>
        </div>

        <a href="{{ route('tasks.create') }}"
           class="inline-flex items-center justify-center gap-2
                  bg-indigo-600 hover:bg-indigo-700
                  text-white font-semibold
                  px-5 py-3 rounded-xl
                  shadow-sm hover:shadow-md
                  transition">

            <span class="text-lg">+</span>
            New Task
        </a>

    </div>


    <!-- Task Statistics -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">

        <!-- Total -->
        <div class="bg-white rounded-2xl border border-slate-200
                    p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-slate-500">
                        Total Tasks
                    </p>

                    <p class="text-2xl font-bold text-slate-900 mt-1">
                        {{ $tasks->count() }}
                    </p>
                </div>

                <div class="w-11 h-11 rounded-xl bg-indigo-50
                            flex items-center justify-center">
                    📋
                </div>

            </div>
        </div>


        <!-- Completed -->
        <div class="bg-white rounded-2xl border border-slate-200
                    p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-slate-500">
                        Completed
                    </p>

                    <p class="text-2xl font-bold text-emerald-600 mt-1">
                        {{ $tasks->where('completed', true)->count() }}
                    </p>
                </div>

                <div class="w-11 h-11 rounded-xl bg-emerald-50
                            flex items-center justify-center">
                    ✓
                </div>

            </div>
        </div>


        <!-- Pending -->
        <div class="bg-white rounded-2xl border border-slate-200
                    p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-slate-500">
                        Pending
                    </p>

                    <p class="text-2xl font-bold text-amber-600 mt-1">
                        {{ $tasks->where('completed', false)->count() }}
                    </p>
                </div>

                <div class="w-11 h-11 rounded-xl bg-amber-50
                            flex items-center justify-center">
                    ⏳
                </div>

            </div>
        </div>

    </div>


    <!-- Tasks -->
    <div class="space-y-4">

        @forelse ($tasks as $task)

            <div class="bg-white rounded-2xl
                        border border-slate-200
                        p-5 sm:p-6
                        shadow-sm
                        hover:shadow-md
                        transition">

                <div class="flex flex-col lg:flex-row
                            lg:items-center lg:justify-between gap-5">

                    <!-- Task Information -->
                    <div class="flex items-start gap-4 min-w-0">

                        <!-- Status Icon -->
                        <div class="flex-shrink-0">

                            @if ($task->completed)

                                <div class="w-10 h-10 rounded-xl
                                            bg-emerald-100
                                            text-emerald-600
                                            flex items-center justify-center
                                            font-bold">
                                    ✓
                                </div>

                            @else

                                <div class="w-10 h-10 rounded-xl
                                            bg-amber-100
                                            text-amber-600
                                            flex items-center justify-center">
                                    •
                                </div>

                            @endif

                        </div>


                        <!-- Text -->
                        <div class="min-w-0">

                            <h3 class="font-semibold text-lg
                                       {{ $task->completed
                                            ? 'line-through text-slate-400'
                                            : 'text-slate-900' }}">

                                {{ $task->title }}

                            </h3>

                            @if ($task->description)

                                <p class="text-sm text-slate-500 mt-1
                                          break-words">

                                    {{ $task->description }}

                                </p>

                            @else

                                <p class="text-sm text-slate-400 mt-1">
                                    No description provided.
                                </p>

                            @endif


                            <!-- Status -->
                            <div class="mt-3">

                                @if ($task->completed)

                                    <span class="inline-flex items-center
                                                 gap-1.5
                                                 px-3 py-1 rounded-full
                                                 text-xs font-semibold
                                                 bg-emerald-100
                                                 text-emerald-700">

                                        ✓ Completed

                                    </span>

                                @else

                                    <span class="inline-flex items-center
                                                 gap-1.5
                                                 px-3 py-1 rounded-full
                                                 text-xs font-semibold
                                                 bg-amber-100
                                                 text-amber-700">

                                        ● Pending

                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>


                    <!-- Actions -->
                    <div class="flex flex-wrap items-center gap-2
                                lg:flex-nowrap">

                        <a href="{{ route('tasks.show', $task) }}"
                           class="px-4 py-2 rounded-lg
                                  text-sm font-medium
                                  text-slate-600
                                  bg-slate-100
                                  hover:bg-slate-200
                                  transition">

                            View
                        </a>

                        <a href="{{ route('tasks.edit', $task) }}"
                           class="px-4 py-2 rounded-lg
                                  text-sm font-medium
                                  text-indigo-600
                                  bg-indigo-50
                                  hover:bg-indigo-100
                                  transition">

                            Edit
                        </a>

                        <form action="{{ route('tasks.destroy', $task) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this task?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="px-4 py-2 rounded-lg
                                           text-sm font-medium
                                           text-red-600
                                           bg-red-50
                                           hover:bg-red-100
                                           transition">

                                Delete

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <!-- Empty State -->
            <div class="bg-white rounded-2xl
                        border border-dashed border-slate-300
                        p-12 text-center">

                <div class="w-16 h-16 mx-auto
                            rounded-2xl bg-indigo-50
                            flex items-center justify-center
                            text-3xl mb-4">
                    📝
                </div>

                <h3 class="text-lg font-semibold text-slate-800">
                    No tasks yet
                </h3>

                <p class="text-slate-500 text-sm mt-1 mb-6">
                    Create your first task and start organizing your work.
                </p>

                <a href="{{ route('tasks.create') }}"
                   class="inline-flex items-center gap-2
                          bg-indigo-600 hover:bg-indigo-700
                          text-white font-semibold
                          px-5 py-2.5 rounded-xl transition">

                    + Create Task

                </a>

            </div>

        @endforelse

    </div>

@endsection
