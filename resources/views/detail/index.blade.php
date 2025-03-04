<x-layout :title="$title">
    <div class="">
        <p class="font-bold underline"><a href="/">Yonmedia</a> > Detail > {{ $book->judul }}</p>
    </div>

    <div class="p-2 w-full mt-5">
        <div class="">
            <div class="flex p-8 w-full">
                <div class="max-w-[60vh] max-h-auto">
                    @if ($book->cover)
                   <img class="w-lg" src="{{ asset('storage/' . $book->cover) }}" alt="Cover Buku">
                    @else
                    <img class="w-lg" 
                        src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg">
                    @endif
                </div>

                <div class="ml-8 w-full">
                    <p class="mb-2 text-slate-500">{{ Str::limit($book->pembuat, 20) }}</p>
                    <p class="font-semibold text-lg text-slate-700">{{ $book->judul }}</p>
                    <a href="/category/{{ $book->category->slug }}" class="font-semibold text-sm text-slate-500">Kategori : {{ $book->category->name }}</a> 
                    <p class="mt-8 font-semibold ">Deskripsi :</p>
                    <p class="mt-2 text-slate-600">{{ $book->deskripsi }}</p>
                    <h3 class="font-semibold mt-8">Detail Buku :</h3>
                    <div class="w-3/4">
                        <div class="mt-3 flex justify-between px-7">
                            <div class="">
                                <div class="mb-3">
                                    <p class=" text-slate-500">Penerbit :</p>
                                    <p>{{ $book->penerbit }}</p>
                                </div>
                                <div class="mb-3">
                                    <p class=" text-slate-500">ISBN :</p>
                                    <p>{{ $book->isbn }}</p>
                                </div>
                                <div class="mt-14">
                                    <a href="/pinjam/{{ $book->id }}"  class="mt-14 px-5 text-center py-2 text-slate-100 font-semibold bg-sky-600 rounded-xl">Pinjam</a>
                                </div>
                            </div>
                            <div class="">
                                <div class="mb-3">
                                    <p class=" text-slate-500">Halaman :</p>
                                    <p>{{ $book->halaman }}</p>
                                </div>
                                <div class="mb-3">
                                    <p class=" text-slate-500">Bahasa :</p>
                                    <p>{{ $book->bahasa }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>
