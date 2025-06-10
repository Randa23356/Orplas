<x-layouts.public>
    <h2 class="text-3xl font-bold mb-8 text-center text-red-900">Daftar Konten Orplas 2025</h2>
    <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-8">
        @forelse($posts as $post)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col">
                <h3 class="text-xl font-semibold text-red-900 mb-2">{{ $post->title }}</h3>
                <span class="text-xs bg-red-100 text-red-900 px-2 py-1 rounded mb-2 w-max">{{ $post->category }}</span>
                <div class="text-gray-700 mb-4 line-clamp-4">
                    {{ Str::limit(strip_tags($post->content), 120) }}
                </div>
                <a href="#" class="mt-auto text-red-800 hover:underline font-medium">Baca Selengkapnya</a>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500">Belum ada konten.</div>
        @endforelse
    </div>

</x-layouts.public>
