<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header text-lg font-semibold ">Daftar Mahasiswa</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mahasiswa</th>
                            <th>Kampus</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($jurusans as $jurusan)
                            @foreach ($jurusan->pendaftaran as $pendaftaran)
                                <tr>
                                    <td>
                                        {{ $pendaftaran->nama }}
                                    </td>
                                    <td>{{ $jurusan->fakultas->Kampus->nama }}</td>
                                    <td>
                                        {{ $jurusan->fakultas->nama }}
                                    </td>
                                    <td> {{ $jurusan->nama }} </td>
                                    <td>
                                        @if ($pendaftaran->pivot->status == 'disetujui')
                                            <span
                                                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Diterima</span>
                                        @elseif ($pendaftaran->pivot->status == 'pending')
                                            <span
                                                class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Pending</span>
                                        @else
                                            <span
                                                class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <button type="button"
                                                    class="dropdown-item text-black text-sm opacity-80 hover:bg-slate-100 "
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#terima-mahasiswa{{ $pendaftaran->pivot->id }}">
                                                    <i class="mdi mdi-check-circle me-1"></i>
                                                    Terima
                                                </button>
                                                <button type="button"
                                                    class="dropdown-item text-black text-sm opacity-80 hover:bg-slate-100 "
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#tolak-mahasiswa{{ $pendaftaran->pivot->id }}">
                                                    <i class="mdi mdi-alert-circle me-1"></i>
                                                    Tolak
                                                </button>
                                            </div>
                                        </div>
                                        {{-- terima --}}
                                        <div class="modal fade" id="terima-mahasiswa{{ $pendaftaran->pivot->id }}"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="modalCenterTitle">Terima Mahasiswa
                                                            {{ $pendaftaran->nama }}
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.mahasiswa.terima', ['id' => $pendaftaran->pivot->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <input type="hidden" name="status" value="disetujui">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <x-primary-button>
                                                                Terima
                                                            </x-primary-button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end modal terima --}}
                                        {{-- tolak --}}
                                        <div class="modal fade" id="tolak-mahasiswa{{ $pendaftaran->pivot->id }}"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="modalCenterTitle">tolak Mahasiswa
                                                            {{ $pendaftaran->nama }}
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.mahasiswa.tolak', ['id' => $pendaftaran->pivot->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <input type="hidden" name="status" value="ditolak">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <x-primary-button>
                                                                Terima
                                                            </x-primary-button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end modal tolak --}}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
