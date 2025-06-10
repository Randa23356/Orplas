<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-900 leading-tight">
            Daftar Konten
        </h2>
    </x-slot>

    <div x-data="{ openCreate: false, openEdit: false, editPost: {} }" class="py-6">
        <button @click="openCreate = true" class="bg-red-900 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Konten</button>
        @if (session('success'))
            <x-alert>{{ session('success') }}</x-alert>
        @endif

        <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-8">
            @forelse($posts as $post)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col">
                    <h3 class="text-xl font-semibold text-red-900 mb-2">{{ $post->title }}</h3>
                    <span class="text-xs bg-red-100 text-red-900 px-2 py-1 rounded mb-2 w-max">{{ $post->category }}</span>
                    <div class="text-gray-700 mb-4 line-clamp-4">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </div>
                    <div class="flex gap-2 mt-auto">
                        <button @click="openEdit = true; editPost = {{ Js::from($post) }}"
                            class="text-white bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded">Edit</button>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-700 hover:bg-red-900 px-3 py-1 rounded"
                                onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500">Belum ada konten.</div>
            @endforelse
        </div>

        {{-- Modal Create --}}
        <div x-show="openCreate" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded shadow w-full max-w-lg">
                <h3 class="text-lg font-bold mb-4 text-red-900">Tambah Konten</h3>
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label>Judul</label>
                        <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label>Kategori</label>
                        <input type="text" name="category" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label>Konten</label>
                        <textarea name="content" class="w-full border rounded px-3 py-2" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="bg-red-900 text-white px-4 py-2 rounded">Simpan</button>
                    <button type="button" @click="openCreate = false" class="ml-2 text-gray-600">Batal</button>
                </form>
            </div>
        </div>

        {{-- Modal Edit --}}
        <div x-show="openEdit" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded shadow w-full max-w-lg">
                <h3 class="text-lg font-bold mb-4 text-red-900">Edit Konten</h3>
                <form :action="'{{ url('posts') }}/' + editPost.id" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label>Judul</label>
                        <input type="text" name="title" class="w-full border rounded px-3 py-2"
                            x-model="editPost.title" required>
                    </div>
                    <div class="mb-4">
                        <label>Kategori</label>
                        <input type="text" name="category" class="w-full border rounded px-3 py-2"
                            x-model="editPost.category" required>
                    </div>
                    <div class="mb-4">
                        <label>Konten</label>
                        <textarea name="content" class="w-full border rounded px-3 py-2" rows="4"
                            x-model="editPost.content" required></textarea>
                    </div>
                    <button type="submit" class="bg-red-900 text-white px-4 py-2 rounded">Update</button>
                    <button type="button" @click="openEdit = false" class="ml-2 text-gray-600">Batal</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
