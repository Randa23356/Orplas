<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orplas 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen">g
    <nav class="bg-blue-700 py-4 shadow">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">Orplas 2025</h1>
            <a href="/login" class="text-white hover:underline">Admin Login</a>
        </div>
    </nav>
    <main class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-8 text-center text-blue-700">Daftar Konten Orplas 2025</h2>
        <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-8">
            @forelse($posts as $post)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col">
                <h3 class="text-xl font-semibold text-blue-700 mb-2">{{ $post->title }}</h3>
                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded mb-2 w-max">{{ $post->category
                    }}</span>
                <div class="text-gray-700 mb-4 line-clamp-4">
                    {{ Str::limit(strip_tags($post->content), 120) }}
                </div>
                <a href="#" class="mt-auto text-blue-600 hover:underline font-medium">Baca Selengkapnya</a>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500">Belum ada konten.</div>
            @endforelse
        </div>
    </main>
    <footer class="bg-blue-700 text-white py-4 mt-10 text-center">
        &copy; {{ date('Y') }} Orplas 2025. All rights reserved.
    </footer>
</body>

</html>
