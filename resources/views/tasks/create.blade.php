@extends('layouts.app')

@section('title', 'Create Task')

@section('content')

<div class="max-w-2xl mx-auto">

    <!-- Header -->
    <div class="mb-6">

        <a href="{{ route('tasks.index') }}"
           class="inline-flex items-center gap-2
                  text-sm text-slate-500
                  hover:text-indigo-600 transition mb-4">

            ← Back to tasks

        </a>

        <h2 class="text-3xl font-bold text-slate-900">
            Create New Task
        </h2>

        <p class="text-slate-500 mt-1">
            Add a new task to your workspace.
        </p>

    </div>


    <!-- Form Card -->
    <div class="bg-white rounded-2xl
                border border-slate-200
                shadow-sm p-6 sm:p-8">

        <form action="{{ route('tasks.store') }}"
              method="POST"
              class="space-y-6">

            @csrf


            <!-- Title -->
            <div>

                <label for="title"
                       class="block text-sm font-semibold
                              text-slate-700 mb-2">

                    Task Title

                </label>

                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Enter task title"
                    required
                    class="w-full px-4 py-3
                           border border-slate-300
                           rounded-xl
                           bg-white
                           text-slate-800
                           placeholder-slate-400
                           focus:outline-none
                           focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500
                           transition">

                @error('title')
                    <p class="text-sm text-red-600 mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <!-- Description -->
            <div>

                <label for="description"
                       class="block text-sm font-semibold
                              text-slate-700 mb-2">

                    Description

                    <span class="font-normal text-slate-400">
                        (optional)
                    </span>

                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Describe your task..."
                    class="w-full px-4 py-3
                           border border-slate-300
                           rounded-xl
                           bg-white
                           text-slate-800
                           placeholder-slate-400
                           resize-none
                           focus:outline-none
                           focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500
                           transition">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-sm text-red-600 mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-3
                        pt-2">

                <button
                    type="submit"
                    class="flex-1 bg-indigo-600
                           hover:bg-indigo-700
                           text-white font-semibold
                           px-5 py-3 rounded-xl
                           shadow-sm hover:shadow
                           transition">

                    Create Task

                </button>

                <a href="{{ route('tasks.index') }}"
                   class="flex-1 text-center
                          bg-slate-100
                          hover:bg-slate-200
                          text-slate-700
                          font-semibold
                          px-5 py-3 rounded-xl
                          transition">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
