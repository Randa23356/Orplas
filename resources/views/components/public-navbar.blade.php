<div x-data="{ open: false }" class="relative z-50 shadow-md bg-white">
    <div class="flex items-center h-12 px-4 bg-white justify-between">
        <span class="text-[#111418] text-lg font-bold tracking-[-0.015em] leading-none">
            ORPLAAS
        </span>
        <button @click="open = true"
            class="flex items-center justify-center rounded-lg h-12 w-12 bg-transparent text-[#111418]">
            <!-- icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 256 256">
                <path
                    d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                </path>
            </svg>
        </button>
    </div>
    <!-- Overlay & Sidebar (gabung dalam satu parent x-show) -->
    <div x-show="open" x-transition.opacity.300ms class="fixed inset-0 z-50">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40" @click="open = false"></div>
        <!-- Sidebar -->
        <div class="absolute left-0 top-0 h-full w-10/12 max-w-xs flex flex-col gap-4 bg-white p-4
            transition-transform duration-500 ease-in-out
            transform"
            :class="open ? 'translate-x-0 shadow-2xl' : '-translate-x-full'" @click.away="open = false"
            style="will-change: transform;">
            <button @click="open = false" class="self-end mb-2 text-gray-500 hover:text-black text-3xl leading-none">
                &times;
            </button>
            <ul class="flex flex-col gap-4">
                <li>
                    <a href="#"
                        class="flex h-12 items-center gap-4 rounded-lg px-4 bg-[#f0f2f5] hover:bg-[#ececec] transition">
                        <div class="text-[#111418] pr-4">
                            <!-- Home icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 256 256">
                                <path
                                    d="M224,115.55V208a16,16,0,0,1-16,16H168a16,16,0,0,1-16-16V168a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v40a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V115.55a16,16,0,0,1,5.17-11.78l80-75.48.11-.11a16,16,0,0,1,21.53,0l80,75.48A16,16,0,0,1,224,115.55Z" />
                            </svg>
                        </div>
                        <p class="text-[#111418] text-base font-bold leading-tight truncate">Beranda</p>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex h-12 items-center gap-4 rounded-lg px-4 hover:bg-[#ececec] transition">
                        <div class="text-[#111418] pr-4">
                            <!-- Info icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 256 256">
                                <path
                                    d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z" />
                            </svg>
                        </div>
                        <p class="text-[#111418] text-base font-bold leading-tight truncate">Tentang Kami</p>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex h-12 items-center gap-4 rounded-lg px-4 hover:bg-[#ececec] transition">
                        <div class="text-[#111418] pr-4">
                            <!-- Activities icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 256 256">
                                <path
                                    d="M230.32,187.09l-46-59.09H208a8,8,0,0,0,6.34-12.88l-80-104a8,8,0,0,0-12.68,0l-80,104A8,8,0,0,0,48,128H71.64l-46,59.09A8,8,0,0,0,32,200h88v40a8,8,0,0,0,16,0V200h88a8,8,0,0,0,6.32-12.91ZM48.36,184l46-59.09A8,8,0,0,0,88,112H64.25L128,29.12,191.75,112H168a8,8,0,0,0-6.31,12.91L207.64,184Z" />
                        </div>
                        <p class="text-[#111418] text-base font-bold leading-tight truncate">Kegiatan</p>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex h-12 items-center gap-4 rounded-lg px-4 hover:bg-[#ececec] transition">
                        <div class="text-[#111418] pr-4">
                            <!-- Gallery icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 256 256">
                                <path
                                    d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V158.75l-26.07-26.06a16,16,0,0,0-22.63,0l-20,20-44-44a16,16,0,0,0-22.62,0L40,149.37V56ZM40,172l52-52,80,80H40Zm176,28H194.63l-36-36,20-20L216,181.38V200ZM144,100a12,12,0,1,1,12,12A12,12,0,0,1,144,100Z" />
                            </svg>
                        </div>
                        <p class="text-[#111418] text-base font-bold leading-tight truncate">Galeri</p>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex h-12 items-center gap-4 rounded-lg px-4 hover:bg-[#ececec] transition">
                        <div class="text-[#111418] pr-4">
                            <!-- Agenda icon (Calendar) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <rect x="40" y="48" width="176" height="160" rx="16" stroke-width="16"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    fill="none" />
                                <line x1="176" y1="24" x2="176" y2="56" stroke-width="16"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    fill="none" />
                                <line x1="80" y1="24" x2="80" y2="56" stroke-width="16"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    fill="none" />
                                <line x1="40" y1="88" x2="216" y2="88" stroke-width="16"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    fill="none" />
                            </svg>
                        </div>
                        <p class="text-[#111418] text-base font-bold leading-tight truncate">Agenda</p>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex h-12 items-center gap-4 rounded-lg px-4 hover:bg-[#ececec] transition">
                        <div class="text-[#111418] pr-4">
                            <!-- News icon (Note) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="currentColor" viewBox="0 0 256 256">
                                <path
                                    d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z" />
                            </svg>
                        </div>
                        <p class="text-[#111418] text-base font-bold leading-tight truncate">Berita</p>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex h-12 items-center gap-4 rounded-lg px-4 hover:bg-[#ececec] transition">
                        <div class="text-[#111418] pr-4">
                            <!-- Contact icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="currentColor" viewBox="0 0 256 256">
                                <path
                                    d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-96,85.15L52.57,64H203.43ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z" />
                            </svg>
                        </div>
                        <p class="text-[#111418] text-base font-bold leading-tight truncate">Kontak</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div>
        <div class="h-5 bg-white"></div>
    </div>
</div>
