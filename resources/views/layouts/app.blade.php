<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-2xl mx-auto py-12 px-4">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">📝 Task Manager</h1>
            <a href="{{ route('tasks.index') }}" class="text-sm text-indigo-600 hover:underline">All Tasks</a>
        </div>

        @if (session('status'))
            <div class="bg-green-100 text-green-700 text-sm px-4 py-3 rounded-lg mb-6">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>