<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="flex justify-between mb-3">
                <div>
                    <h5 class="card-header text-2xl">Daftar Kampus</h5>
                    <div class="flex ms-4 mt-3 justify-between">
                        <input type="search" placeholder="Cari Kampus" class="form-control me-2 " style="display: block" />
                        <button type="submit"><i
                                class="mdi mdi-magnify bg-blue-500 text-white px-3 py-2 rounded-xl text-lg"></i></button>
                    </div>
                    <p class="ms-4 text-sm">total ada {{ $kampuses->count() }} kampus </p>
                </div>
                <div class="card-header">
                    <a href="{{ route('admin.kampus.create') }}" class="btn btn-primary"><i
                            class="mdi mdi-domain-plus me-1"></i>Tambah Kampus</a>
                    <a href="{{ route('admin.kampus.history') }}" class="btn btn-secondary"><i
                            class="mdi mdi-history me-1"></i>history kampus</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap space-y-6">
                <table class="table">
                    <thead>
                        <tr class="text-start">
                            <th>Id</th>
                            <th>Nama Kampus</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kampuses as $kampus)
                            <tr>
                                <td>
                                    <span class="fw-medium"> {{ $loop->iteration }} </span>
                                </td>
                                <td>{{ $kampus->nama }}</td>
                                <td class="text-start">
                                    @if ($kampus->fakultas_count)
                                        {{ $kampus->fakultas_count }}
                                    @else
                                        <span
                                            class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600">Tidak
                                            Ada Fakultas</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($kampus->jurusan_count)
                                        {{ $kampus->jurusan_count }}
                                    @else
                                        <span
                                            class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600">Tidak
                                            Ada Jurusan</span>
                                    @endif
                                </td>
                                <td class="truncate max-w-[200px]">{{ $kampus->alamat }}</td>
                                <td>{{ ucwords($kampus->kategori) }}</td>
                                <td>
                                    <div class="flex space-x-3 justify-center">
                                        {{-- <a href="{{ route('admin.kampus.show', $kampus->slug) }}"
                                            class="bg-gray-500 px-3 py-2 text-white rounded-xl hover:bg-gray-700"><i
                                                class="mdi mdi-eye-outline me-1"></i>Show</a> --}}
                                        <a href="{{ route('admin.kampus.edit', $kampus->slug) }}"
                                            class="bg-sky-500 px-3 py-2 text-white rounded-xl hover:bg-sky-700"><i
                                                class="mdi mdi-pencil-outline me-1"></i>Edit</a>
                                        <button type="button"
                                            class="bg-red-500 px-3 py-2 text-white rounded-xl hover:bg-red-700"
                                            data-bs-toggle="modal" data-bs-target="#delete-kampus{{ $kampus->slug }}">
                                            <i class="mdi mdi-trash-can-outline me-1"></i>
                                            Delete
                                        </button>
                                    </div>
                                </td>
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
                                            <form action="{{ route('admin.kampus.delete', $kampus->slug) }}"
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
                            </tr>
                        @empty
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p class="text-red-500 uppercase font-medium">Tidak ada data kampus</p>
                                </td>
                                <td></td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>

        </div>
        <div class="flex justify-center mb-4">
            {{ $kampuses->links() }}
        </div>
    </div>
</x-admin-layout>
