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
                                <h4 class="text-left indent-3 md:indent-5 text-slate-800 dark:text-slate-200">
                                    {{ $fakultas->tentang }}
                                </h4>
                            </div>
                            <h3 class="text-md mt-8 text-center capitalize">aplikasi daftar dibawah</h3>
                            <div class="mt-4 text-center ">
                                @auth
                                    <label for="daftar"
                                        class="px-7 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 inline-flex items-center py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-800 border border-transparent rounded-md ">Daftar</label>
                                    <input type="checkbox" id="daftar" class="modal-toggle " />
                                    <div class="modal" role="dialog">
                                        <div class="modal-box dark:bg-zinc-900">
                                            <form action="{{ route('pendaftaran.store', $fakultas->kampus->slug) }}"
                                                method="POST" class="space-y-6">
                                                @csrf
                                                <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200 ">Silahkan
                                                    Pilih Jurusan</h3>
                                                <select
                                                    class="select select-bordered dark:hover:select-primary w-full max-w-xs dark:bg-dark"
                                                    name="jurusan_id">
                                                    <option disabled selected class="dark:text-slate-200">Pilih Jurusan
                                                    </option>
                                                    @forelse ($fakultas->Jurusan as $jurusan)
                                                        <option class="dark:text-slate-200 capitalize"
                                                            value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                                                    @empty
                                                        <option selected disabled class="text-red-500"> tidak ada jurusan
                                                        </option>
                                                    @endforelse
                                                </select>
                                                <div class="modal-action">
                                                    <label for="daftar" class="btn">Cancel</label>
                                                    <button class="btn btn-primary"> Daftar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <label for="daftar"
                                        class="px-7 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 inline-flex items-center py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-800 border border-transparent rounded-md cursor-not-allowed">Daftar</label>
                                    <input type="checkbox" class="modal-toggle " disabled /><br>
                                    <small class="text-red-500">Silahkan Login Terlebih dahulu</small>
                                @endauth

                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-center md:justify-start ms-4 ">
                                <h1
                                    class="text-2xl text-slate-700 font-semibold capitalize md:text-3xl dark:text-slate-200">
                                    progam
                                    studi</h1>
                            </div>
                            <ol class="max-w-md mt-4 space-y-1 text-gray-500  list-inside dark:text-gray-400">
                                @forelse ($fakultas->Jurusan as $jurusan)
                                    <li>
                                        <span class="font-semibold text-gray-900 md:text-md dark:text-slate-300">
                                            {{ $loop->iteration }} {{ $jurusan->nama }}
                                    </li>
                                @empty
                                    <p class="flex justify-center text-red-600 uppercase">tidak ada progam studi</p>
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
                                        <th scope="row" class="px-6 py-4 text-slate-800 dark:text-white">
                                            {{ $jurusan->nama }}
                                            <dt class=" w-20 sr-only">Biaya</dt>
                                            @foreach ($jurusan->pembayaran as $pembayaran)
                                                <dd class="text-slate-500 md:hidden">
                                                    Rp.{{ number_format($pembayaran->biaya) }}
                                                    ({{ $pembayaran->kategori }})</dd>
                                            @endforeach
                                            <dt class=" sr-only">Jadwal</dt>
                                            @foreach ($jurusan->pelaksanaan as $pelaksanaan)
                                                <dd class="text-slate-500 sm:hidden">{{date('d-m-Y', strtotime($pelaksanaan->jadwal))}}</dd>
                                            @endforeach
                                        </th>
                                        @foreach ($jurusan->pembayaran as $pembayaran)
                                            <td class="px-6 py-4 hidden md:table-cell dark:text-slate-200 ">
                                                Rp.{{ number_format($pembayaran->biaya) }}
                                                ({{ $pembayaran->kategori }})
                                            </td>
                                        @endforeach
                                        @foreach ($jurusan->pelaksanaan as $pelaksanaan)
                                            <td class="px-6 py-4 hidden sm:table-cell dark:text-slate-200 ">
                                                {{ date('d-m-Y',strtotime($pelaksanaan->jadwal)) }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-slate-800 font-medium dark:text-slate-200  capitalize">
                                                {{ $pelaksanaan->nama }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @empty
                                    <tr class="h-[200px]">
                                        <td colspan="5 ">
                                            <p class="flex justify-center text-red-500 text-lg">Tidak ada detail </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
        {{-- table pembayaran --}}
    </main>

</x-pengunjung-layout>
