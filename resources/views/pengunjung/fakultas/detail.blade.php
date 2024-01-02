<x-pengunjung-layout>
    <main class="min-h-screen p-3">
        {{-- detail fakultas --}}
        <section class="pt-16">
            <div class="container">
                <div class="text-sm breadcrumbs p-4 mb-5">
                    <ul>
                        <li><a href="{{ route('pengunjung.dashboard') }}" class="hover:text-indigo-400">Home</a></li>
                        <li><a href="{{ route('pengunjung.kampus.detail', $fakultas->Kampus->slug) }}"
                                class="hover:text-indigo-400 capitalize">{{ $fakultas->Kampus->nama }}</a></li>
                        <li><a href="{{ route('pengunjung.fakultas.detail', $fakultas->slug) }}"
                                class="hover:text-indigo-400">{{ $fakultas->nama }}</a></li>
                    </ul>
                </div>
                <div class="min-h-[70px] p-4 bg-base-200 dark:bg-indigo-200 rounded-lg">
                    <h4 class="text-slate-800 font-medium sm:text-center">
                        {{ $fakultas->kampus->nama }}
                    </h4>
                    <div class=" mb-3">
                        <h2 class="text-2xl md:text-3xl text-slate-800 font-semibold capitalize sm:text-center">
                            Fakultas
                            {{ $fakultas->nama }} </h2>
                    </div>
                </div>
            </div>
        </section>
        {{-- end datail fakultas --}}

        {{-- profil kampus etc --}}
        <section class="pt-5">
            <div class="container">
                <div class="min-h-[300px]">
                    <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-3">
                        <div class="p-4 ">
                            <div class="space-y-3">
                                <h1 class="  text-center text-2xl font-semibold capitalize">Profil singkat fakultas
                                    {{ $fakultas->nama }}</h1>
                                <h4 class="text-left indent-3 md:indent-5 text-slate-500 dark:text-slate-200">
                                    {{ $fakultas->tentang }}
                                </h4>
                            </div>
                            <h3 class="text-md mt-8 text-center capitalize">aplikasi daftar dibawah</h3>
                            <div class="mt-4 text-center">
                                <a href="#"
                                    class="px-7 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 inline-flex items-center py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-800 border border-transparent rounded-md">
                                    Daftar
                                </a>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-center md:justify-start ms-4 ">
                                <h1 class="text-2xl text-slate-700 font-semibold capitalize dark:text-slate-200 ">progam
                                    studi</h1>
                            </div>
                            {{-- <h2 class="mb-2 text-lg mt-2 font-semibold text-gray-900 dark:text-white">Jurusan:</h2> --}}
                            <ol
                                class="max-w-md mt-4 space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400">
                                @forelse ($fakultas->Jurusan as $jurusan)
                                    <li>
                                        <span class="font-semibold text-gray-900 dark:text-slate-300">
                                            {{ $jurusan->nama }}
                                    </li>
                                @empty
                                    <p class="flex justify-center text-red-600">tidak ada jurusan</p>
                                @endforelse
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end profil kampus etc --}}

        {{-- table pembayaran --}}
        <section class="pt-11">
            <div class="container">
                <div>
                    <div class=" max-w-[700px] mx-auto md:max-w-[1200px] shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Jurusan
                                    </th>
                                    <th scope="col" class="px-6 py-3 hidden md:table-cell">
                                        Biaya
                                    </th>
                                    <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                                        Jadwal
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center sm:text-left ">
                                        Kategori Pelaksanaan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($fakultas->Jurusan as $jurusan)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                        <th scope="row" class="px-6 py-4 text-gray-600 dark:text-white">
                                            {{ $jurusan->nama }}
                                            <dt class=" w-20 sr-only">Biaya</dt>
                                            <dd class="text-slate-400 md:hidden">Rp.200000 (spp)</dd>
                                            <dt class=" sr-only">Jadwal</dt>
                                            <dd class="text-slate-400 sm:hidden">21-10-2004</dd>
                                        </th>
                                        <td class="px-6 py-4 hidden md:table-cell dark:text-slate-200">
                                            Rp.200000 (spp)
                                        </td>
                                        <td class="px-6 py-4 hidden sm:table-cell dark:text-slate-200 ">
                                            21-10-2004
                                        </td>
                                        <td class="px-6 py-4 text-slate-700 font-medium dark:text-slate-200">
                                            pendaftaran mahasiswa baru
                                        </td>
                                    </tr>
                                @empty
                                    <p class="flex justify-center text-red-500">Tidak ada detail </p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
        {{-- table pembayaran --}}
    </main>

</x-pengunjung-layout>
