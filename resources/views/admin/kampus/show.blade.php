<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h3 class="mb-4 text-lg font-medium uppercase">Detail {{ $kampus->nama }}</h3>
        <div class="row mb-5">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($kampus->Gambar as $gambar)
                                <div class="carousel-item   {{ $gambar->id > 0 ? 'active' : '' }}"
                                    style="height: 200px">
                                    <img class="flex overflow-hidden bg-local"
                                        src="{{ asset('storage/' . $gambar->gambar) }}"
                                        alt="{{ config('app.name') }}}" />
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-lg font-semibold">{{ $kampus->nama }} <span
                                class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">{{ ucwords($kampus->kategori) }}</span>
                        </h5>
                        <div class="info-container">
                            <ul class="list-unstyled my-3 py-1 ">
                                <small class="card-text text-uppercase mb-3 flex">Profile</small>
                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">Alamat:</span>
                                    <span>{{ $kampus->alamat }}</span>
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">Akreditasi:</span>
                                    <span>{{ $kampus->akreditasi }}</span>
                                </li>

                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">website</span>
                                    <span><a href="{{ $kampus->website }}"
                                            class="underline underline-offset-1 font-sans text-blue-400">{{ $kampus->website }}</a></span>
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">Tentang:</span>
                                    <span class="overflo:hidden max-w-[900px]">{{ $kampus->tentang }}</span>
                                </li>
                                <small class="card-text text-uppercase mb-3 flex">Kontak</small>
                                @if ($kampus->Kontak)
                                    <li class="mb-3">
                                        <span class="fw-medium text-heading me-2">Email:</span>
                                        <span>{{ $kampus->kontak->email }}</span>
                                    </li>

                                    <li class="mb-3">
                                        <span class="fw-medium text-heading me-2">Telepon:</span>
                                        <span>{{ $kampus->kontak->telepon }}</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="fw-medium text-heading me-2">WhastApps:</span>
                                        <span>{{ $kampus->kontak->whatsapp }}</span>
                                    </li>
                                @else
                                    <li class="text-red-500">Kontak Tidak ada</li>
                                @endif
                            </ul>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.kampus.edit', $kampus->slug) }}"
                                    class="btn btn-primary me-3">Edit</a>
                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#delete-kampus{{ $kampus->slug }}"
                                    class="btn btn-outline-danger suspend-user">Delete</button>
                            </div>

                            {{-- delete modal kampus --}}
                            <div class="modal fade" id="delete-kampus{{ $kampus->slug }}" tabindex="-1"
                                aria-hidden="true" data-bs-backdrop="static">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modalCenterTitle">Hapus Kampus</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-4 mt-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <h4>Yakin Mau Hapus data kampus {{ $kampus->nama }} ? </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('admin.kampus.delete', ['kampus' => $kampus->slug]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <x-danger-button>
                                                    Hapus
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- end delete modal kampus --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card text-center mb-3">
                    <div class="card-header">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-tab-home" aria-controls="navs-tab-home"
                                    aria-selected="true">
                                    Fakultas
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="tab-pane fade show active" id="navs-tab-home" role="tabpanel">
                                <div class="row g-4">
                                    @forelse ($fakultases as $fakultas)
                                        <div class="col-xl-6 col-lg-7 col-md-6">
                                            <div class="card">
                                                <div class="card-header pb-2">
                                                    <div class="d-flex">
                                                        <div class="d-flex">
                                                            <div class="me-2">
                                                                <div class="client-info text-body">
                                                                    <p class="fw-medium uppercase">Fakultas
                                                                        {{ $fakultas->nama }}
                                                                        @if ($fakultas->status)
                                                                            <span
                                                                                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-700/10">Enable</span>
                                                                        @else
                                                                            <span
                                                                                class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-700/10">Disable</span>
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <div class="dropdown zindex-2">
                                                                <button type="button"
                                                                    class="btn dropdown-toggle hide-arrow p-0"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i
                                                                        class="mdi mdi-dots-vertical mdi-24px text-muted"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('admin.fakultas', $kampus->slug) }}">Edit</a>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="flex">
                                                        <span class="font-medium me-4">Daftar Jurusan : </span>
                                                        <ul>
                                                            @foreach ($fakultas->jurusan as $jurusan)
                                                                <li>
                                                                    - {{ ucwords($jurusan->nama) }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="inline-flex text-start mt-3">
                                                        <p>{{ $fakultas->tentang }}</p>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <ul
                                                                class="list-unstyled d-flex align-items-center avatar-group mb-0 zindex-2">
                                                                <li><small class="text-medium">280 Mahasiswa</small>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <a href="javascript:void(0);"
                                                                class="text-muted d-flex align-items-center"><i
                                                                    class="mdi mdi-message-outline mdi-24px me-2"></i>Lihat</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="flex justify-center uppercase text-red-500">
                                            Tidak ada fakultas
                                        </div>
                                    @endforelse
                                </div>

                                <div class="flex mt-5 justify-center">
                                    {{-- {{ $fakultases->links() }} --}}
                                </div>
                            </div>
                            <div class="flex justify-end me-3 mt-3">
                                <a href="{{ route('admin.kampus') }}"
                                    class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-md text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
