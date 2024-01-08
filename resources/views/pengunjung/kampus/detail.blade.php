<x-pengunjung-layout>
    <main>
        {{-- hero section --}}
        <section class="pt-14">
            <div class="container">
                <div class="text-sm breadcrumbs p-4 mt-3 md:text-md">
                    <ul>
                        <li><a href="{{ route('pengunjung.dashboard') }}" class="hover:text-indigo-400">Home</a></li>
                        <li>
                            <a href="{{ route('pengunjung.kampus.detail', $kampus->slug) }}"
                                class="hover:text-indigo-400 capitalize">{{ $kampus->nama }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="hero-content md:flex-row-reverse flex-col max-w-full mx-auto">
                    <figure class="h-15 md:aspect-video lg:min-w-[600px]">
                        @empty(!$kampus->gambar->first()->gambar)
                            <img src="{{ asset('storage/' . $kampus->gambar->first()->gambar) }}" class="w-full rounded-lg shadow-2xl" />
                        @else
                            <p class="uppercase text-red-600 self-center">tidak ada gambar</p>
                        @endempty
                    </figure>
                    <div class="md:pt-3 lg:flex-row-reverse lg:ps-0 md:ps-4 sm:ps-6 w-full">
                        <h1 class="text-[30px] lg:text-[35px] font-bold text-start capitalize">
                            {{ $kampus->nama }}
                        </h1>
                        <p class="lg:text-[20px] text-slate-600 dark:text-slate-200 capitalize">{{ $kampus->kategori }}
                        </p>
                        <div class="flex justify-start mx-auto mt-3 space-x-3">

                            {{-- whatsapp --}}
                            <a href="https://web.whatsapp.com/" target="_blank"
                                class="h-7 border-slate-300 hover:border-green-600 hover:text-green-600 flex items-center justify-center w-6 rounded-full">
                                <svg role="img" class="fill-current" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>WhatsApp</title>
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                            </a>
                            {{-- end whatssap --}}

                            {{-- email --}}
                            <a href="https://gmail.com/" target="_blank"
                                class="h-7 border-slate-300 hover:border-red-600 hover:text-red-600 flex items-center justify-center w-6 rounded-full">
                                <svg role="img" class="fill-current" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>Gmail</title>
                                    <path
                                        d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z" />
                                </svg>
                            </a>
                            {{-- end email --}}

                            {{-- telepon --}}
                            <a href="https://play.google.com/store/apps/details?id=v.d.d.answercall&hl=id&gl=US&pli=1"
                                target="_blank"
                                class="h-7 border-slate-300 hover:border-green-600 hover:text-green-600 flex items-center justify-center w-6 rounded-full">
                                <ion-icon name="call-outline" size="large"></ion-icon>
                            </a>
                            {{-- end telepon --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end hero section --}}

        {{-- profil singkat --}}
        <section class="pt-11">
            <div class=" container">
                <div
                    class="md:max-w-[800px] lg:max-w-full bg-base-200 dark:bg-gray-950 min-h-[200px] lg:text-center p-4 mx-auto  text-center">
                    <h2
                        class="md:text-2xl text-slate-800 mt-2 dark:text-slate-200 font-sans text-xl font-semibold capitalize">
                        Profil Singkat {{ $kampus->nama }}
                    </h2>
                    <div class="mt-2">
                        <p class="indent-5 lg:text-md text-center text-slate-800 dark:text-slate-200 max-w-full">
                            {{ $kampus->tentang }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        {{-- end profil singkat --}}

        {{-- daftar fakultas --}}
        <section class="pt-11">
            <div class="container">
                <div class="min-h-[500px]">
                    <div class="flex justify-center ps-3 ">
                        <h2 class="font-bold text-xl md:text-2xl self-center capitalize ">Daftar Fakultas
                            {{ $kampus->nama }}</h2>
                    </div>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-3 lg:grid-cols-3 lg:gap-4 mt-4 md:mt-6">
                        @forelse ($kampus->Fakultas as $fakultas)
                            <div class="card w-[380px] dark:bg-zinc-900 sm:w-full mx-auto bg-base-100 shadow-xl">
                                <div class="card-body">
                                    <div class="flex justify-between">
                                        <div>
                                            <h2
                                                class="card-title text-slate-800 text-lg capitalize me-3  dark:text-slate-300 ">
                                                Fakultas
                                                {{ $fakultas->nama }}
                                            </h2>
                                        </div>
                                        @if ($fakultas->status)
                                            <div>
                                                <span
                                                    class="inline-flex items-center rounded-md bg-green-50  px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 dark:bg-green-100 dark:text-green-900 dark:ring-green-800/20">Enable</span>
                                            </div>
                                        @else
                                            <div>
                                                <span
                                                    class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Disable</span>
                                            </div>
                                        @endif
                                    </div>
                                    <p class="text-slate-700 line-clamp-1 md:line-clamp-3 dark:text-slate-300">
                                        {{ $fakultas->tentang }}
                                    </p>
                                    <div class="card-actions justify-end  mt-3">
                                        <a href="{{ route('pengunjung.fakultas.detail', $fakultas->slug) }}"
                                            class="px-7 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 inline-flex items-center py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-800 border border-transparent rounded-md">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="min-w-[1300px]">
                                <p class="flex justify-center mx-auto text-red-500 uppercase font-medium">tidak ada
                                    fakultas</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        {{-- end daftar fakultas --}}
    </main>
</x-pengunjung-layout>
