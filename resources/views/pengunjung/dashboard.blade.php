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
                                                                di Kampus {{ $jurusan->fakultas->kampus->nama }},
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

    {{-- layout --}}
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="app-academy">
            <div class="card p-0 mb-4">
                <form action="{{ route('pengunjung.dashboard') }}">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                        <div
                            class="app-academy-md-50 card-body sm:text-center d-flex align-items-md-center flex-column text-md-center mb-4">
                            <span class="card-title mb-3 lh-lg px-md-5 display-6 text-heading">
                                Daftar Kampus Malang
                            </span>
                            <p class="mb-3">
                                Silahkan Cari Kampus favorit anda
                            </p>
                            <div class="d-flex align-items-center justify-content-between app-academy-md-50">
                                <input type="search" name="search" value="{{ old('search', request('search')) }}"
                                    placeholder="Cari Kampus" class="form-control me-2" />
                                <button type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <h4 class="py-3 mb-4"><span class="text-muted fw-light">Ditemukan ada</span> 1000 Kampus</h4> --}}
            <div class="card mb-4">
                <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                    <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">Daftar Kampus</h5>
                        <p class="mb-0">Total Kampus ada {{ $kampuses->count() }}</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-4 mb-4">
                        @foreach ($kampuses as $kampus)
                            <div class="col-sm-6 col-lg-4 grid-flow-col auto-cols-max">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3 sm:w-30 sm:h-30" style="height: 320px">
                                        @if (!empty($kampus->gambar->first()->gambar))
                                            <img src="/storage/{{ $kampus->Gambar->first()->gambar }}"
                                                class="img-fluid w-full h-80 object-cover rounded-md" alt="dada">
                                        @else
                                            <p class="flex justify-center items-center uppercase text-red-500">tidak ada
                                                gambar</p>
                                        @endif

                                    </div>
                                    <div class="card-body p-3 pt-2">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span
                                                class="badge rounded-pill bg-label-primary">{{ ucwords($kampus->kategori) }}</span>
                                            <p class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                                {{-- 4.4 <span class="text-warning"><i
                                                        class="mdi mdi-star me-1"></i></span><span
                                                    class="fw-normal">(1.23k)</span> --}}
                                            </p>
                                        </div>
                                        <a href="{{ route('pengunjung.kampus.detail', $kampus->slug) }}"
                                            class="h5">{{ ucwords($kampus->nama) }}</a>
                                        <p class="mt-2 sm:truncate">{{ $kampus->tentang }}</p>
                                        <div
                                            class="d-flex flex-column flex-md-row gap-3 mt-3 text-nowrap flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                            <a class="w-100 btn btn-outline-primary d-flex align-items-center"
                                                href="{{ route('pengunjung.kampus.detail', $kampus->slug) }}">
                                                <span class="me-1">Detail</span><i
                                                    class="mdi mdi-arrow-right lh-1 scaleX-n1-rtl"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                        {{ $kampuses->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-pengunjung-layout>
