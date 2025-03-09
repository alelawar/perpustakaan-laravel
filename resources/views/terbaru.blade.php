<x-layout :title="$title">
    @if (session('status'))
    <div x-data="{ show: true }" x-show="show" class="fixed inset-0 flex items-center justify-center bg-stone-950/50 z-50">
        <div class="bg-primer-color flex flex-col items-center bg-white z-50 text-white px-6 py-3 rounded-lg shadow-lg">
            <i class="bi bi-check2 text-green-500 font-extrabold text-4xl"></i>
            <div class="mt-5 flex flex-col items-center">
                <p class="text-black text-lg">{{ session('status') }}</p>
                <a href="/profile/wishlist" class="text-black text-lg underline underline-offset-4" >Cek Disini</a>
                <button @click="show = false" class="mt-2 px-4 py-2 bg-red-500 text-white rounded cursor-pointer hover:bg-red-600">Ok</button>
            </div>
        </div>
    </div>
    @endif
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="mb-8 border-l-4 border-indigo-600 pl-4">
            <h1 class="font-bold text-3xl text-gray-800 flex items-center gap-2">
                <span class="text-blue-600">Yonmedia</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-blue-500">Buku Terbaru</span>
            </h1>
            <p class="text-gray-600 mt-2">Koleksi buku-buku paling baru dan banyak dipinjam</p>
        </div>



        <!-- Pagination -->
        <div class="mb-6">
            {{ $terbaru->links() }}
        </div>

        <!-- Book Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">
            @forelse ($terbaru as $f)
            <a href="detail/{{ $f->slug }}"
                class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-300 h-full flex flex-col">
                 <div class="relative overflow-hidden">
                     @if ($f->cover)
                         <img src="{{ asset('storage/' . $f->cover) }}" alt="{{ $f->judul }}"
                              class="w-full aspect-[3/4] object-cover group-hover:scale-105 transition duration-300">
                     @else
                         <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                              alt="Default Cover"
                              class="w-full aspect-[3/4] object-cover group-hover:scale-105 transition duration-300">
                     @endif
                     <div class="absolute top-2 right-2">
                         <span class="bg-indigo-600 text-white text-xs px-2 py-1 rounded-full">Terbaru <i
                                 class="bi bi-activity"></i></span>
                                 
                     </div>
                 </div>
                 <div class="p-4 flex-grow flex flex-col justify-between ">
                     <div>
                         <h3 class="font-medium text-gray-800 mb-1 line-clamp-2 group-hover:text-blue-600 transition">
                             {{ $f->judul }}</h3>
                         <p class="text-sm text-gray-500">{{ $f->pembuat }}</p>
                     </div>
                 </div>
                 <div class="my-3 pt-3 pr-4 border-t border-gray-100 flex justify-end">
                    @auth
                        @php
                            $isWished = auth()->user()->wishlist()->where('book_id', $f->id)->exists();
                        @endphp
                        <form action="{{ route('wishlist.toggle') }}" method="POST" class="inline">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $f->id }}">
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
                 <div class="px-4 pb-4">
                     <button
                         class="w-full py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition">Lihat
                         Detail</button>
                 </div>
             </a>
            @empty
                <div class="col-span-full py-16 flex flex-col items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mb-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <p class="text-center text-gray-500 text-lg font-medium mb-2">Belum ada buku yang tersedia</p>
                    <p class="text-center text-gray-400 mb-6">Silakan cek kembali nanti untuk koleksi terbaru</p>
                    <a href="/"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Kembali ke
                        Beranda</a>
                </div>
            @endforelse
        </div>

        <!-- Bottom Pagination -->
        <div class="mt-10">
            {{ $terbaru->links() }}
        </div>
    </div>
</x-layout>
