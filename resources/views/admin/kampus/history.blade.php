<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="flex justify-start mb-3">
                <div>
                    <h5 class="card-header">History Kampus</h5>
                </div>

            </div>
            <div class="table-responsive text-nowrap space-y-6">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>Id</th>
                            <th>Nama Kampus</th>
                            <th>Website</th>
                            <th>Alamat</th>
                            <th>Tentang</th>
                            <th>Akreditasi</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kampuses as $kampus)
                            <tr class="text-center">
                                <td>
                                    <span class="fw-medium"> {{ $loop->iteration }} </span>
                                </td>
                                <td data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Dihapus {{ $kampus->deleted_at->diffForHumans() }}">{{ $kampus->nama }}</td>
                                <td>
                                    {{ $kampus->website }}
                                </td>
                                <td class="truncate max-w-[200px]">{{ $kampus->alamat }}</td>
                                <td class="truncate max-w-[200px]">{{ $kampus->tentang }}</td>
                                <td>{{ $kampus->akreditasi }}</td>
                                <td>{{ ucwords($kampus->kategori) }}</td>
                                <td>
                                    <div class="flex space-x-3">
                                        <button type="button"
                                            class="bg-sky-500 px-3 py-2 text-white rounded-xl hover:bg-sky-700"
                                            data-bs-toggle="modal" data-bs-target="#restore-kampus{{ $kampus->slug }}">
                                            Restore
                                        </button>
                                        <button type="button"
                                            class="bg-red-500 px-3 py-2 text-white rounded-xl hover:bg-red-700"
                                            data-bs-toggle="modal"
                                            data-bs-target="#delete-permanen-kampus{{ $kampus->slug }}">
                                            Delete Permanen
                                        </button>
                                    </div>
                                </td>

                                {{-- restore modal kampus --}}
                                <div class="modal fade" id="restore-kampus{{ $kampus->slug }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Restore Kampus
                                                    {{ $kampus->nama }}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-4 mt-2">
                                                        <div class="form-floating form-floating-outline">
                                                            <h4>Yakin Mau Restore data kampus {{ $kampus->nama }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route('admin.kampus.restore', [$kampus->id]) }}"
                                                method="post">
                                                @csrf
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <x-primary-button>
                                                        Restore
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- end restore modal kampus --}}

                                {{-- delete permanen modal kampus --}}
                                <div class="modal fade" id="delete-permanen-kampus{{ $kampus->slug }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Hapus Permanen Kampus
                                                    {{ $kampus->nama }} </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-4 mt-2">
                                                        <div class="form-floating form-floating-outline">
                                                            <h4>Yakin Mau Hapus data kampus {{ $kampus->nama }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route('admin.kampus.delete.permanen', [$kampus->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <x-danger-button>
                                                        Delete Permanent
                                                    </x-danger-button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- end delete permanen modal kampus --}}
                            </tr>
                        @empty
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> <p class="flex justify-center items-center text-red-500 uppercase">Tidak ada history
                                kampus</p></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                           
                        @endforelse
                    </tbody>
                </table>
                <div class="flex w-full justify-end me-5 mt-4">
                    <a href="{{ route('admin.kampus') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="flex justify-center mb-4">
                    {{ $kampuses->links() }}
                </div>
            </div>


        </div>
    </div>
</x-admin-layout>
