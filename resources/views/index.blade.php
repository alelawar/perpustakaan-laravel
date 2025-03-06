<x-layout :title="$title">
    <!-- Hero Section with Featured Book -->
    <div class="bg-gradient-to-br from-blue-50 to-indigo-100 py-10 mb-12 rounded-2xl shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-7 justify-center">
                <div class="w-full flex flex-col md:flex-row gap-8 bg-white p-6 rounded-2xl shadow-xl">
                    <div class="md:w-2/5 flex justify-center">
                        @if ($main && $main->cover)
                            <img src="{{ asset('storage/' . $main->cover) }}" alt="{{ $main->judul }}" 
                                class="rounded-lg shadow-lg max-w-full h-auto object-cover transition-transform hover:scale-105 duration-300">
                        @else
                            <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                                alt="Book Cover" class="rounded-lg shadow-lg max-w-full h-auto object-cover transition-transform hover:scale-105 duration-300">
                        @endif
                    </div>
                    
                    @if ($main)
                        <div class="md:w-3/5 my-4">
                            <div class="flex items-center mb-3">
                                
                            </div>
                            <a href="/detail/{{ $main->slug ?? '#' }}" class="block">
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 hover:text-indigo-700 transition-colors mb-2">
                                    {{ $main->judul ?? 'Tidak tersedia' }}
                                </h2>
                            </a>
                            <p class="text-lg text-gray-600 mb-4">
                                <span class="font-medium text-indigo-600">by</span> {{ $main->pembuat ?? 'Tidak diketahui' }}
                            </p>
                           
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi:</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $main->deskripsi ?? 'Deskripsi tidak tersedia.' }}</p>
                            </div>
                            <div class="mt-auto flex gap-3">
                                <a href="/detail/{{ $main->slug ?? '#' }}" 
                                    class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-800 transition-all shadow-md flex items-center">
                                    <i class="bi bi-book mr-2"></i> Lihat Detail
                                </a>
                               
                            </div>
                        </div>
                    @else
                        <div class="w-full flex items-center justify-center">
                            <p class="text-center text-gray-500 py-10">Belum ada buku yang tersedia.</p>
                        </div>
                    @endif
                </div>
                
                <div class="w-full md:w-2/5 flex flex-col gap-5">
                    <h3 class="text-xl font-bold text-gray-800 ml-2 mb-1">Rekomendasi Lainnya</h3>
                    @forelse ($second as $s)
                        <div class="w-full bg-white shadow-xl p-4 rounded-2xl hover:shadow-2xl transition-all duration-300 border border-gray-100">
                            <div class="flex gap-4">
                                <div class="w-1/4">
                                    @if ($s->cover)
                                        <img src="{{ asset('storage/' . $s->cover) }}" alt="{{ $s->judul }}"
                                            class="rounded-lg shadow-md w-full h-auto object-cover">
                                    @else
                                        <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                                            alt="Book Cover" class="rounded-lg shadow-md w-full h-auto object-cover">
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <a href="/detail/{{ $s->slug }}" class="block font-semibold text-gray-800 hover:text-indigo-700 transition-colors mb-1">
                                        {{ Str::limit($s->judul, 40) }}
                                    </a>
                                    <p class="text-sm text-gray-600 mb-2">
                                        <span class="text-indigo-600">by</span> {{ $s->pembuat }}
                                    </p>
                                    <p class="text-sm text-gray-500 line-clamp-2">{{ Str::limit($s->deskripsi, 80) }}</p>
                                    <a href="/detail/{{ $s->slug }}" class="inline-block mt-2 text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                        Selengkapnya <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-full bg-white shadow-lg p-8 rounded-2xl">
                            <p class="text-center text-gray-500">Belum ada buku yang tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Browse By Category Section -->
    <div class="container mx-auto px-4 mb-16">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Jelajahi Koleksi Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Temukan berbagai genre dan kategori buku sesuai minat Anda</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="/terbaru" class="group flex flex-col items-center p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="w-16 h-16 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full mb-4 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                    <i class="bi bi-activity text-3xl"></i>
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">Buku Terbaru</h3>
                <p class="text-center text-gray-600 mb-4">Temukan buku-buku terbaru yang baru dirilis</p>
                <span class="text-blue-600 group-hover:text-blue-800 font-medium flex items-center">
                    Lihat Semua <i class="bi bi-arrow-right ml-1"></i>
                </span>
            </a>
            
            <a href="/terlaris" class="group flex flex-col items-center p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 text-indigo-600 rounded-full mb-4 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                    <i class="bi bi-globe-americas text-3xl"></i>
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">Buku Terlaris</h3>
                <p class="text-center text-gray-600 mb-4">Jelajahi buku-buku bestseller pilihan pembaca</p>
                <span class="text-indigo-600 group-hover:text-indigo-800 font-medium flex items-center">
                    Lihat Semua <i class="bi bi-arrow-right ml-1"></i>
                </span>
            </a>
            
            <a href="/favorit" class="group flex flex-col items-center p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="w-16 h-16 flex items-center justify-center bg-purple-100 text-purple-600 rounded-full mb-4 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                    <i class="bi bi-award text-3xl"></i>
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">Buku Populer</h3>
                <p class="text-center text-gray-600 mb-4">Temukan buku-buku yang paling banyak disukai</p>
                <span class="text-purple-600 group-hover:text-purple-800 font-medium flex items-center">
                    Lihat Semua <i class="bi bi-arrow-right ml-1"></i>
                </span>
            </a>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="container mx-auto px-4 mb-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Kategori</h2>
            <a href="/categories" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                Lihat Semua <i class="bi bi-arrow-right ml-1"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
            @forelse ($categories as $c)
                <a href="/category/{{ $c->slug }}" class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-indigo-200 transition-all duration-300 flex items-center">
                    <div class="w-10 h-10 flex items-center justify-center bg-indigo-100 text-indigo-600 rounded-lg mr-3">
                        <i class="bi bi-tag"></i>
                    </div>
                    <span class="font-medium text-gray-800 hover:text-indigo-700 transition-colors">{{ $c->name }}</span>
                </a>
            @empty
                <div class="col-span-5 bg-white p-8 rounded-xl shadow-md text-center">
                    <p class="text-gray-500">Tidak ada data kategori</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Best Sellers Section -->
    <div class="container mx-auto px-4 mb-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Buku Terlaris</h2>
            <a href="/terlaris" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                Selengkapnya <i class="bi bi-arrow-right ml-1"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5">
            @forelse ($terlaris as $cat)
                <a href="detail/{{ $cat->slug }}" class="group bg-white p-3 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="mb-3 overflow-hidden rounded-lg relative">
                        @if ($cat->cover)
                            <img src="{{ asset('storage/' . $cat->cover) }}" alt="{{ $cat->judul }}" 
                                class="w-full h-44 object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                                alt="Book Cover" class="w-full h-44 object-cover group-hover:scale-110 transition-transform duration-500">
                        @endif
                        <div class="absolute top-2 right-2 bg-indigo-600 text-white text-xs px-2 py-1 rounded-full">
                            <i class="bi bi-graph-up-arrow mr-1"></i> Terlaris
                        </div>
                    </div>
                    <div class="p-2">
                        <p class="text-sm text-indigo-600 mb-1">{{ $cat->pembuat }}</p>
                        <p class="font-medium text-gray-800 group-hover:text-indigo-700 transition-colors">{{ Str::limit($cat->judul, 20) }}</p>
                    </div>
                </a>
            @empty
                <div class="col-span-7 bg-white p-8 rounded-xl shadow-md text-center">
                    <p class="text-gray-500">Belum ada buku yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Popular Books Section -->
    <div class="container mx-auto px-4 mb-20">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Buku Favorit Pekan Ini</h2>
            <a href="/favorit" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                Selengkapnya <i class="bi bi-arrow-right ml-1"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5">
            @forelse ($favorites as $f)
                <a href="detail/{{ $f->slug }}" class="group bg-white p-3 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="mb-3 overflow-hidden rounded-lg relative">
                        @if ($f->cover)
                            <img src="{{ asset('storage/' . $f->cover) }}" alt="{{ $f->judul }}" 
                                class="w-full h-44 object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                                alt="Book Cover" class="w-full h-44 object-cover group-hover:scale-110 transition-transform duration-500">
                        @endif
                        <div class="absolute top-2 right-2 bg-purple-600 text-white text-xs px-2 py-1 rounded-full">
                            <i class="bi bi-heart-fill mr-1"></i> Favorit
                        </div>
                    </div>
                    <div class="p-2">
                        <p class="text-sm text-purple-600 mb-1">{{ $f->pembuat }}</p>
                        <p class="font-medium text-gray-800 group-hover:text-purple-700 transition-colors">{{ Str::limit($f->judul, 20) }}</p>
                    </div>
                </a>
            @empty
                <div class="col-span-7 bg-white p-8 rounded-xl shadow-md text-center">
                    <p class="text-gray-500">Belum ada buku yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>