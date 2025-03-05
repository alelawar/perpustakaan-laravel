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
    @if (session('error'))
        <div x-data="{ show: true }" x-show="show"
            class="fixed inset-0 flex items-center justify-center bg-stone-950/50 z-50">
            <div
                class="bg-primer-color flex flex-col items-center bg-white z-50 text-white px-6 py-3 rounded-lg shadow-lg">
                <i class="bi bi-exclamation-lg text-red-500 font-extrabold text-4xl"></i>
                <div class="mt-5 flex flex-col items-center">
                    <p class="text-black text-lg">{{ session('error') }}</p>
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
                    <h2 class="text-xl font-bold">Data Peminjam :</h2>
                    <div class="flex gap-6">
                        <button @click="actionType = 'update'"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">
                            Update Data
                        </button>
                        <button @click="actionType = 'delete'"
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 cursor-pointer">
                            Hapus Data
                        </button>
                        <form action="/pinjam" method="GET">
                            <input type="text" name="s" id="cari" placeholder="Cari berdasarkan token..."
                                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        </form>
                    </div>
                </div>

                <!-- Form Update -->
                <form x-show="actionType === 'update'" action="/pinjam/update" method="POST" id="bulkUpdateForm">
                    @csrf
                    @method('PUT')
                    <table class="w-full table-auto border border-gray-200">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama
                                    peminjam</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Judul Buku
                                </th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Token</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Pilih</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pinjaman as $p)
                                <tr>
                                    <td class="px-3 py-2"><a
                                            href="/detail/{{ $p->token }}">{{ $p->user->fullname }}</a></td>
                                    <td class="px-3 py-2">{{ $p->buku->judul }}</td>
                                    <td class="px-3 py-2">
                                        <select name="status[{{ $p->id }}]" class="bg-gray-50 rounded p-1">
                                            <option value="belum dikembalikan"
                                                {{ $p->status == 'belum dikembalikan' ? 'selected' : '' }}>Belum
                                                Dikembalikan</option>
                                            <option value="sudah dikembalikan"
                                                {{ $p->status == 'sudah dikembalikan' ? 'selected' : '' }}>Sudah
                                                Dikembalikan</option>
                                            <option value="belum diambil"
                                                {{ $p->status == 'belum diambil' ? 'selected' : '' }}>Belum
                                                diambil</option>
                                            <option value="sudah diambil"
                                                {{ $p->status == 'sudah diambil' ? 'selected' : '' }}>Sudah
                                                diambil</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2">{{ $p->token }}</td>
                                    <td class="px-3 py-2">
                                        <input type="checkbox" name="ids[]" value="{{ $p->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-3">
                        Confirm Update
                    </button>
                </form>

                <!-- Form Hapus -->
                <form x-show="actionType === 'delete'" action="/pinjam/delete" method="POST" id="bulkDeleteForm">
                    @csrf
                    @method('DELETE')
                    <table class="w-full table-auto border border-gray-200">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama
                                    peminjam</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Judul Buku
                                </th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Token</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Pilih</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pinjaman as $p)
                                <tr>
                                    <td class="px-3 py-2"><a
                                            href="/detail/{{ $p->token }}">{{ $p->user->fullname }}</a></td>
                                    <td class="px-3 py-2">{{ $p->buku->judul }}</td>
                                    <td class="px-3 py-2">{{ $p->token }}</td>
                                    <td class="px-3 py-2">
                                        <input type="checkbox" name="ids[]" value="{{ $p->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 mt-3">
                        Hapus Data
                    </button>
                </form>

                {{ $pinjaman->links() }}
            </main>
        </div>


    </div>

</x-layout>
