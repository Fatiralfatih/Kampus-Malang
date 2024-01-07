<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="flex justify-start mb-3">
                <div>
                    <h5 class="card-header">History Fakultas</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap space-y-6">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>Id</th>
                            <th>Nama Fakultas</th>
                            <th>Tentang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fakultases as $fakultas)
                            <tr class="text-center">
                                <td>
                                    <span class="fw-medium"> {{ $loop->iteration }} </span>
                                </td>
                                <td>
                                    {{ $fakultas->nama }}
                                </td>
                                <td class="truncate max-w-[200px]">{{ $fakultas->tentang }}</td>
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
                                <td class="flex justify-center">
                                    <div class="flex space-x-3">
                                        <button type="button"
                                            class="bg-sky-500 px-3 py-2 text-white rounded-xl hover:bg-sky-700"
                                            data-bs-toggle="modal"
                                            data-bs-target="#restore-fakultas{{ $fakultas->slug }}">
                                            Restore
                                        </button>
                                        <button type="button"
                                            class="bg-red-500 px-3 py-2 text-white rounded-xl hover:bg-red-700"
                                            data-bs-toggle="modal"
                                            data-bs-target="#delete-permanen-fakultas{{ $fakultas->slug }}">
                                            Delete Permanen
                                        </button>
                                    </div>
                                </td>

                                {{-- restore modal fakultas --}}
                                <div class="modal fade" id="restore-fakultas{{ $fakultas->slug }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Restore fakultas
                                                    {{ $fakultas->nama }}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-4 mt-2">
                                                        <div class="form-floating form-floating-outline">
                                                            <h4>Yakin Mau Restore data fakultas {{ $fakultas->nama }}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route('admin.fakultas.restore', [$fakultas->slug]) }}"
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
                                {{-- end restore modal fakultas --}}

                                {{-- delete permanen modal fakultas --}}
                                <div class="modal fade" id="delete-permanen-fakultas{{ $fakultas->slug }}"
                                    tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Hapus Permanen fakultas
                                                    {{ $fakultas->nama }} </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-4 mt-2">
                                                        <div class="form-floating form-floating-outline">
                                                            <h4>Yakin Mau Hapus data fakultas {{ $fakultas->nama }}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form
                                                action="{{ route('admin.fakultas.delete.permanen', [$fakultas->slug]) }}"
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
                                {{-- end delete permanen modal fakultas --}}
                            </tr>
                        @empty
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <p class="flex justify-center items-center text-red-500 uppercase">Tidak ada history
                                        Fakultas</p>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
                <div class="flex justify-end me-5">
                    <div class="flex justify-end">
                        <a href="{{ route('admin.fakultas', $kampus->slug) }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-admin-layout>
