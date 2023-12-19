<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td> {{ $user->nama }} </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    @if ($user->status)
                                        <span
                                            class="inline-flex items-center rounded-md bg-green-50 px-4 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Aktif</span>
                                    @else
                                        <span
                                            class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Tidak
                                            Aktif</span>
                                    @endif

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#aktif{{ $user->id }}">Aktif</button>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#nonAktif{{ $user->id }}">Nonaktif</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal aktif -->
                            <div class="modal fade" id="aktif{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Mengaktifkan Member {{ ucwords($user->nama) }}?
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.member.aktif', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <input type="hidden" name="status" value="1">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                                                    data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <x-primary-button>
                                                    Aktifkan
                                                </x-primary-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- end modal aktif --}}
                            <!-- Modal aktif -->
                            <div class="modal fade" id="nonAktif{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Nonaktifkan Member {{ ucwords($user->nama) }}?
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.member.nonaktif', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <input type="hidden" name="status" value="0">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                                                    data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <x-primary-button>
                                                    Aktifkan
                                                </x-primary-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- end modal aktif --}}
                        @empty
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-red-500 uppercase font-semibold">Tidak ada member</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
