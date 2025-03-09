<x-layout :title="$title">
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show"
            class="fixed inset-0 flex items-center justify-center bg-stone-950/50 z-50">
            <div
                class="bg-primer-color flex flex-col items-center bg-white z-50 text-white px-6 py-3 rounded-lg shadow-lg">
                <i class="bi bi-check2 text-green-500 font-extrabold text-4xl"></i>
                <div class="mt-5 flex flex-col items-center">
                    <p class="text-black text-lg">{{ session('success') }}</p>
                    <button @click="show = false"
                        class="mt-2 px-4 py-2 bg-red-500 text-white rounded cursor-pointer hover:bg-red-600">Ok</button>
                </div>
            </div>
        </div>
    @endif

    @if (session('status'))
        <div x-data="{ show: true }" x-show="show"
            class="fixed inset-0 flex items-center justify-center bg-stone-950/50 z-50">
            <div
                class="bg-primer-color flex flex-col items-center bg-white z-50 text-white px-6 py-3 rounded-lg shadow-lg">
                <i class="bi bi-check2 text-green-500 font-extrabold text-4xl"></i>
                <div class="mt-5 flex flex-col items-center">
                    <p class="text-black text-lg">{{ session('status') }}</p>
                    <button @click="show = false"
                        class="mt-2 px-4 py-2 bg-red-500 text-white rounded cursor-pointer hover:bg-red-600">Ok</button>
                </div>
            </div>
        </div>
    @endif

    <div class="flex h-full bg-gray-200" x-data="{ open: false }">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <x-header></x-header>

            <main class="py-10 px-4 mt-8 rounded-xl  md:px-6 bg-gray-50">
                <div class="container mx-auto max-w-7xl">
                    <div class="mb-8">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Daftar Wishlist</h1>
                        <p class="text-gray-600 mt-2">Buku-buku yang Anda simpan untuk dibaca nanti</p>
                    </div>
                    
                    <div class="bg-white  shadow-sm p-6 md:p-8 bg-linear-to-b/oklch  from-indigo-100 to-blue-50 ">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-6 lg:gap-8">
                            @forelse ($wishlist as $f)
                                <a href="/detail/{{ $f->book->slug }}"
                                    class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-300 h-full flex flex-col">
                                    <div class="relative overflow-hidden">
                                        @if ($f->book->cover)
                                            <img src="{{ asset('storage/' . $f->book->cover) }}" alt="{{ $f->book->judul }}"
                                                class="w-full aspect-[3/4] object-cover group-hover:scale-105 transition duration-300">
                                        @else
                                            <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                                                alt="Default Cover"
                                                class="w-full aspect-[3/4] object-cover group-hover:scale-105 transition duration-300">
                                        @endif
                                        <div class="absolute top-2 right-2">
                                            <span
                                                class="bg-orange-500 text-white text-xs px-2 py-1 rounded-full">Terlaris</span>
                                        </div>
                                    </div>
                                    <div class="p-4 flex-grow flex flex-col justify-between">
                                        <div>
                                            <h3
                                                class="font-medium text-gray-800 mb-1 line-clamp-2 group-hover:text-blue-600 transition">
                                                {{ $f->book->judul }}</h3>
                                            <p class="text-sm text-gray-500">{{ $f->book->pembuat }}</p>
                                        </div>
                                        <div class="mt-3 pt-3 border-t border-gray-100 flex justify-end">
                                            @auth
                                                @php
                                                    $isWished = auth()
                                                        ->user()
                                                        ->wishlist()
                                                        ->where('book_id', $f->book->id)
                                                        ->exists();
                                                @endphp
                                                <form action="{{ route('wishlist.toggle') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="book_id" value="{{ $f->book->id }}">
                                                    <button type="submit" class="text-blue-500">
                                                        @if ($isWished)
                                                            <i class="bi bi-bookmark-fill"></i>
                                                        @else
                                                            <i class="bi bi-bookmark"></i>
                                                        @endif
                                                    </button>
                                                </form>
                                            @else
                                                <a href="{{ route('login') }}" class="text-blue-500">
                                                    <i class="bi bi-bookmark"></i>
                                                </a>
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="px-4 pb-4">
                                        <button
                                            class="w-full py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition">Lihat
                                            Detail</button>
                                    </div>
                                </a>
                            @empty
                                <div class="col-span-full py-8 text-center">
                                    <div class="text-5xl mb-4 text-gray-300">
                                        <i class="bi bi-bookmark"></i>
                                    </div>
                                    <p class="text-lg text-gray-600">Tidak ada buku dalam wishlist Anda</p>
                                    <a href="{{ route('home') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800">
                                        Jelajahi katalog buku
                                    </a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layout>
