<x-pengunjung-layout>
    <main>
        {{-- hero section --}}
        <section class="pt-12">
            <div class="container">
                <div class="hero-content lg:flex-row-reverse flex-col max-w-full mx-auto">
                    <figure class="h-15 md:aspect-[video] md:min-w-[600px]">
                        @forelse ($kampus->Gambar as $gambar)
                            <img src="{{ asset('storage/' . $gambar->gambar) }}" class="w-full rounded-lg shadow-2xl" />
                        @empty
                            <p class="uppercase text-red-600 self-center">tidak ada gambar</p>
                        @endforelse
                    </figure>
                    <div class="md:pt-3 lg:flex-row-reverse lg:ps-0 md:ps-4 sm:ps-6 w-full">
                        {{-- gambar nanti aja dipikirin --}}
                        {{-- <div class="lg:w-28 lg:mb-5 w-12">
                        <img src="../../public/img/um2.png" alt="" />
                    </div> --}}
                        <h1 class="text-[30px] lg:text-[35px] font-bold text-start capitalize">
                            {{ $kampus->nama }}
                        </h1>
                        <p class="lg:text-[20px] text-slate-600 dark:text-slate-200 capitalize">{{ $kampus->kategori }}
                        </p>
                        <div class="flex justify-start mx-auto mt-3 space-x-2">
                            <a href="https://facebook.com/" target="_blank"
                                class="h-7 border-slate-300 hover:border-blue-600 hover:text-blue-600 flex items-center justify-center w-6 rounded-full">
                                <svg role="img" class="fill-current" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>Facebook</title>
                                    <path
                                        d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z" />
                                </svg>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank"
                                class="w-7 h-7 border-slate-300 hover:border-red-600 hover:text-red-600 flex items-center justify-center rounded-full">
                                <svg role="img" class="fill-current" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>YouTube</title>
                                    <path
                                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank"
                                class="border-slate-300 hover:border-rose-600 hover:text-rose-600 flex items-center justify-center w-6">
                                <svg role="img" class="fill-current" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>Instagram</title>
                                    <path
                                        d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end hero section --}}

        {{-- profil singkat --}}
        <section class="py-10">
            <div class="bg-base-200 dark:bg-gray-950 container">
                <div class="md:w-[800px] min-h-[200px] lg:text-center py-5 mx-auto  text-center">
                    <h2 class="md:text-2xl text-slate-800 mt-5 dark:text-slate-200 font-sans text-xl font-semibold">
                        Profil Singkat {{ $kampus->nama }}
                    </h2>
                    <div class="mt-2">
                        <p
                            class="indent-5 lg:text-md text-start lg:text-center text-slate-800 dark:text-slate-200 max-w-full">
                            {{ $kampus->tentang }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        {{-- end profil singkat --}}

        {{-- daftar fakultas --}}
        <section class="pt-10">
            <div class="container">
                <div class="grid grid-cols-1 min-h-[360px] sm:grid-cols-3">
                    <div class="sm:m-0 md:order-none order-3 pb-5 m-3">
                        <h1 class="md:text-2xl text-xl font-semibold">
                            Pilihan Progam Studi
                        </h1>
                        <h3 class="md:text-md text-slate-700 dark:text-slate-200 mt-2">
                            Daftar melalui Link dibawah
                        </h3>
                        <div class="mt-5 mb-5">
                            <button class="btn btn-primary font-semibold">
                                Daftar
                            </button>
                        </div>
                    </div>
                    <div class="lg:pt-0 sm:pt-0 inline-block">
                        <h2 class="ms-4 md:text-2xl text-xl font-semibold">
                            Pilihan Progam Studi
                        </h2>
                        @forelse ($kampus->Fakultas as $fakultas)
                            <div class="collapse collapse-arrow">
                                <input type="radio" name="my-accordion-2" />
                                <div class="collapse-title text-md md:text-lg font-medium">
                                    Fakultas {{ $fakultas->nama }}
                                </div>
                                <div class="collapse-content grid lg:grid-cols-2 lg:gap-2">
                                    @forelse ($fakultas->Jurusan as $jurusan)
                                        <ol
                                            class="ms-3 lg:ms-0 text-slate-800 dark:text-slate-200 items-center text-sm">
                                            <li>
                                                <a href=""
                                                    class="text-blue-700 hover:underline dark:text-slate-200 dark:hover:text-blue-500">S1
                                                    {{ $jurusan->nama }}</a>
                                            </li>
                                        </ol>
                                    @empty
                                        <p class="text-red-400 uppercase flex justify-center">tidak ada jurusan</p>
                                    @endforelse
                                </div>

                            </div>
                        @empty
                            <p class="text-red-400 uppercase flex justify-center">tidak ada fakultas</p>
                        @endforelse
                    </div>
                    <div class="lg:pt-0 sm:pt-0 inline-block pt-4">
                        <h2 class="ms-4 md:text-2xl text-xl font-semibold">Jalur Masuk</h2>
                        <div class="collapse collapse-arrow">
                            <input type="radio" name="my-accordion-1" />
                            <div class="collapse-title text-md md:text-lg font-medium">
                                Seleksi Nasional Berbasis Prestasi (SNBP)
                            </div>
                            <div class="collapse-content">
                                <p class="text-coklat hover:underline ms-4 text-sm cursor-pointer">
                                    Seleksi Nasional Berbasis Prestasi (SNBP)
                                </p>
                            </div>
                        </div>
                        <div class="collapse collapse-arrow">
                            <input type="radio" name="my-accordion-1" />
                            <div class="collapse-title text-md md:text-lg font-medium">
                                Seleksi Nasional Berbasis Tes
                            </div>
                            <div class="collapse-content">
                                <p class="ms-3 text-coklat hover:underline items-center text-sm cursor-pointer">
                                    Seleksi Nasional Berbasis Tes (SNBT)
                                </p>
                            </div>
                        </div>
                        <div class="collapse collapse-arrow">
                            <input type="radio" name="my-accordion-1" />
                            <div class="collapse-title text-md md:text-lg font-medium">
                                Seleksi Mandiri
                            </div>
                            <div class="collapse-content">
                                <ol class="ms-3 text-neutral-800 items-center text-sm">
                                    <li class="text-coklat hover:underline cursor-pointer">
                                        1. Seleksi Mandiri Jalur Prestasi
                                    </li>
                                    <li class="text-coklat hover:underline cursor-pointer">
                                        2. Seleksi Mandiri Berbasis Skor UTBK-SNBT
                                    </li>
                                    <li class="text-coklat hover:underline cursor-pointer">
                                        3. Seleksi Mandiri Jalur Tes Masuk Berbasis Komputer (TMBK)
                                    </li>
                                    <li class="text-coklat hover:underline cursor-pointer">
                                        4. Seleksi Mandiri Jalur Kemitraan
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end daftar fakultas --}}
    </main>
</x-pengunjung-layout>
