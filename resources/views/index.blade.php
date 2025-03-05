<x-layout :title="$title">
    {{-- main start --}}
    <div class="w-full ">
        <div class="flex gap-7 justify-center">
            <div class="w-full flex gap-10 bg-slate-50 shadow-xl p-3 rounded-2xl">
                @if ($main && $main->cover)
                    <img src="{{ asset('storage/' . $main->cover) }}" alt="" class="shadow-lg max-w-lg">
                @else
                    <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                        alt="no-img" class="shadow-lg max-w-lg">
                @endif
                @if ($main)
                    <div class="my-4 w-full">
                        <a href="/detail/{{ $main->slug ?? '#' }}" class="text-xl my-2">
                            <span class="font-bold">Judul :</span> {{ $main->judul ?? 'Tidak tersedia' }}
                        </a>
                        <p class="text-xl my-2"><span class="font-bold">Author :</span>
                            {{ $main->pembuat ?? 'Tidak diketahui' }}</p>
                        <p class="text-xl my-2"><span class="font-bold">Deskripsi :</span></p>
                        <p class="mt-4">{{ $main->deskripsi ?? 'Deskripsi tidak tersedia.' }}</p>
                    </div>
                @else
                    <p class="text-center text-gray-500">Belum ada buku yang tersedia.</p>
                @endif
            </div>
            <div class="w-1/2 flex flex-col items-center justify-center gap-7 ">
                @forelse ($second as $s)
                    <div class="w-full max-h-full bg-slate-50 shadow-xl p-3 rounded-2xl">
                        <div class="flex gap-4">
                            @if ($s->cover)
                                <img src="{{ asset('storage/' . $s->cover) }}" alt=""
                                    class="shadow-lg w-1/3 h-auto">
                            @else
                                <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                                    alt="" class="shadow-lg w-1/3 h-auto">
                            @endif
                            <div class="flex-1">
                                <a href="/detail/{{ $s->slug }}" class="text-xs my-2"><span class="font-bold">Judul
                                        :</span>{{ $s->judul }}</a>
                                <p class="text-xs my-2"><span class="font-bold">Author :</span> {{ $s->pembuat }}</p>
                                <p class="text-xs my-2"><span class="font-bold">Deskripsi :</span></p>
                                <p class="mt-1 text-xs">{{ $s->deskripsi }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Belum ada buku yang tersedia.</p>
                @endforelse

            </div>
        </div>
    </div>
    {{-- main end --}}

    {{-- list start --}}
    <div class=" mt-20 mx-auto text-center pb-2 w-auto ">
        <h1 class="mb-5 font-bold underline-offset-8 underline text-xl uppercase">List Kami</h1>
    </div>
    <div class="  grid place-items-center grid-cols-3">
        <a href="/terbaru" class="text-center hover:bg-slate-50 p-5 rounded-lg hover:border hover:border-indigo-600 ">
            <i class="bi bi-activity text-indigo-600 text-6xl"></i>
            <p class="mt-8 font-semibold ">Buku Terbaru</p>
        </a>
        <a href="/terlaris" class="text-center hover:bg-slate-50 p-5 rounded-lg hover:border hover:border-indigo-600 ">
            <i class="bi bi-globe-americas text-indigo-600 text-6xl"></i>
            <p class="mt-8 font-semibold ">Buku Terlaris</p>
        </a>
        <a href="/favorit" class="text-center hover:bg-slate-50 p-5 rounded-lg hover:border hover:border-indigo-600 ">
            <i class="bi bi-award text-indigo-600 text-6xl"></i>
            <p class="mt-8 font-semibold ">Buku Populer</p>
        </a>
    </div>

    
    <div class="mt-20 mb-8 mx-auto text-center  pb-2 flex border-b-2 w-fit border-indigo-600">
        <h1 class=" font-bold text-xl uppercase">List Category </h1>
    </div>
    <div class=" text-center grid  grid-cols-5 gap-x-8 gap-y-3">
        @forelse ($categories as $c)
            <a href="/category/{{ $c->slug }}" class="hover:underline hover:text-sky-600"><i class="bi bi-tag text-xl mr-2"></i>{{ $c->name }}</a>
        @empty
            <p>Tidak ada data categories </>
            </p>
        @endforelse
    </div>
    {{-- list start --}}

    {{-- terlaris start --}}
    <div class="w-full mt-28">
        <div class="flex justify-between items-center mb-8">
            <h1 class="font-bold underline-offset-8 underline text-3xl">Buku Terlaris </h1>
            <a href="/terlaris" class="hover:underline ">Selengkapnya >>></a>
        </div>
        <div class="grid grid-cols-7 gap-3">
            @forelse ($terlaris as $cat)
                <a href="detail/{{ $cat->slug }}"
                    class="w-full hover:shadow-2xl p-2 border border-slate-400 rounded-xl">
                    @if ($cat->cover)
                        <img src="{{ asset('storage/' . $cat->cover) }}" alt="" class="mb-4">
                    @else
                        <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                            alt="" class="mb-4">
                    @endif
                    <div class="p-2">
                        <p class="text-sm text-slate-500">{{ $cat->pembuat }}</p>
                        <p class="">{{ Str::limit($cat->judul, 20) }}</p>
                    </div>
                </a>
            @empty
                <p class="text-center text-gray-500">Belum ada buku yang tersedia.</p>
            @endforelse
        </div>
    </div>
    {{-- terlaris end --}}
    <div class="w-full mt-28">
        <div class="flex justify-between items-center mb-8">
            <h1 class="font-bold underline-offset-8 underline text-3xl">Buku Favorit pekan ini</h1>
            <a href="/favorit" class="hover:underline ">Selengkapnya >>></a>
        </div>
        <div class="grid grid-cols-7 gap-3">
            @forelse ($favorites as $f)
                <a href="detail/{{ $f->slug }}"
                    class="w-full hover:shadow-2xl p-2 border border-slate-400 rounded-xl">
                    @if ($f->cover)
                        <img src="{{ asset('storage/' . $f->cover) }}" alt="" class="mb-4">
                    @else
                        <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                            alt="" class="mb-4">
                    @endif
                    <div class="p-2">
                        <p class="text-sm text-slate-500">{{ $f->pembuat }}</p>
                        <p class="">{{ Str::limit($f->judul, 20) }}</p>
                    </div>
                </a>
            @empty
                <p class="text-center text-gray-500">Belum ada buku yang tersedia.</p>
            @endforelse
        </div>
    </div>


</x-layout>
