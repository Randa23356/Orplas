<x-layouts.public>
    {{-- Hero Section --}}
    <div x-data="{
        images: @js($sliders->pluck('image')->map(fn($img) => asset('storage/' . $img))),
        active: 0,
        set(idx) { this.active = idx },
        interval: null,
        start() {
            if (this.images.length > 1) {
                this.interval = setInterval(() => {
                    this.active = (this.active + 1) % this.images.length
                }, 3500)
            }
        },
        stop() {
            clearInterval(this.interval)
            this.interval = null
        },
        startX: 0
    }" x-init="start()" @mouseenter="stop()" @mouseleave="start()"
        @touchstart="startX = $event.touches[0].clientX"
        @touchend="
        let endX = $event.changedTouches[0].clientX;
        if (startX - endX > 40) {
            active = (active + 1) % images.length
        } else if (endX - startX > 40) {
            active = (active - 1 + images.length) % images.length
        }
    "
        class="relative flex flex-col bg-white justify-between overflow-x-hidden"
        style='font-family: "Public Sans", "Noto Sans", sans-serif;'>
        <div class="overflow-hidden w-full relative" style="aspect-ratio:16/9; min-height:180px; max-height:400px;">
            <template x-if="images.length > 0">
                <div class="relative h-full w-full">
                    <template x-for="(img, idx) in images" :key="idx">
                        <div class="absolute inset-0 bg-cover bg-center transition-all duration-700 rounded-b-lg"
                            :class="{
                                'z-10 translate-x-0 opacity-100': active === idx,
                                'z-0 -translate-x-full opacity-0': active > idx,
                                'z-0 translate-x-full opacity-0': active < idx
                            }"
                            :style="`background-image: url('${img}')`">
                        </div>
                    </template>
                </div>
            </template>
            <template x-if="images.length > 1">
                <div class="flex justify-center gap-2 p-5 absolute left-0 right-0 bottom-0 z-20">
                    <template x-for="(img, idx) in images" :key="idx">
                        <div @click="set(idx)" :class="active === idx ? 'bg-gray-800' : 'bg-gray-400 opacity-50'"
                            class="w-3 h-3 rounded-full cursor-pointer transition-all duration-300 border border-white">
                        </div>
                    </template>
                </div>
            </template>
        </div>
        <div class="h-5 bg-white"></div>
    </div>

    {{-- Sidebar Navigation --}}
    <div class="flex gap-2 border-t border-[#f0eaea] bg-[#fbf9f9] px-4 pb-3 pt-2">
        <a class="just flex flex-1 flex-col items-center justify-end gap-1 rounded-full text-[#181111]" href="#">
            <div class="text-[#181111] flex h-8 items-center justify-center" data-icon="House" data-size="24px"
                data-weight="fill">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M224,115.55V208a16,16,0,0,1-16,16H168a16,16,0,0,1-16-16V168a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v40a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V115.55a16,16,0,0,1,5.17-11.78l80-75.48.11-.11a16,16,0,0,1,21.53,0,1.14,1.14,0,0,0,.11.11l80,75.48A16,16,0,0,1,224,115.55Z">
                    </path>
                </svg>
            </div>
            <p class="text-[#181111] text-xs font-medium leading-normal tracking-[0.015em]">Home</p>
        </a>
        <a class="just flex flex-1 flex-col items-center justify-end gap-1 text-[#875e5e]" href="#">
            <div class="text-[#875e5e] flex h-8 items-center justify-center" data-icon="Users" data-size="24px"
                data-weight="regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z">
                    </path>
                </svg>
            </div>
            <p class="text-[#875e5e] text-xs font-medium leading-normal tracking-[0.015em]">About Us</p>
        </a>
        <a class="just flex flex-1 flex-col items-center justify-end gap-1 text-[#875e5e]" href="#">
            <div class="text-[#875e5e] flex h-8 items-center justify-center" data-icon="Image" data-size="24px"
                data-weight="regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V158.75l-26.07-26.06a16,16,0,0,0-22.63,0l-20,20-44-44a16,16,0,0,0-22.62,0L40,149.37V56ZM40,172l52-52,80,80H40Zm176,28H194.63l-36-36,20-20L216,181.38V200ZM144,100a12,12,0,1,1,12,12A12,12,0,0,1,144,100Z">
                    </path>
                </svg>
            </div>
            <p class="text-[#875e5e] text-xs font-medium leading-normal tracking-[0.015em]">Gallery</p>
        </a>
        <a class="just flex flex-1 flex-col items-center justify-end gap-1 text-[#875e5e]" href="#">
            <div class="text-[#875e5e] flex h-8 items-center justify-center" data-icon="Calendar" data-size="24px"
                data-weight="regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-96-88v64a8,8,0,0,1-16,0V132.94l-4.42,2.22a8,8,0,0,1-7.16-14.32l16-8A8,8,0,0,1,112,120Zm59.16,30.45L152,176h16a8,8,0,0,1,0,16H136a8,8,0,0,1-6.4-12.8l28.78-38.37A8,8,0,1,0,145.07,132a8,8,0,1,1-13.85-8A24,24,0,0,1,176,136,23.76,23.76,0,0,1,171.16,150.45Z">
                    </path>
                </svg>
            </div>
            <p class="text-[#875e5e] text-xs font-medium leading-normal tracking-[0.015em]">Events</p>
        </a>
        <a class="just flex flex-1 flex-col items-center justify-end gap-1 text-[#875e5e]" href="#">
            <div class="text-[#875e5e] flex h-8 items-center justify-center" data-icon="Note" data-size="24px"
                data-weight="regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z">
                    </path>
                </svg>
            </div>
            <p class="text-[#875e5e] text-xs font-medium leading-normal tracking-[0.015em]">Blog</p>
        </a>
    </div>
    <div class="h-5 bg-[#fbf9f9]"></div>
</x-layouts.public>
