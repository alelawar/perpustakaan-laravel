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

    <div class="flex h-full bg-gray-200" x-data="{ open: false }">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <x-header></x-header>

            <main class="mt-10">
                <h3 class="mt-4 mb-10 text-2xl pb-2 w-fit border-b-4 border-indigo-600 font-bold">
                    Buku yang dipinjam :
                </h3>
                <div class="flex gap-8">
                    <a href="/detail/{{ $pinjaman->buku->slug }}" class="max-w-[32vh] items-center hover:shadow-2xl p-2 border border-slate-400 rounded-xl">
                        @if ($pinjaman->buku->cover)
                            <img src="{{ asset('storage/' . $pinjaman->buku->cover) }}" alt=""
                                class="mb-4 mx-auto">
                        @else
                            <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                                alt="" class="mb-4 mx-auto">
                        @endif
                        <div class="p-2">
                            <p class="text-sm text-slate-500">{{ $pinjaman->buku->pembuat }}</p>
                            <p class="">{{ Str::limit($pinjaman->buku->judul) }}</p>
                        </div>
                    </a>
                    <div class="bg-gray-100 p-4 rounded-lg h-fit shadow-md">
                        <h3 class="my-4 text-xl font-semibold text-blue-600">Detail Peminjam</h3>
                        <ul class="list-disc pl-5">
                            <li class="text-gray-800">Nama: <span
                                    class="font-bold">{{ $pinjaman->user->fullname }}</span></li>
                            <li class="text-gray-800">No. Telepon: <span
                                    class="font-bold">{{ $pinjaman->user->telepon }}</span></li>
                            <li class="text-gray-800">Alamat: <span
                                    class="font-bold">{{ $pinjaman->user->alamat }}</span></li>
                        </ul>
                        <h3 class="my-4 text-xl font-semibold text-blue-600">Detail Pinjaman</h3>
                        <ul class="list-disc pl-5">
                            <li class="text-gray-800">Tanggal dipinjam : <span
                                    class="font-bold">{{ $pinjaman->tanggal_dipinjam }}</span></li>
                            <li class="text-gray-800">Tanggal pengembalian : <span
                                    class="font-bold">{{ $pinjaman->tanggal_pengembalian }}</span></li>
                            <li class="text-gray-800">Status : <span
                                    class="font-bold ">{{ $pinjaman->status }}</span></li>
                            <li class="text-gray-800">Token : <span
                                    class="font-bold text-red-500 underline underline-offset-4">{{ $pinjaman->token }}</span></li>
                        </ul>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg h-fit shadow-md">
                        <h2 class="my-4 text-xl font-semibold text-blue-600">Petunjuk Pengambilan</h2>
                        <ol class="list-decimal list-inside mt-2 text-sm text-gray-700 font-medium">
                            <li class="text-gray-800">Datangi perpustakaan <span class="underline text-indigo-600">Yonmedia</span> terdekat, dan temui perpustakawan.</li>
                            <li class="text-gray-800">Sampaikan kepada perpustakawan ingin mengambil buku online.</li>
                            <li class="text-gray-800">Tunjukan Token pengambilan kepada perpustakawan.</li>
                            <li class="text-gray-800">Setelah token valid, kamu akan diberikan buku yang kamu inginkan.</li>
                            <li class="text-gray-800">Pengambilan kamu akan terverifikasi di web, kembalikan sesuai <span class="text-red-600 underline">jadwal yang ditunjukkan.</span></li>
                        </ol>
                    </div>
                </div>
            </main>
        </div>
</x-layout>
 