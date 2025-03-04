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
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="flex justify-between gap-3">
                                    <div class="w-full">
                                        {{-- CATEGORY --}}
                                        {{-- CATEGORY --}}
                                        <div class="mb-4">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                                                Category Baru
                                            </label>
                                            <input type="text" id="name" name="name"
                                                value="{{ old('name') }}"
                                                class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg"
                                                required>
                                            @error('name')
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

                                    </div>
                                </div>
                        </div>
                        {{-- SUBMIT --}}
                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Buat
                            </button>
                        </div>
                        </form>
                        <div class="w-full flex justify-between mb-2">
                            <h2 class="text-xl  font-bold ">List Category :</h2>
                        </div>
                        {{-- TABLE START --}}
                        <table class="w-full mt-8 table-auto border border-gray-200">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th
                                        class="min-w-[200px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                        Name</th>

                                    <th
                                        class="min-w-[120px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($categories as $p)
                                    <tr>
                                        <td class="px-3 py-2 break-words">
                                            {{ $p->name }}</td>
                                        <td class="px-3 py-2 whitespace-nowrap flex gap-2">
                                            <form x-data="{ showConfirm: false }" @submit.prevent="if(showConfirm) $el.submit()"
                                                action="{{ route('category.destroy', $p->slug) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" @click="showConfirm = true"
                                                    class="font-semibold text-red-600 cursor-pointer">Hapus</button>

                                                <!-- Modal Konfirmasi -->
                                                <div x-show="showConfirm" x-cloak
                                                    @keydown.escape.window="showConfirm = false"
                                                    class="fixed inset-0 flex items-center justify-center bg-gray-400/40 ">
                                                    <div class="bg-white p-4 rounded-lg shadow-lg w-80"
                                                        @click.away="showConfirm = false">
                                                        <p class="text-gray-800 font-medium">Apakah Anda yakin ingin
                                                            menghapus ini?</p>
                                                        <div class="flex justify-end mt-4 gap-2">
                                                            <button @click="showConfirm = false"
                                                                class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
                                                            <button @click="$el.closest('form').submit()"
                                                                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center px-3 py-2 font-medium text-sky-400">
                                            Kamu tidak punya data pinjaman nih</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>


                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>

    <script>
        const name = document.querySelector('#name')
        const slug = document.querySelector('#slug')
        name.addEventListener('change', function() {
            fetch('/category/books/checkSlug?name=' + name.value)
                .then(response => response.json()) // Ubah 'respone' menjadi 'response'
                .then(data => slug.value = data.slug);
        });
    </script>
</x-layout>
