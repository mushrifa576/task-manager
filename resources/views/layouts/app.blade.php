<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Task Manager')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca'
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

    <!-- Navbar -->
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-16 flex items-center justify-between">

                <!-- Logo -->
                <a href="{{ route('tasks.index') }}"
                   class="flex items-center gap-3 group">

                    <div class="w-10 h-10 bg-indigo-600 rounded-xl
                                flex items-center justify-center
                                shadow-sm group-hover:bg-indigo-700 transition">
                        <span class="text-white text-xl">✓</span>
                    </div>

                    <div>
                        <h1 class="font-bold text-lg text-slate-800">
                            Task Manager
                        </h1>
                        <p class="text-xs text-slate-400 hidden sm:block">
                            Organize your work
                        </p>
                    </div>
                </a>

                <!-- Navigation -->
                <a href="{{ route('tasks.index') }}"
                   class="text-sm font-medium text-slate-600
                          hover:text-indigo-600 transition">
                    All Tasks
                </a>

            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Flash Message -->
        @if (session('status'))
            <div class="mb-6 flex items-center gap-3
                        bg-emerald-50 border border-emerald-200
                        text-emerald-700 px-4 py-3 rounded-xl">

                <div class="w-7 h-7 bg-emerald-100 rounded-full
                            flex items-center justify-center">
                    ✓
                </div>

                <p class="text-sm font-medium">
                    {{ session('status') }}
                </p>
            </div>
        @endif


        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200
                        rounded-xl p-4">

                <p class="font-semibold text-red-700 text-sm mb-2">
                    Please fix the following errors:
                </p>

                <ul class="text-sm text-red-600 space-y-1 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif


        @yield('content')

    </main>

</body>
</html>
