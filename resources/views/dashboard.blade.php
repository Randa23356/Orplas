<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Konten
        </h2>
    </x-slot>

    <div x-data="{ openCreate: false, openEdit: false, editPost: {} }" class="py-6">
        <button @click="openCreate = true" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah
            Konten</button>
        @if (session('success'))
            <x-alert>{{ session('success') }}</x-alert>
        @endif
        <div class="bg-white dark:bg-gray-800 shadow rounded">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Judul</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="border px-4 py-2">{{ $post->title }}</td>
                            <td class="border px-4 py-2">{{ $post->category }}</td>
                            <td class="border px-4 py-2">
                                <button @click="openEdit = true; editPost = {{ $post }}"
                                    class="text-blue-500">Edit</button>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-2"
                                        onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Modal Create --}}
        <div x-show="openCreate" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow w-full max-w-lg">
                <h3 class="text-lg font-bold mb-4">Tambah Konten</h3>
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
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                    <button type="button" @click="openCreate = false" class="ml-2 text-gray-600">Batal</button>
                </form>
            </div>
        </div>

        {{-- Modal Edit --}}
        <div x-show="openEdit" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow w-full max-w-lg">
                <h3 class="text-lg font-bold mb-4">Edit Konten</h3>
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
                        <textarea name="content" class="w-full border rounded px-3 py-2" rows="4" x-model="editPost.content" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                    <button type="button" @click="openEdit = false" class="ml-2 text-gray-600">Batal</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
