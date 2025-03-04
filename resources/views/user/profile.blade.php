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
                <div class="flex flex-wrap justify-between gap-6">
                    <!-- Profile Box -->
                    <div class="w-full md:w-[40%] lg:w-[35%] h-fit px-5 py-6 bg-slate-50 rounded-xl">
                        <h2 class="text-lg font-bold mb-4">My Profile :</h2>
                        <div class="mt-3 pb-3 border-b-4 border-indigo-500">
                            <p class="font-semibold">Nama: <span class="font-normal">{{ auth()->user()->fullname }}</span>
                            </p>
                        </div>
                        <div class="mt-3 pb-3 border-b-4 border-indigo-500">
                            <p class="font-semibold">Username: <span
                                    class="font-normal">{{ auth()->user()->username }}</span></p>
                        </div>
                        <div class="mt-3 pb-3 border-b-4 border-indigo-500">
                            <p class="font-semibold">Telepon: <span
                                    class="font-normal">{{ auth()->user()->telepon }}</span></p>
                        </div>
                        <div class="mt-3 pb-3 border-b-4 border-indigo-500">
                            <p class="font-semibold">Email: <span class="font-normal">{{ auth()->user()->email }}</span>
                            </p>
                        </div>
                        <div class="mt-3 pb-3 border-b-4 border-indigo-500">
                            <p class="font-semibold">Alamat: <span
                                    class="font-normal">{{ auth()->user()->alamat }}</span></p>
                        </div>
                    </div>

                    <!-- Pinjaman Buku -->
                    <div class="w-full md:w-[55%] lg:w-[60%] h-fit p-5 bg-slate-50 rounded-xl">
                        <h2 class="text-lg font-bold mb-4">Pinjaman Buku:</h2>
                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[800px] table-auto border border-gray-200">
                                <thead class="bg-gray-50 border-b border-gray-200">
                                    <tr>
                                        <th
                                            class="min-w-[200px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Judul</th>
                                        <th
                                            class="min-w-[150px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Tanggal Pinjam</th>
                                        <th
                                            class="min-w-[150px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Tanggal Tenggat</th>
                                        <th
                                            class="min-w-[120px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Status</th>
                                        <th
                                            class="min-w-[180px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Token</th>
                                        <th
                                            class="min-w-[180px] px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Detail</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($pinjaman as $p)
                                        <tr>
                                            <td class="px-3 py-2 break-words">{{ $p->buku->judul }}</td>
                                            <td class="px-3 py-2 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($p->tanggal_dipinjam)->format('d-m-Y') }}</td>
                                            <td class="px-3 py-2 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('d-m-Y') }}
                                            </td>
                                            <td class="px-3 py-2 whitespace-nowrap">{{ $p->status }}</td>
                                            <td class="px-3 py-2 break-words">{{ $p->token }}</td>
                                            <td class="px-3 py-2"><a href="/profile/detail/{{ $p->token }}" class="hover:underline hover:underline-offset-8">Detail</a></td>
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
</x-layout>
