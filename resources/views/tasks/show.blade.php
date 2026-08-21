@extends('layouts.app')

@section('title', 'Task Details')

@section('content')

<div class="max-w-3xl mx-auto">

    <!-- Back -->
    <a href="{{ route('tasks.index') }}"
       class="inline-flex items-center gap-2
              text-sm text-slate-500
              hover:text-indigo-600
              transition mb-6">

        ← Back to tasks

    </a>


    <!-- Task Card -->
    <div class="bg-white rounded-2xl
                border border-slate-200
                shadow-sm overflow-hidden">


        <!-- Header -->
        <div class="p-6 sm:p-8 border-b border-slate-200">

            <div class="flex flex-col sm:flex-row
                        sm:items-start
                        sm:justify-between gap-4">

                <div>

                    <div class="mb-3">

                        @if ($task->completed)

                            <span class="inline-flex items-center
                                         gap-1.5
                                         px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-emerald-100
                                         text-emerald-700">

                                ✓ Completed

                            </span>

                        @else

                            <span class="inline-flex items-center
                                         gap-1.5
                                         px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-amber-100
                                         text-amber-700">

                                ● Pending

                            </span>

                        @endif

                    </div>


                    <h2 class="text-3xl font-bold
                               text-slate-900">

                        {{ $task->title }}

                    </h2>

                </div>


                <!-- Status Icon -->
                <div class="w-12 h-12 rounded-xl
                            {{ $task->completed
                                ? 'bg-emerald-100 text-emerald-600'
                                : 'bg-amber-100 text-amber-600' }}
                            flex items-center justify-center
                            text-xl flex-shrink-0">

                    {{ $task->completed ? '✓' : '○' }}

                </div>

            </div>

        </div>


        <!-- Details -->
        <div class="p-6 sm:p-8">

            <div class="mb-8">

                <h3 class="text-sm font-semibold
                           text-slate-700 mb-3">

                    Description

                </h3>

                <div class="bg-slate-50 rounded-xl p-5">

                    @if ($task->description)

                        <p class="text-slate-600 leading-relaxed
                                  whitespace-pre-line">

                            {{ $task->description }}

                        </p>

                    @else

                        <p class="text-slate-400 italic">
                            No description provided.
                        </p>

                    @endif

                </div>

            </div>


            <!-- Metadata -->
            <div class="grid grid-cols-1 sm:grid-cols-2
                        gap-4 mb-8">

                <div class="bg-slate-50 rounded-xl p-4">

                    <p class="text-xs text-slate-400 uppercase
                              tracking-wide">

                        Created

                    </p>

                    <p class="font-medium text-slate-700 mt-1">

                        {{ $task->created_at->format('M d, Y') }}

                    </p>

                    <p class="text-xs text-slate-400 mt-1">

                        {{ $task->created_at->diffForHumans() }}

                    </p>

                </div>


                <div class="bg-slate-50 rounded-xl p-4">

                    <p class="text-xs text-slate-400 uppercase
                              tracking-wide">

                        Status

                    </p>

                    <p class="font-medium text-slate-700 mt-1">

                        {{ $task->completed ? 'Completed' : 'Pending' }}

                    </p>

                </div>

            </div>


            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-3">

                <a href="{{ route('tasks.edit', $task) }}"
                   class="flex-1 text-center
                          bg-indigo-600
                          hover:bg-indigo-700
                          text-white
                          font-semibold
                          px-5 py-3
                          rounded-xl
                          transition">

                    Edit Task

                </a>

                <form
                    action="{{ route('tasks.destroy', $task) }}"
                    method="POST"
                    class="flex-1"
                    onsubmit="return confirm('Are you sure you want to delete this task?')">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="w-full
                               bg-red-50
                               hover:bg-red-100
                               text-red-600
                               font-semibold
                               px-5 py-3
                               rounded-xl
                               transition">

                        Delete Task

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
