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

    <div class=" h-full bg-gray-200" x-data="{ open: false }">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <x-header></x-header>

            <main class="mt-10 px-6" x-data="{ actionType: 'update' }">
                <div class="w-full flex justify-between items-center mb-6 p-5 bg-slate-50 rounded-lg h-fit">
                    <h2 class="text-xl  font-bold ">Data Peminjam :</h2>
                    <div class="flex gap-6">
                        {{-- <button @click="actionType = 'update'" 
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">Tambah Data</button> --}}
                        <form action="/pinjam" method="GET">
                            <input type="text" name="s" id="cari" placeholder="Cari berdasarkan token..."
                                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        </form>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <form action="/pinjam/update" method="POST" id="bulkActionForm" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <table class="w-full table-auto border border-gray-200">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th
                                        class="min-w-[200px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                        Nama peminjam</th>
                                    <th
                                        class="min-w-[150px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                        Judul Buku</th>
                                    <th
                                        class="min-w-[150px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                        Status</th>
                                    <th
                                        class="min-w-[150px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                        Tanggal tenggat</th>
                                    <th
                                        class="min-w-[150px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                        Token</th>

                                    <th
                                        class="min-w-[120px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                        Pilih</th>
                                    <th
                                        class="min-w-[120px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($pinjaman as $p)
                                    <tr>
                                        <td class="px-3 py-2 break-words"><a
                                                href="/detail/{{ $p->token }}">{{ $p->user->fullname }}</a></td>
                                        <td class="px-3 py-2 whitespace-nowrap">{{ $p->buku->judul }}</td>
                                        <td class="py-3 px-6 text-left">
                                            <select name="status[{{ $p->id }}]" class="bg-gray-50 rounded p-1">
                                                <option value="belum dikembalikan"
                                                    {{ $p->status == 'belum dikembalikan' ? 'selected' : '' }}>
                                                    Belum Dikembalikan
                                                </option>
                                                <option value="belum diambil"
                                                    {{ $p->status == 'belum diambil' ? 'selected' : '' }}>
                                                    Belum Diambil
                                                </option>
                                                <option value="sudah diambil"
                                                    {{ $p->status == 'sudah diambil' ? 'selected' : '' }}>
                                                    Sudah Diambil
                                                </option>
                                                <option value="sudah dikembalikan"
                                                    {{ $p->status == 'sudah dikembalikan' ? 'selected' : '' }}>
                                                    Sudah Dikembalikan
                                                </option>
                                            </select>

                                        </td>
                                        <td class="px-3 py-2 whitespace">
                                            {{ \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('Y-m-d') }}
                                        </td>
                                        <td class="px-3 py-2 whitespace">{{ $p->token }}</td>
                                        <td class="px-3 py-2  flex gap-2">
                                            <input type="checkbox" name="ids[]" value="{{ $p->id }}"
                                                class="checkboxItem">
                                        </td>
                                        <td class="px-3 py-2 whitespace">
                                            <form action="/pinjam/{{ $p->id }}" method="POST" onsubmit="event.stopPropagation();" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="font-semibold text-red-600 cursor-pointer delete-button">Hapus</button>
                                                    <script>
                                                        document.addEventListener("DOMContentLoaded", function() {
                                                            document.querySelectorAll(".delete-form").forEach(function(form) {
                                                                form.addEventListener("submit", function(event) {
                                                                    event.stopPropagation(); // Mencegah event menyebar ke form utama
                                                                });
                                                            });
                                                        });
                                                    </script>
                                            </form>
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
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-3">
                            Confirm Update
                        </button>
                    </form>
                    {{ $pinjaman->links() }}

                </div>
            </main>
        </div>


    </div>

</x-layout>
