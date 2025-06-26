<div x-data="{ open: false }" class="fixed top-0 left-0 w-full z-50 shadow-md py-3 bg-white">
    <div class="flex items-center h-12 px-4 bg-white justify-between">
        <div class="flex items-center ml-3 gap-2">
            <!-- Logo -->
            <img src="{{ asset('images/ORPLASUntitled-1.png') }}" alt="Logo" class="h-8 w-8 object-contain" />
            <!-- Tulisan -->
            <span class="text-gray-800 text-xl ml-1 font-semibold tracking-[-0.015em] leading-none">
                ORPLAS
            </span>
        </div>
        <!-- Tombol untuk membuka/menutup menu -->
        <button @click="open = !open"
            class="flex items-center justify-center rounded-lg h-12 w-12 bg-transparent text-[#111418]">
            <!-- icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                viewBox="0 0 256 256">
                <path
                    d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z" />
            </svg>
        </button>
    </div>
    <!-- Dropdown navlink -->
    <div x-show="open" x-transition class="w-full bg-white shadow-md border-t">
        <ul class="flex flex-col py-2">
            <li><a href="#" class="block px-6 py-3 hover:bg-gray-100 font-semibold text-[#111418]">Beranda</a>
            </li>
            <li><a href="#" class="block px-6 py-3 hover:bg-gray-100 font-semibold text-[#111418]">Tentang
                    Kami</a></li>
            <li><a href="#" class="block px-6 py-3 hover:bg-gray-100 font-semibold text-[#111418]">Kegiatan</a>
            </li>
            <li><a href="#" class="block px-6 py-3 hover:bg-gray-100 font-semibold text-[#111418]">Galeri</a></li>
            <li><a href="#" class="block px-6 py-3 hover:bg-gray-100 font-semibold text-[#111418]">Agenda</a></li>
            <li><a href="#" class="block px-6 py-3 hover:bg-gray-100 font-semibold text-[#111418]">Berita</a></li>
            <li><a href="#" class="block px-6 py-3 hover:bg-gray-100 font-semibold text-[#111418]">Kontak</a></li>
        </ul>
    </div>
</div>
