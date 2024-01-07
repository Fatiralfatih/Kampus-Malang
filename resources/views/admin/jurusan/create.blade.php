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
                        <h5 class="card-header text-lg font-medium uppercase">Form Tambah Jurusan Kampus
                            {{ $kampus->nama }}
                        </h5>
                        <div class="card-body">
                            <form action="{{ route('admin.jurusan.store', $kampus->slug) }}" method="POST"
                                class="row g-3">
                                @csrf
                                <!-- Account Details -->
                                <div class="col-12">
                                    <h6>Jurusan</h6>
                                    <hr class="mt-0" />
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group input-group-merge">
                                        <x-form.input nama="nama" placeholder="Masukkan Nama Jurusan">
                                            Nama Jurusan
                                        </x-form.input>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                                <div class="col-md-8">
                                    <div class="form-floating form-floating-outline">
                                        <select class="form-select @error('fakultasSlug') border-rose-500 @enderror "
                                            id="pilih-fakultas" name="fakultasSlug" required>
                                            <option selected disabled>Pilih Fakultas</option>
                                            @foreach ($kampus->Fakultas as $fakultas)
                                                <option value="{{ $fakultas->slug }}"> {{ $fakultas->nama }} </option>
                                            @endforeach
                                        </select>
                                        <label for="pilih-fakultas">Fakultas</label>
                                    </div>
                                    <x-input-error :messages="$errors->get('fakultasSlug')" class="mt-2" />
                                </div>

                                <div class="col-md-8">
                                    <label class="mb-3">Status Jurusan</label>
                                    <div class="form-check">
                                        <input name="statusJurusan"
                                            class="form-check-input @error('statusJurusan') border-rose-500 @enderror"
                                            type="radio" value="1" id="status1" checked required />
                                        <label class="form-check-label" for="status1"> Enable </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="statusJurusan"
                                            class="form-check-input @error('statusJurusan') border-rose-500 @enderror"
                                            type="radio" value="0" id="status0" required />
                                        <label class="form-check-label" for="status0"> Disable </label>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('statusJurusan')" class="mt-2" />

                                <div class="col-12">
                                    <a href="{{ route('admin.jurusan', [$kampus->slug]) }}"
                                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'">Cancel</a>
                                    <x-primary-button>
                                        Save
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-admin-layout>
