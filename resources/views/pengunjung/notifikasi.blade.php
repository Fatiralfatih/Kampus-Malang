<x-pengunjung-layout>
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
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4">
            @foreach ($jurusans as $jurusan)
                @foreach ($jurusan->pendaftaran as $pendaftaran)
                    @if ($pendaftaran->pivot->status === 'disetujui')
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <a href="javascript:;" class="d-flex align-items-center">
                                            <div class="me-2 text-heading h5 mb-0">
                                                {{ $jurusan->fakultas->kampus->nama }}
                                            </div>
                                        </a>
                                    </div>
                                    <p>
                                        Selamat Anda keterima di jurusan {{ $jurusan->nama }} Kampus
                                        {{ $jurusan->fakultas->kampus->nama }}
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-auto">
                                            <button class="me-2">
                                                <span
                                                    class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Diterima</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($pendaftaran->pivot->status === 'ditolak')
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <a href="javascript:;" class="d-flex align-items-center">
                                            <div class="me-2 text-heading h5 mb-0">
                                                {{ $jurusan->fakultas->kampus->nama }}
                                            </div>
                                        </a>
                                    </div>
                                    <p>
                                        Kamu ditolak di jurusan {{ $jurusan->nama }} <br>
                                        {{ ucwords('jangan patah semangat masih ada hari esok') }}
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-auto">
                                            <button class="me-2">
                                                <span
                                                    class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Ditolak</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <a href="javascript:;" class="d-flex align-items-center">
                                            <div class="me-2 text-heading h5 mb-0">
                                                {{ $jurusan->fakultas->kampus->nama }}
                                            </div>
                                        </a>
                                    </div>
                                    <p>
                                        sedang menunggu persetujuan
                                    </p>
                                    <p>
                                        Kamu sudah mendaftar di jurusan {{ $jurusan->nama }}
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-auto">
                                            <button class="me-2 mt-2">
                                                <span
                                                    class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Menunggu
                                                    Persetujuan</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
            @if (!empty($jurusans->pendaftaran))
                <p class="flex justify-center mt-4 text-red-500 uppercase">tidak ada notifikasi</p>
            @endif
        </div>
    </div>

</x-pengunjung-layout>
