<x-layout :title="$title">
    <div class="">
        <p class="font-bold underline underline-offset-8"><a href="/">Yonmedia</a> > Detail > {{ $book->judul }} >
            Pinjam</p>
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
                    <p class="font-semibold text-sm text-slate-500">Kategori : {{ $book->category->name }}</p>
                    <p class="mt-8 font-semibold ">Deskripsi :</p>
                    <p class="mt-2 text-slate-600">{{ $book->deskripsi }}</p>
                    <h3 class="font-semibold mt-8 mb-2">Detail Data Pinjaman : <span
                            class="text-red-600 text-sm">*pastikan semua data benar!</span></h3>
                    <div class="w-full">
                        <form action="/pinjam" method="POST">
                            @csrf
                            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}"
                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg mb-3"
                                required readonly>
                            <input type="hidden" id="buku_id" name="buku_id" value="{{ $book->id }}"
                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg mb-3"
                                required readonly>

                            <div class="flex gap-4 w-full mt-4">
                                <div class="w-full">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Nama Peminjam : </label>
                                    <input type="text" value="{{ auth()->user()->fullname }}"
                                        class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg mb-3"
                                        required readonly>

                                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-700">Judul
                                        Buku :
                                    </label>
                                    <input type="text" value="{{ $book->judul }}"
                                        class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg mb-3"
                                        required readonly>
                                </div>
                                <div class="w-full mb-4">
                                    <label for="alamat " class="block mb-2 text-sm font-medium text-gray-700">No Telpon
                                        Peminjam :
                                    </label>
                                    <input type="text" value="{{ auth()->user()->telepon }}"
                                        class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg mb-3"
                                        required readonly>
                                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">
                                        Alamat Peminjam :
                                    </label>
                                    <textarea
                                        class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg mb-3 resize-none"
                                        required readonly rows="3">{{ auth()->user()->alamat }}</textarea>

                                </div>
                            </div>
                            <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer">
                                Pinjam buku
                            </button>


                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>
