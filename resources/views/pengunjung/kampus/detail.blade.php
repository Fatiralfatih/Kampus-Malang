<x-pengunjung-layout>
    {{-- nootifikasi --}}
    <x-navbar>
        @auth
            <!-- Notification -->
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
                <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
                    href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class="mdi mdi-bell-outline mdi-24px"></i>
                    <span
                        class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h6 class="mb-0 me-auto text-sm">Notifikasi</h6>
                            {{-- <span class="badge rounded-pill bg-label-primary">asdasd</span> --}}
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container">
                        @if (count($jurusans) >= 1)
                            @foreach ($jurusans as $jurusan)
                                @if (count($jurusan->pendaftaran) >= 1)
                                    @foreach ($jurusan->pendaftaran as $pendaftaran)
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex gap-2">
                                                    @if ($pendaftaran->pivot->status === 'disetujui')
                                                        <div
                                                            class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                                                            <h6 class="mb-1 text-truncate">🎉 Selamat
                                                                {{ Auth::user()->nama }}</h6>
                                                            <small class="text-truncate text-body">Kamu Diterima di kampus
                                                                {{ $jurusan->fakultas->kampus->nama }} </small>
                                                        </div>
                                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                                            <small
                                                                class="text-muted">{{ $pendaftaran->pivot->updated_at->diffForHumans() }}</small>
                                                        </div>
                                                    @elseif ($pendaftaran->pivot->status === 'ditolak')
                                                        <div
                                                            class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                                                            <h6 class="mb-1 text-truncate">😭 Nice Try
                                                                {{ Auth::user()->nama }}</h6>
                                                            <small class="text-truncate text-body">Kamu Tidak Diterima
                                                                diKampus {{ $jurusan->fakultas->kampus->nama }},
                                                                Tetap Semangat Jangan Menyerah</small>
                                                        </div>
                                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                                            <small
                                                                class="text-muted">{{ $pendaftaran->pivot->updated_at->diffForHumans() }}</small>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                                                            <h6 class="mb-1 text-truncate">🙄 Sedang Menunggu Konfirmasi
                                                                {{ Auth::user()->nama }}</h6>
                                                            <small class="text-truncate text-body">Kamu mendaftar
                                                                di Kampus {{ $jurusan->fakultas->kampus->nama }}</small>
                                                        </div>
                                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                                            <small
                                                                class="text-muted">{{ $pendaftaran->pivot->updated_at->diffForHumans() }}</small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif

                    </li>
                    <li class="dropdown-menu-footer border-top p-2">
                        <a href="{{ route('pengunjung.notifikasi') }}"
                            class="btn btn-primary d-flex justify-content-center">
                            View all notifications
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ Notification -->

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <span class="mdi mdi-logout-variant mdi-24px"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="pages-account-settings-account.html">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-medium d-block">{{ Auth::user()->nama }}</span>
                                    <small class="text-muted">{{ Auth::user()->role }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    @if (Auth::user()->role == 'admin')
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                <i class="mdi mdi-account-outline me-2"></i>
                                <span class="align-middle">Admin Dashboard</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                <i class="mdi mdi-logout me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        @else
            <li class="me-3">
                <a href="{{ route('register') }}" class="btn btn-outline-dark waves-effect text-capitalize">Daftar</a>
            </li>
            <li class="me-3">
                <a href="{{ route('login') }}" class="btn btn-primary waves-effect text-capitalize">Masuk</a>
            </li>
        @endauth
    </x-navbar>
    <div class="container-fluid mt-3 ">
        <div class="section-py relative border-2 landing-cta p-lg-0 pb-0 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
            <div class="row align-items-center gy-5 gy-lg-0 ms-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h6 class="h2 text-primary fw-bold mb-2">{{ $kampus->nama }}</h6>
                    <p class="fw-medium mb-4">Silahkan Daftar melalui link dibawah</p>
                    <a href="{{ route('pendaftaran', $kampus->slug) }}" class="btn btn-primary">Daftar<i
                            class="mdi mdi-arrow-right mdi-24px ms-3 scaleX-n1-rtl"></i></a>
                    @if (!Auth::user())
                        <p class="mt-3 text-red-500">Untuk melakukan pendaftaran silahkan login terlebih dahulu</p>
                    @endif
                </div>
                <div class="col-lg-5 col-xl">
                    @if (!empty($kampus->gambar->first()->gambar))
                        <img src="/storage/{{ $kampus->Gambar->first()->gambar }}"
                            class="rounded-lg opacity-80 inline-flex md:min-w-[300px] sm:min-w-[630px]"
                            alt="{{ config('app.name') }}" />
                    @else
                        <p class="text-lg text-red-500 uppercase" >Tidak Gambar</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="section-py p-lg-0">
            <div class="row">
                <div class="flex justify-center uppercase text-lg font-semibold">
                    <h3>Informasi</h3>
                </div>
            </div>
        </div>
    </div>
</x-pengunjung-layout>
