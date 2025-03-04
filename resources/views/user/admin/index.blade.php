<x-layout :title="$title">
    @if (session('success'))
    <div x-data="{ show: true }" x-show="show" class="fixed inset-0 flex items-center justify-center bg-stone-950/50 z-50">
        <div class="bg-primer-color flex flex-col items-center bg-white z-50 text-white px-6 py-3 rounded-lg shadow-lg">
            <i class="bi bi-check2 text-green-500 font-extrabold text-4xl"></i>
            <div class="mt-5 flex flex-col items-center">
                <p class="text-black text-lg">{{ session('success') }}</p>
                <button @click="show = false" class="mt-2 px-4 py-2 bg-red-500 text-white rounded cursor-pointer hover:bg-red-600">Ok</button>
            </div>
        </div>
    </div>
    @endif

    <div class="flex h-full bg-gray-200" x-data="{ open: false }">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <x-header></x-header>

            <main class="mt-10 px-6">
                <div class="items-center mx-auto gap-6">
                    <div class="w-full h-fit p-5 bg-slate-50 rounded-xl">
                        <div class="w-full flex justify-between mb-6">
                            <h2 class="text-xl  font-bold ">Data Buku :</h2>
                            <a href="/dashboard/create"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Data</a>
                        </div>
                        <div class="overflow-x-auto">
                            <form action="/dashboard" method="GET">
                                <input type="text" name="s" id="cari" placeholder="Cari berdasarkan judul..." class=" px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 mb-5 w-3/4 mx-auto">
                            </form>
                            <table class="w-full table-auto border border-gray-200">
                                <thead class="bg-gray-50 border-b border-gray-200">
                                    <tr>
                                        <th
                                            class="min-w-[200px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Judul</th>
                                        <th
                                            class="min-w-[150px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Pembuat</th>
                                        <th
                                            class="min-w-[150px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Deskripsi</th>
                                        <th
                                            class="min-w-[120px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($books as $p)
                                        <tr>
                                            <td class="px-3 py-2 break-words"><a
                                                    href="/detail/{{ $p->slug }}">{{ $p->judul }}</a></td>
                                            <td class="px-3 py-2 whitespace-nowrap">{{ $p->pembuat }}</td>
                                            <td class="px-3 py-2 whitespace">{{ Str::limit($p->deskripsi, 20) }}</td>
                                            <td class="px-3 py-2 whitespace-nowrap flex gap-2">
                                                <form x-data="{ showConfirm: false }"
                                                    @submit.prevent="if(showConfirm) $el.submit()"
                                                    action="/dashboard/{{ $p->slug }}" method="POST">
                                                    @method('delete')
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

                                                <a href="/dashboard/{{ $p->slug }}/edit"
                                                    class="font-semibold text-sky-600">Edit</a>
                                            </td>
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
                    {{ $books->links() }}



                </div>
            </main>
        </div>
    </div>
</x-layout>
