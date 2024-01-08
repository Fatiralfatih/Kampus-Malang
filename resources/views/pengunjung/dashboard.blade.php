<x-pengunjung-layout>
    <!-- hero section -->
    <section class="dark:text-white pt-32 pb-12">
        <div class="container">
            <div class="self-center w-full">
                <h1 class="text-[30px] text-center font-bold font-sans md:mt-4 md:text-[40px] lg:text-[50px]">
                    University.<span class="text-indigo-700">JAWA</span>
                </h1>
                <h3 class="text-center text-[15px] font-sans md:text-2xl lg:text-3xl">
                    Platform to find University in Malang dan
                </h3>
                <h4 class="text-center font-sans text-[15px] md:text-[20px] lg:text-[25px]">
                    Jadilah Mahasiswa Cogil 🚀
                </h4>
                <div class="mt-5 text-center">
                    <div class="justify-between">
                        <button class="px-3 py-1 text-[15px] shadow__btn rounded-md bg-indigo-600 md:text-[20px]">
                            #CARICEGIL🧚‍♀️
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  -->

    <!--Daftar Kampus Favorit -->
    <section class="pt-11 dark:text-white">
        <div class="container bg-base-200 rounded-lg dark:bg-dark">
            <div class="min-h-[500px] md:min-h-[700px] lg:min-h-[500px] ">
                <div class="pt-5">
                    <div class="ms-6 text-[20px] text-nowrap md:text-[25px]">
                        <h2>Daftar Kampus Favorit</h2>
                    </div>
                </div>
                <div class="md:grid-cols-3 lg:grid-cols-4  grid grid-cols-1 gap-3 px-4 mx-auto my-1 mt-4 ">
                    @forelse ($kampusFavorit as $kampus)
                        <div
                            class="ps-6 pe-6 bg-ungu dark:bg-zinc-900  dark:text-white w-full pt-6 pb-6 rounded-lg shadow-xl ">
                            <div
                                class="h-15 aspect-[3/2] rounded-lg md:aspect-[6/4] md:flex overflow-hidden lg:aspect-[6/5] group relative hover:scale-105 duration-500">
                                @if (!empty($kampus->gambar->first()->gambar))
                                    <img class="group-hover:scale-110 absolute w-full h-full transition-all duration-700 bg-cover"
                                        alt="Card Fatir"
                                        src="{{ asset('storage/' . $kampus->gambar->first()->gambar) }}" />
                                @else
                                    <p>
                                        asdasda
                                    </p>
                                @endif
                            </div>
                            <div class="mt-2">
                                <h2 class="line-clamp-1 mb-1 text-lg font-bold capitalize">
                                    {{ $kampus->nama }}
                                </h2>
                                <p class="line-clamp-2 text-slate-600 dark:text-slate-200">
                                    {{ $kampus->tentang }}
                                </p>
                            </div>
                            <div class="text-end mt-4">
                                <div class="card-actions justify-end mt-2">
                                    <a href="{{ route('pengunjung.kampus.detail', $kampus->slug) }}"
                                        class="px-7 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 inline-flex items-center py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-800 border border-transparent rounded-md">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="flex justify-center text-red-600 uppercase mx-auto">tidak ada kampus</p>
                    @endforelse
                </div>
            </div>
            {{-- @if (count($kampusFavorit) >= 1)
                <div class="p-4 mt-2">
                    <div class="flex justify-center w-full">
                        <a href="dadad:;" class="learn-more">
                            <span class="circle ms-5" aria-hidden="true">
                                <span class="icon arrow"></span>
                            </span>
                            <span class="button-text text-slate-500 hover:text-white">Selengkapnya</span>
                        </a>
                    </div>
                </div>
            @endif --}}
        </div>
    </section>
    <!-- end daftar kampus favorit -->

    <!-- daftar semua kampus -->
    <section class=" pt-11 lg:pt-14 pb-5  ">
        <div class="container  min-h-[760px] ">
            <div class="mt-5 mb-4 flex justify-between">
                <div class="ms-6 text-[20px] text-nowrap md:text-[25px] dark:text-white">
                    <h2>
                        @if (request('search'))
                            Daftar Kampus {{ old('search', request('search')) }}
                        @else
                            Daftar Semua Kampus
                        @endif
                    </h2>
                </div>
                <div class="form-control">
                    <form action="{{ route('pengunjung.dashboard') }}">
                        <input type="text" name="search" placeholder="Search..."
                            class="input input-bordered border-slate-400 md:w-auto dark:bg-gray-950 dark:input-primary dark:text-white w-24 border-2" />
                        <button type="submit" hidden>Cari</button>
                    </form>
                </div>
            </div>
            <div class="md:grid-cols-2 lg:grid-cols-2 grid grid-cols-1 gap-5 p-2 md:gap-4">
                @forelse ($kampuses as $kampus)
                    <div class="card card-compact lg:card-side bg-base-100 dark:bg-zinc-900 shadow-xl">
                        <figure
                            class="h-15 aspect-[3/2] rounded-lg md:aspect-[6/4] md:flex overflow-hidden lg:aspect-auto lg:min-w-[300px]">
                        @empty(!$kampus->gambar->first()->gambar)
                            <img class="rounded-lg w-full h-full"
                                src="{{ asset('storage/' . $kampus->gambar->first()->gambar) }}" alt="Kampus" />
                        @else
                            <p class="text-red-500 uppercase flex justify-center">Tidak ada gambar</p>
                        @endempty
                    </figure>
                    <div class="card-body">
                        <a href="{{ route('pengunjung.kampus.detail', $kampus->slug) }}"
                            class="card-title text-xl hover:text-indigo-500 lg:text-[23px] lg:mt-2 dark:text-white capitalize">{{ $kampus->nama }}</a>
                        <p class="line-clamp-2 lg:line-clamp-4 dark:text-white">
                            {{ $kampus->tentang }}
                        </p>
                        <div class="card-actions justify-end mt-2">
                            <a href="{{ route('pengunjung.kampus.detail', $kampus->slug) }}"
                                class="px-7 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 inline-flex items-center py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-800 border border-transparent rounded-md">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="inline-flex justify-center items-center text-red-600 uppercase">tidak ada kampus</p>
            @endforelse
        </div>
    </div>
    <div class="flex justify-center mt-5">
        {{-- {{$kampuses->links()}} --}}
    </div>
</section>
<!-- end daftar semua kampus -->
</x-pengunjung-layout>
