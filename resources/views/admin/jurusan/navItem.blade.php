<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="nav-align-left">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="{{ route('admin.kampus.edit', $kampus->slug) }}" class="nav-link">
                                        Edit Kampus
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.fakultas', $kampus->slug) }}" class="nav-link">
                                        Edit Fakultas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.jurusan', $kampus->slug) }}"
                                        class="nav-link {{ Request::is('admin/jurusan/' . $kampus->slug) ? 'active' : '' }} ">
                                        Edit Jurusan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.gambar', $kampus->slug) }}" class="nav-link">
                                        Edit Gambar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.kontak', $kampus->slug) }}" class="nav-link">
                                        Edit Kontak
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.kampus') }}"
                                        class="inline-flex ms-3 items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kembali</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                {{-- edit jurusan --}}
                                <div class="col-sm">
                                    <div class="card col-sm-12">
                                        <div class="flex justify-between mb-2">
                                            <div>
                                                <h5 class="card-header text-xl">Daftar Jurusan
                                                    {{ $kampus->nama }} </h5>
                                            </div>
                                            <div class="card-header col-sm text-end">
                                                <a href="{{ route('admin.jurusan.create', ['kampus' => $kampus->slug]) }}"
                                                    class="bg-sky-500 px-2 py-2 rounded-lg uppercase text-white hover:bg-sky-700">Tambah
                                                    Jurusan</a>
                                                <a href="{{ route('admin.jurusan.history', $kampus->slug) }}"
                                                    class="bg-slate-500 px-2 py-2 rounded-lg uppercase text-white hover:bg-sky-700">history
                                                    Jurusan</a>
                                            </div>
                                        </div>
                                        <div class="row col-md-12 ms-0 mb-6">
                                            @forelse ($jurusans as $jurusan)
                                                <div class="col-xl-6 col-lg-7 col-md-6 mb-4">
                                                    <div class="card">
                                                        <div class="card-header pb-2">
                                                            <div class="d-flex">
                                                                <div class="d-flex">
                                                                    <div class="me-2">
                                                                        <div class="client-info text-body">
                                                                            <p class="fw-medium uppercase">
                                                                                {{ $jurusan->nama }}
                                                                                @if ($jurusan->status)
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
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="mdi mdi-dots-vertical mdi-24px text-muted"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                                            <li><a class="dropdown-item"
                                                                                    href="{{ route('admin.jurusan.edit', $jurusan->slug) }}">Edit
                                                                                    Jurusan</a>
                                                                            </li>
                                                                            <li>
                                                                                <hr class="dropdown-divider" />
                                                                            </li>
                                                                            <li>
                                                                                <button type="button"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#delete-jurusan{{ $jurusan->slug }}"
                                                                                    class="dropdown-item text-danger"><i
                                                                                        class="mdi mdi-trash-can-outline me-1"></i>
                                                                                    Delete</button>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- modal delete jurusan --}}
                                                            <div class="modal fade"
                                                                id="delete-jurusan{{ $jurusan->slug }}"
                                                                data-bs-backdrop="static" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="">
                                                                                Hapus jurusan {{ $jurusan->nama }}
                                                                            </h4>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col mb-4 mt-2">
                                                                                    <div>
                                                                                        <p>Yakin Mau Hapus??</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <form
                                                                            action="{{ route('admin.jurusan.delete', $jurusan->slug) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-dismiss="modal">
                                                                                    Close
                                                                                </button>
                                                                                <x-danger-button>
                                                                                    delete
                                                                                </x-danger-button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- end modal --}}

                                                            <div class="mt-3">
                                                                <h3>
                                                                    Fakultas {{ ucwords($jurusan->fakultas->nama) }}
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">

                                                            <h5 class="font-light me-2">Daftar Pembayaran <a
                                                                    href="{{ route('admin.jurusan.pembayaran.create', $jurusan->slug) }}"
                                                                    class="underline underline-offset-1 text-blue-500">Tambah
                                                                    Pembayaran</a>
                                                            </h5>
                                                            <div class="mt-3">
                                                                @forelse ($jurusan->pembayaran as $pembayaran)
                                                                    <ul>
                                                                        <li>
                                                                            {{ $loop->iteration }}.
                                                                            {{ $pembayaran->kategori }}
                                                                            <span class="font-medium">
                                                                                (Rp.{{ number_format($pembayaran->biaya) }})
                                                                            </span>
                                                                            <div class="inline-flex ">
                                                                                <button type="button"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#edit-pembayaran{{ $pembayaran->biaya }}"
                                                                                    class="text-blue-500 me-2">
                                                                                    Edit</button>
                                                                                <button type="button"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#delete-pembayaran{{ $pembayaran->biaya }}"
                                                                                    class="text-red-500 me-2">
                                                                                    Hapus</button>
                                                                        </li>
                                                                    </ul>

                                                                    {{-- modal edit pembayaran --}}
                                                                    <div class="modal fade"
                                                                        id="edit-pembayaran{{ $pembayaran->biaya }}"
                                                                        tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title"
                                                                                        id="exampleModalLabel1">Edit
                                                                                        Pembayaran</h4>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <form
                                                                                    action="{{ route('admin.jurusan.pembayaran.update', $pembayaran->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <div class="modal-body">
                                                                                        <div class="row">
                                                                                            <div class="col mb-4 mt-2">
                                                                                                <x-form.input
                                                                                                    nama="kategori"
                                                                                                    placeholder="Masukkan Kategori Pembayaran"
                                                                                                    :value="old(
                                                                                                        'kategori',
                                                                                                        $pembayaran->kategori,
                                                                                                    )">
                                                                                                    Kategori Pembayaran
                                                                                                </x-form.input>
                                                                                                <x-input-error
                                                                                                    :messages="$errors->get(
                                                                                                        'kategori',
                                                                                                    )" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row g-2">
                                                                                            <div class="col mb-2">
                                                                                                <x-form.input
                                                                                                    nama="biaya"
                                                                                                    type="number"
                                                                                                    placeholder="Masukkan Biaya"
                                                                                                    :value="old(
                                                                                                        'biaya',
                                                                                                        $pembayaran->biaya,
                                                                                                    )">
                                                                                                    Biaya
                                                                                                </x-form.input>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-secondary"
                                                                                            data-bs-dismiss="modal">
                                                                                            Close
                                                                                        </button>
                                                                                        <x-primary-button>
                                                                                            Update
                                                                                        </x-primary-button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- end modal --}}

                                                                    {{-- modal delete pembayaran --}}
                                                                    <div class="modal fade"
                                                                        id="delete-pembayaran{{ $pembayaran->biaya }}"
                                                                        data-bs-backdrop="static" tabindex="-1">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title"
                                                                                        id="">
                                                                                        Hapus
                                                                                        {{ $pembayaran->kategori }}
                                                                                    </h4>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col mb-4 mt-2">
                                                                                            <div>
                                                                                                <p>Yakin Mau Hapus??</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <form
                                                                                    action="{{ route('admin.jurusan.pembayaran.delete', $pembayaran->id) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-secondary"
                                                                                            data-bs-dismiss="modal">
                                                                                            Close
                                                                                        </button>
                                                                                        <x-danger-button>
                                                                                            delete
                                                                                        </x-danger-button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- end modal --}}
                                                                @empty
                                                                    <span
                                                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Tidak
                                                                        Ada Pembayaran
                                                                        <a href="{{ route('admin.jurusan.pembayaran.create', $jurusan->slug) }}"
                                                                            class="underline underline-offset-1 ms-2 text-blue-500">Tambah?</a></span>
                                                                @endforelse
                                                            </div>

                                                            <h5 class="font-light mt-3">
                                                                Daftar Jadwal <a
                                                                    href="{{ route('admin.jurusan.pelaksanaan.create', $jurusan->slug) }}"
                                                                    class="underline underline-offset-1 text-blue-500">Tambah
                                                                    Jadwal</a>
                                                            </h5>
                                                            <div class="mt-3">
                                                                @forelse ($jurusan->pelaksanaan as $pelaksanaan)
                                                                <ul>
                                                                    <li>
                                                                        {{ $loop->iteration }}.
                                                                            {{ $pelaksanaan->nama }}:
                                                                            <span class="font-medium">Tanggal
                                                                                {{ date('d-m-Y', strtotime($pelaksanaan->jadwal)) }}</span>
                                                                        <div class="inline-flex space-x-3">
                                                                            <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#edit-pelaksanaan{{ $pelaksanaan->id }}"
                                                                                class="dropdown-item text-blue-500">
                                                                                Edit</button>
                                                                            <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#hapus-pelaksanaan{{ $pelaksanaan->id }}"
                                                                                class="dropdown-item text-red-500">
                                                                                Hapus</button>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                    
                                                                    

                                                                    {{-- modal edit pembayaran --}}
                                                                    <div class="modal fade"
                                                                        id="edit-pelaksanaan{{ $pelaksanaan->id }}"
                                                                        tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title"
                                                                                        id="exampleModalLabel1">Edit
                                                                                        Pelaksanaan</h4>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <form
                                                                                    action="{{ route('admin.jurusan.pelaksanaan.update', $pelaksanaan->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <div class="modal-body">
                                                                                        <div class="row">
                                                                                            <div class="col mb-4 mt-2">
                                                                                                <x-form.input
                                                                                                    nama="nama"
                                                                                                    placeholder="Masukkan nama jadwal"
                                                                                                    :value="old(
                                                                                                        'nama',
                                                                                                        $pelaksanaan->nama,
                                                                                                    )">
                                                                                                    nama jadwal
                                                                                                </x-form.input>
                                                                                                <x-input-error
                                                                                                    :messages="$errors->get(
                                                                                                        'nama',
                                                                                                    )" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 mt-4">
                                                                                            <div
                                                                                                class="form-floating form-floating-outline">
                                                                                                <input type="text"
                                                                                                    name="jadwal"
                                                                                                    class="form-control"
                                                                                                    placeholder="YYYY-MM-DD"
                                                                                                    id="flatpickr-date"
                                                                                                    value="{{ old('jadwal', date($pelaksanaan->jadwal)) }}" />
                                                                                                <label
                                                                                                    for="flatpickr-date">Jadwal
                                                                                                    Pelaksanaan</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <x-input-error :messages="$errors->get(
                                                                                            'jadwal',
                                                                                        )"
                                                                                            class="mt-2" />
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-secondary"
                                                                                            data-bs-dismiss="modal">
                                                                                            Close
                                                                                        </button>
                                                                                        <x-primary-button>
                                                                                            Update
                                                                                        </x-primary-button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- end modal --}}

                                                                    {{-- modal delete pembayaran --}}
                                                                    <div class="modal fade"
                                                                        id="hapus-pelaksanaan{{ $pelaksanaan->id }}"
                                                                        data-bs-backdrop="static" tabindex="-1">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title"
                                                                                        id="">
                                                                                        Hapus Jadwal
                                                                                        {{ $pelaksanaan->nama }}
                                                                                    </h4>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col mb-4 mt-2">
                                                                                            <div>
                                                                                                <p>Yakin Mau Hapus??</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <form
                                                                                    action="{{ route('admin.jurusan.pelaksanaan.delete', $pelaksanaan->id) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-secondary"
                                                                                            data-bs-dismiss="modal">
                                                                                            Close
                                                                                        </button>
                                                                                        <x-danger-button>
                                                                                            delete
                                                                                        </x-danger-button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- end modal --}}
                                                                @empty
                                                                    <span
                                                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Tidak
                                                                        Ada jadwal</span>
                                                                    <a href="{{ route('admin.jurusan.pelaksanaan.create', $jurusan->slug) }}"
                                                                        class="underline underline-offset-1 ms-2 text-blue-500">Tambah?</a></span>
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                            <p class="text-red-500 uppercase flex justify-center">tidak ada jurusan</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                {{-- end --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>
