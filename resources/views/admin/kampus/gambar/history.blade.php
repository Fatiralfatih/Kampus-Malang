<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-2xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 uppercase text-lg">History Gambar Kampus {{ $kampus->nama }}
                    </h5>

                </div>
                <div class="card-body">
                    <div class="row gy-5">
                        @forelse ($gambars as $gambar)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 shadow-none border">
                                    <div class="rounded-2 text-center">
                                        <div>
                                            <img class="img-fluid" src="{{ asset('storage/' . $gambar->gambar) }}"
                                                alt="{{ config('app.name') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#restore-gambar{{ $gambar->id }}"
                                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">restore</button>
                                    <button type="button"
                                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                        data-bs-toggle="modal" data-bs-target="#delete-permanen-gambar{{ $gambar->id }}">
                                        delete permanen
                                    </button>
                                </div>
                            </div>
                            {{-- modal restore gambar --}}
                            <div class="modal fade" id="restore-gambar{{ $gambar->id }}" data-bs-backdrop="static"
                                tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="">
                                                Restore Gambar
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.restore.gambar.kampus', [$gambar->id]) }}"
                                                method="post" enctype="multipart/form-data">
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
                            </div>
                            {{-- end modal --}}
                            {{-- modal delete-permanen gambar --}}
                            <div class="modal fade" id="delete-permanen-gambar{{ $gambar->id }}" data-bs-backdrop="static"
                                tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="">
                                                Hapus Gambar
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
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
                                        <form action="{{ route('admin.delete.permanen.gambar.kampus', $gambar->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
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
                            <div>
                                <p class="text-red-500 mb-4">
                                    {{ ucwords('tidak ada history gambar') }}
                                </p>
                            </div>
                        @endforelse
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('admin.gambar', $kampus->slug) }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
