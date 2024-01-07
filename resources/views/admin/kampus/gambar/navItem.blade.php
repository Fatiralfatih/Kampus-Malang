<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="nav-align-left">
                            <ul class="nav nav-tabs" role="tablist">
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
                                    <a href="{{ route('admin.jurusan', $kampus->slug) }}" class="nav-link">
                                        Edit Jurusan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.gambar', $kampus->slug) }}"
                                        class="nav-link {{ Request::is('admin/gambar/' . $kampus->slug) ? 'active' : '' }}">
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
                                        class="inline-flex ms-3 items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kembali
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                {{-- edit gambar kampus --}}
                                <div class="col-2xl">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0 uppercase text-lg">Edit Gambar Kampus
                                                {{ $kampus->nama }} </h5>
                                            <div class="flex justify-beetween space-x-3">
                                                <div>
                                                    <a href="{{ route('admin.history.gambar.kampus', $kampus->slug) }}"
                                                        class="inline-flex items-center px-7 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                        history Gambar
                                                    </a>
                                                </div>
                                                <div>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#tambah-gambar{{ $kampus->id }}"
                                                        class="inline-flex items-center px-7 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                        Tambah Gambar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row gy-5">
                                                @forelse ($kampus->gambar as $gambar)
                                                    <div class="col-sm-6 col-lg-4">
                                                        <div class="card p-2 shadow-none border">
                                                            <div class="rounded-2 text-center">
                                                                <div>
                                                                    <img class="img-fluid"
                                                                        src="{{ asset('storage/' . $gambar->gambar) }}"
                                                                        alt="{{ config('app.name') }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4 space-y-2">
                                                            <form
                                                                action="{{ route('admin.gambar.thumbnail', $kampus->slug) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="thumbnail_id"
                                                                    value="{{ $gambar->id }}">
                                                                <x-primary-button>
                                                                    Jadikan Thumbnail kalo mau
                                                                </x-primary-button>
                                                            </form>
                                                            <button type="button" data-bs-toggle="modal"
                                                                data-bs-target="#edit-gambar{{ $gambar->id }}"
                                                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Edit</button>
                                                            <button type="button"
                                                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete-gambar{{ $gambar->id }}">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                    {{-- modal edit gambar --}}
                                                    <div class="modal fade" id="edit-gambar{{ $gambar->id }}"
                                                        data-bs-backdrop="static" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="">
                                                                        Edit Gambar
                                                                    </h4>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.update.gambar.kampus', [$gambar->id]) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="row">
                                                                            <div class="col mb-4 mt-2">
                                                                                <input type="file" name="gambar">
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">
                                                                                Close
                                                                            </button>
                                                                            <x-primary-button>
                                                                                Edit
                                                                            </x-primary-button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end modal --}}
                                                    {{-- modal delete gambar --}}
                                                    <div class="modal fade" id="delete-gambar{{ $gambar->id }}"
                                                        data-bs-backdrop="static" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="">
                                                                        Hapus Gambar
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
                                                                    action="{{ route('admin.delete.gambar.kampus', $gambar->id) }}"
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
                                                    {{-- end delete modal gambar --}}
                                                @empty
                                                    <p class="text-red-500 uppercase ">tidak ada gambar</p>
                                                @endforelse
                                            </div>
                                            {{-- modal tambah gambar kampus --}}
                                            <div class="modal fade" id="tambah-gambar{{ $kampus->id }}"
                                                data-bs-backdrop="static" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="">
                                                                Tambah Gambar
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('admin.tambah.gambar.kampus', $kampus->slug) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                    <input type="file" name="gambar" required>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <x-primary-button>
                                                                        Tambah
                                                                    </x-primary-button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end modal --}}
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
</x-admin-layout>
