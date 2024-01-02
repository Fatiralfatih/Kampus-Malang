<x-pengunjung-layout>
    <main class="min-h-screen">
    <section class="pt-20 lg:pt-24 ">
        <div class="container">
            <div class="mb-5">
                <h2 class="font-bold text-2xl ps-4">Notifikasi</h2>
            </div>
            <div class="grid grid-cols-1 gap-3 px-4 sm:grid-cols-2  sm:gap-4 lg:grid-cols-3 lg:gap-4">
                @forelse ($mahasiwases as $mahasiswa)
                    @foreach ($mahasiswa->pendaftaran as $pendaftaran)
                        @if ($pendaftaran->pivot->status === 'disetujui')
                            <div
                                class="flex flex-col gap-2 dark:text-white max-w-md sm:max-w-[900px] w-full bg-white dark:bg-neutral-900 p-5 rounded-md shadow-md ">
                                <div class="flex flex-row justify-between w-full">
                                    <div class="flex flex-row justify-between w-full">
                                        <p class="text-xs">{{ Auth::user()->nama }}</p>
                                        <p class="text-xs">{{ $pendaftaran->pivot->updated_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between w-full">
                                    <h3 class="text-xl font-bold"><span class="text-2xl">🎉</span>Congratulations!</h3>
                                </div>
                                <div class="text-sm">
                                    Anda Keterima di jurusan
                                    <span class="font-bold">
                                        {{ $mahasiswa->nama }}
                                    </span>
                                    kampus {{ $mahasiswa->fakultas->Kampus->nama }}
                                </div>
                            </div>
                        @elseif ($pendaftaran->pivot->status === 'pending')
                            <div
                                class="flex flex-col gap-2 dark:text-white max-w-md sm:max-w-[900px] w-full bg-white dark:bg-neutral-900 p-5 rounded-md shadow-md ">
                                <div class="flex flex-row justify-between w-full">
                                    <div class="flex flex-row justify-between w-full">
                                        <p class="text-xs">{{ Auth::user()->nama }}</p>
                                        <p class="text-xs">{{ $pendaftaran->pivot->updated_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between w-full">
                                    <h3 class="text-xl font-bold"><span class="text-2xl">🙄</span>Menunggu Konfirmasi!
                                    </h3>
                                </div>
                                <div class="text-sm capitalize">
                                    Permintaan Sedang Di proses! silahkan tunggu
                                </div>
                            </div>
                        @else
                            <div
                                class="flex flex-col gap-2 dark:text-white max-w-md sm:max-w-[900px] w-full bg-white dark:bg-neutral-900 p-5 rounded-md shadow-md ">
                                <div class="flex flex-row justify-between w-full">
                                    <div class="flex flex-row justify-between w-full">
                                        <p class="text-xs">{{ Auth::user()->nama }}</p>
                                        <p class="text-xs">{{ $pendaftaran->pivot->updated_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between w-full">
                                    <h3 class="text-xl font-bold"><span class="text-2xl">😭</span>Nice Try!</h3>
                                </div>
                                <div class="text-sm capitalize">
                                    Anda tidak di terima di jurusan
                                    <span class="font-bold">
                                        {{ $mahasiswa->nama }}
                                    </span>
                                    kampus {{ $mahasiswa->fakultas->Kampus->nama }}
                                    <br>
                                    <small class="capitalize mt-4 text-gray-900 font-semibold">Jangan patah Semangat masih ada hari esok </small>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @empty
                    <p class="flex justify-center text-red-500 uppercase">tidak ada notifikasi</p>
                @endforelse
            </div>
        </div>
    </section>
</main>
</x-pengunjung-layout>
