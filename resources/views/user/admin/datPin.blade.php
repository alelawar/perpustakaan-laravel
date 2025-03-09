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

    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
        <!-- Main Content Container -->
        <div class="container mx-auto px-4 py-8" x-data="{ open: false }">
            <x-header></x-header>

            <main class="mt-8" x-data="{ activeTab: 'update' }">
                <!-- Page Header with Card -->
                <div class="bg-white rounded-xl shadow-sm mb-8 p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <h2 class="text-2xl font-bold text-gray-800">Data Peminjam</h2>

                        <!-- Search Bar -->
                        <div class="w-full md:w-1/3">
                            <form action="/pinjam" method="GET" class="relative">
                                <input type="text" name="s" id="cari"
                                    placeholder="Cari berdasarkan token..."
                                    class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition-colors">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Action Tabs -->
                <div class="bg-white rounded-xl shadow-sm mb-6">
                    <div class="flex border-b border-gray-200">
                        <button @click="activeTab = 'update'"
                            :class="{ 'bg-blue-50 text-blue-600 border-b-2 border-blue-500': activeTab === 'update', 'text-gray-500 hover:text-gray-700': activeTab !== 'update' }"
                            class="flex-1 py-4 px-6 font-medium text-center transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Update Data
                        </button>
                        <button @click="activeTab = 'delete'"
                            :class="{ 'bg-red-50 text-red-600 border-b-2 border-red-500': activeTab === 'delete', 'text-gray-500 hover:text-gray-700': activeTab !== 'delete' }"
                            class="flex-1 py-4 px-6 font-medium text-center transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Hapus Data
                        </button>
                    </div>

                    <!-- Form Update -->
                    <div x-show="activeTab === 'update'" class="p-6">
                        <form action="/pinjam/update" method="POST" id="bulkUpdateForm">
                            @csrf
                            @method('PUT')
                            <div class="overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th
                                                class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Nama Peminjam</th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Judul Buku</th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Status</th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Token</th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                <span class="sr-only">Pilih</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($pinjaman as $p)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <a href="/detail/{{ $p->token }}"
                                                        class="text-blue-600 hover:text-blue-800 font-medium">
                                                        {{ $p->user->fullname }}
                                                    </a>
                                                </td>
                                                <td class="px-4 py-3">{{ $p->buku->judul }}</td>
                                                <td class="px-4 py-3">
                                                    <select name="status[{{ $p->id }}]"
                                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                        <option value="belum dikembalikan"
                                                            {{ $p->status == 'belum dikembalikan' ? 'selected' : '' }}>
                                                            Belum Dikembalikan
                                                        </option>
                                                        <option value="sudah dikembalikan"
                                                            {{ $p->status == 'sudah dikembalikan' ? 'selected' : '' }}>
                                                            Sudah Dikembalikan
                                                        </option>
                                                        <option value="belum diambil"
                                                            {{ $p->status == 'belum diambil' ? 'selected' : '' }}>
                                                            Belum Diambil
                                                        </option>
                                                        <option value="sudah diambil"
                                                            {{ $p->status == 'sudah diambil' ? 'selected' : '' }}>
                                                            Sudah Diambil
                                                        </option>
                                                    </select>
                                                </td>
                                                <td class="px-4 py-3 text-gray-500 font-mono">{{ $p->token }}</td>
                                                <td class="px-4 py-3 text-right">
                                                    <label class="inline-flex items-center">
                                                        <input type="checkbox" name="ids[]"
                                                            value="{{ $p->id }}"
                                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                    </label>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-6">
                                <button type="submit"
                                    class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Konfirmasi Update
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Form Hapus -->
                    <div x-show="activeTab === 'delete'" class="p-6">
                        <form action="/pinjam/delete" method="POST" id="bulkDeleteForm">
                            @csrf
                            @method('DELETE')
                            <div class="overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th
                                                class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Nama Peminjam</th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Judul Buku</th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Token</th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                <span class="sr-only">Pilih</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($pinjaman as $p)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <a href="/detail/{{ $p->token }}"
                                                        class="text-blue-600 hover:text-blue-800 font-medium">
                                                        {{ $p->user->fullname }}
                                                    </a>
                                                </td>
                                                <td class="px-4 py-3">{{ $p->buku->judul }}</td>
                                                <td class="px-4 py-3 text-gray-500 font-mono">{{ $p->token }}</td>
                                                <td class="px-4 py-3 text-right">
                                                    <label class="inline-flex items-center">
                                                        <input type="checkbox" name="ids[]"
                                                            value="{{ $p->id }}"
                                                            class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                                    </label>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-6">
                                <button type="submit"
                                    class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus Data Terpilih
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="bg-white rounded-xl shadow-sm p-4">
                    {{ $pinjaman->links() }}
                </div>
            </main>
        </div>
    </div>

</x-layout>
