<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Orplas 2025' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <x-public-navbar />
    <main class="container mx-auto px-4 py-10 flex-1">
        {{ $slot }}
    </main>
    <x-public-footer />
</body>
</html>