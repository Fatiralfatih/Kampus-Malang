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
                                    <a href="{{ route('admin.fakultas', $kampus->slug) }}"
                                        class="nav-link {{ Request::is('admin/fakultas/' . $kampus->slug) ? 'active' : '' }}">
                                        Edit Fakultas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.jurusan', $kampus->slug) }}" class="nav-link">
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
                                {{-- edit fakultas --}}
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="flex justify-between mb-2">
                                            <div>
                                                <h5 class="card-header text-md">Daftar Fakultas
                                                    {{ $kampus->nama }}</h5>
                                            </div>
                                            <div class="card-header col-sm text-end">
                                                <a href="{{ route('admin.fakultas.create', $kampus->slug) }}"
                                                    class="bg-sky-500 px-2 py-2 rounded-lg uppercase text-white hover:bg-sky-700">Tambah
                                                    Fakultas</a>
                                                <a href="{{ route('admin.fakultas.history', $kampus->slug) }}"
                                                    class="bg-slate-500 px-2 py-2 rounded-lg uppercase text-white hover:bg-sky-700">history
                                                    Fakultas</a>
                                            </div>
                                        </div>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nama Fakultas</th>
                                                        <th>Tentang</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @forelse ($kampus->Fakultas as $fakultas)
                                                        <tr>
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td>{{ ucwords($fakultas->nama) }}
                                                            </td>
                                                            <td class="truncate max-w-[200px]">
                                                                {{ $fakultas->tentang }}</td>
                                                            <td>
                                                                @if ($fakultas->status)
                                                                    <span
                                                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Enable
                                                                    </span>
                                                                @else
                                                                    <span
                                                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Disable</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                        class="btn p-0 dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('admin.fakultas.edit', $fakultas->slug) }}"><i
                                                                                class="mdi mdi-pencil-outline me-1"></i>
                                                                            Edit</a>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#delete-fakultas{{ $fakultas->slug }}"
                                                                            class="dropdown-item"><i
                                                                                class="mdi mdi-trash-can-outline me-1"></i>
                                                                            Delete</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        {{-- modal delete fakultas --}}
                                                        <div class="modal fade"
                                                            id="delete-fakultas{{ $fakultas->slug }}"
                                                            data-bs-backdrop="static" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="">
                                                                            Hapus fakultas
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
                                                                        action="{{ route('admin.fakultas.delete', $fakultas->slug) }}"
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
                                                        {{-- end delete modal fakultas --}}
                                                    @empty
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <p class="text-red-500 uppercase font-medium">Tidak
                                                                    ada data fakultas</p>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
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
