<x-admin-layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Form with Tabs -->
            <div class="row">
                <!-- FormValidation -->
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header text-lg font-medium uppercase">Tambah Fakultas Kampus {{ $kampus->nama }}
                        </h5>
                        <div class="card-body">
                            <form action="{{ route('admin.fakultas.store', ['kampus' => $kampus->slug]) }}" method="POST"
                                class="row g-3">
                                @csrf
                                <!-- Account Details -->
                                <div class="col-12">
                                    <h6>Fakultas</h6>
                                    <hr class="mt-0" />
                                </div>
                                <input type="hidden" name="kampusSlug" value="{{ $kampus->slug }}">
                                <div class="col-md-8">
                                    <div class="form-floating form-floating-outline">
                                        <x-form.input nama="namaFakultas" placeholder="Masukkan Nama Fakultas">
                                            Nama Fakultas
                                        </x-form.input>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('namaFakultas')" class="mt-2" />
                                <div class="col-md-8">
                                    <div class="form-floating form-floating-outline">
                                        <textarea class="form-control h-px-100 @error('tentang') border-red-500 @enderror" id="tentang" name="tentangFakultas"
                                            placeholder="Masukkan Tentang" rows="3">{{ old('tentangFakultas') }}</textarea>
                                        <label for="tentang">Tentang</label>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('tentangFakultas')" class="mt-2" />
                                <div class="col-md-6">
                                    <label class="mb-3">Status Fakultas</label>
                                    <div class="form-check">
                                        <input name="statusFakultas"
                                            class="form-check-input @error('statusFakultas') border-red-500 @enderror"
                                            type="radio" value="1" id="status1" checked required />
                                        <label class="form-check-label" for="status1"> Enable </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="statusFakultas"
                                            class="form-check-input @error('statusFakultas') border-red-500 @enderror"
                                            type="radio" value="0" id="status0" required />
                                        <label class="form-check-label" for="status0"> Disable </label>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('statusFakultas')" class="mt-2 mb-2" />

                                <div class="col-12">
                                    <a href="{{ route('admin.fakultas', $kampus->slug) }}"
                                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'">Cancel</a>
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                        data-bs-toggle="modal" data-bs-target="#next-fakultas{{ $kampus->slug }}">
                                        Simpan
                                    </button>
                                </div>
                                {{-- next modal kampus --}}
                                {{-- <div class="modal fade" id="next-fakultas{{ $kampus->slug }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modalCenterTitle">Tambah Jurusan </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-4 mt-2">
                                                        <div class="form-floating form-floating-outline">
                                                            <h4>Tambah Jurusan?</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Tidak</button>
                                                <a href="{{ route('admin.jurusan.create', $kampus->slug) }}"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Iya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- end modal kampus --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



</x-admin-layout>
