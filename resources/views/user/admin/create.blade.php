<x-layout :title="$title">
    <div class="flex h-full bg-gray-200" x-data="{ open: false }">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <x-header></x-header>

            <main class="mt-10 px-6">
                <div class=" mx-auto gap-6">
                    <div class="w-3/4 h-fit p-5 mx-auto bg-slate-50 rounded-xl">
                        <div class="w-full flex justify-between mb-6">
                            <h2 class="text-xl  font-bold ">Buat data buku :</h2>
                        </div>
                        <div class="space-y-4 mx-auto">
                            <form action="/dashboard" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="flex justify-between gap-3">
                                    <div class="w-full">
                                        {{-- JUDUL --}}
                                        <div class="mb-4">
                                            <label for="judul"
                                                class="block mb-2 text-sm font-medium text-gray-700">Judul Buku</label>
                                            <input type="text" id="judul" name="judul"
                                                value="{{ old('judul') }}"
                                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg"
                                                required autofocus>
                                            @error('judul')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- SLUG --}}
                                        <div class="mb-4">
                                            <label for="slug"
                                                class="block mb-2 text-sm font-medium text-gray-700">Slug</label>
                                            <input type="text" id="slug" name="slug"
                                                value="{{ old('slug') }}"
                                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg"
                                                required readonly>
                                            @error('slug')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- PEMBUAT --}}
                                        <div class="mb-4">
                                            <label for="pembuat"
                                                class="block mb-2 text-sm font-medium text-gray-700">Pembuat</label>
                                            <input type="text" id="pembuat" name="pembuat"
                                                value="{{ old('pembuat') }}"
                                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg"
                                                required>
                                            @error('pembuat')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                       
                                        {{-- COVER --}}
                                        <div class="mb-4">
                                            <label for="cover"
                                                class="block mb-2 text-sm font-medium text-gray-700">Cover</label>
                                            <input type="file" id="cover" name="cover"
                                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg">
                                            @error('cover')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- DESKRIPSI --}}
                                        <div class="mb-4">
                                            <label for="deskripsi"
                                                class="block mb-2 text-sm font-medium text-gray-700">Deskripsi</label>
                                            <textarea id="deskripsi" name="deskripsi"
                                                class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg"
                                                required>{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        {{-- PENERBIT --}}
                                        <div class="mb-4">
                                            <label for="penerbit"
                                                class="block mb-2 text-sm font-medium text-gray-700">Penerbit</label>
                                            <input type="text" id="penerbit" name="penerbit"
                                                value="{{ old('penerbit') }}"
                                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg"
                                                required>
                                            @error('penerbit')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- ISBN --}}
                                        <div class="mb-4">
                                            <label for="isbn"
                                                class="block mb-2 text-sm font-medium text-gray-700">ISBN</label>
                                            <input type="text" id="isbn" name="isbn"
                                                value="{{ old('isbn') }}"
                                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg"
                                                required>
                                            @error('isbn')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- HALAMAN --}}
                                        <div class="mb-4">
                                            <label for="halaman"
                                                class="block mb-2 text-sm font-medium text-gray-700">Jumlah
                                                Halaman</label>
                                            <input type="number" id="halaman" name="halaman"
                                                value="{{ old('halaman') }}"
                                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg"
                                                required min="1">
                                            @error('halaman')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- BAHASA --}}
                                        <div class="mb-4">
                                            <label for="bahasa"
                                                class="block mb-2 text-sm font-medium text-gray-700">Bahasa</label>
                                            <input type="text" id="bahasa" name="bahasa"
                                                value="{{ old('bahasa') }}"
                                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg"
                                                required>
                                            @error('bahasa')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        
                                         <!-- CATEGORY -->
                                         <div class="mb-4">
                                            <label for="category_id"
                                                class="block mb-2 text-sm font-medium text-gray-700">Kategori</label>
                                            <select id="category_id" name="category_id"
                                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg"
                                                required>
                                                <option value="" disabled selected>Pilih Kategori</option>
                                                @foreach ($categories as $c )
                                                <option value="{{ $c->id }}">
                                                    {{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                {{-- SUBMIT --}}
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        Simpan
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        const judul = document.querySelector('#judul')
        const slug = document.querySelector('#slug')

        judul.addEventListener('change', function() {
            fetch('/dashboard/books/checkSlug?judul=' + judul.value)
                .then(response => response.json()) // Ubah 'respone' menjadi 'response'
                .then(data => slug.value = data.slug);
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
</x-layout>
