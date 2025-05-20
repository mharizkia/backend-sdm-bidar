<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel Livewire') }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-white shadow mb-6">
        <div class="container mx-auto px-4 py-4 flex justify-between">
            <div class="font-bold text-lg">
                test sdm
            </div>
            <div>
                <a href="/" class="text-blue-600 hover:underline">Home</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4">
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
