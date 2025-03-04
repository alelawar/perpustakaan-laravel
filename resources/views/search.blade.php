<x-layout :title="$title">
    <div class="w-full p-6">
        <h3 class="font-bold text-2xl">Hasil Pencarian untuk "{{ request('s') }}"</h3>
    </div>

    <div class="">
        {{ $books->links() }}
        <div class="grid grid-cols-7 gap-3 gap-y-12">
            @forelse ($books as $f)
                <a href="detail/{{ $f->slug }}"
                    class="w-full hover:shadow-2xl p-2 border border-slate-400 rounded-xl">
                    @if ($f->cover)
                        <img src="{{ asset('storage/' . $f->cover) }}"
                            alt="" class="mb-4">
                    @else
                        <img src="https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786020637389_Kisah_dari_Tebing_Buku_2_cov_FINAL-1.jpg"
                            alt="" class="mb-4">
                    @endif
                    <div class="p-2">
                        <p class="text-sm text-slate-500">{{ $f->pembuat }}</p>
                        <p class="">{{ Str::limit($f->judul, 20) }}</p>
                    </div>
                </a>
            @empty
            <p class="text-center text-gray-500">Belum ada buku yang tersedia.</p>
            @endforelse
        </div>
    </div>
</x-layout>