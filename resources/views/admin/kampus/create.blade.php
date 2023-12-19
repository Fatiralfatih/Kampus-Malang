<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xl">
                <div class="card mb-4">
                    <h5 class="card-header text-lg font-medium">Form Tambah Kampus</h5>
                    <form class="card-body" action="{{ route('admin.kampus.store') }}" method="POST">
                        @csrf
                        <h6 class="mb-3">1. Kampus</h6>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <x-form.input nama="namaKampus" placeholder="masukkan nama kampus">
                                    Nama Kampus
                                </x-form.input>
                                <x-input-error :messages="$errors->get('namaKampus')" class="mt-2" />
                            </div>
                            <div class="col-md-6">
                                <x-form.input nama="akreditasi" placeholder="masukkan akreditasi kampus">
                                    Akreditasi Kampus
                                </x-form.input>
                                <x-input-error :messages="$errors->get('akreditasi')" class="mt-2" />
                            </div>
                            <div class="col-md-6">
                                <x-form.input nama="alamat" type="address1" placeholder="masukkan alamat kampus">
                                    Alamat Kampus
                                </x-form.input>
                                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                            </div>

                            <div class="col-md-6">
                                <x-form.input nama="website" placeholder="masukkan website kampus">
                                    Website Kampus
                                </x-form.input>
                                <x-input-error :messages="$errors->get('website')" class="mt-2" />
                            </div>

                            <div class="col-md-6 mb-4">
                                <x-form.select nama="kategori">
                                    <option @selected(old('kateogri'))>{{ old('kategori') ?? 'Pilih Kategori' }}
                                    </option>
                                    <option value="politeknik">{{ ucwords('politeknik') }}</option>
                                    <option value="swasta">{{ ucwords('swasta') }}</option>
                                    <option value="negeri">{{ ucwords('negeri') }}</option>
                                    <option value="sekolah tinggi">{{ ucwords('sekolah tinggi') }}</option>
                                    <option value="insitut">{{ ucwords('insitut') }}</option>
                                </x-form.select>
                                <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                            </div>

                            <div class="col-md-6">
                                <x-form.textarea nama="tentangKampus" placeholder="masukkan tentang kampus">
                                    {{ old('tentangKampus') }}
                                </x-form.textarea>
                                <x-input-error :messages="$errors->get('tentangKampus')" class="mt-2" />
                            </div>
                        </div>
                        <h6 class="mb-3">2. Fakultas</h6>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <x-form.input nama="namaFakultas" placeholder="masukkan nama fakultas">
                                    Nama Fakultas
                                </x-form.input>
                                <x-input-error :messages="$errors->get('namaFakultas')" class="mt-2" />
                            </div>
                            {{-- jurusan --}}
                            {{-- <div class="col-md-6">
                                <x-form.input nama="namaJurusan" placeholder="masukkan nama Jurusan kampus">
                                    Nama Jurusan
                                </x-form.input>
                                <x-input-error :messages="$errors->get('namaJurusan')" class="mt-2" />
                            </div> --}}
                            <div class="col-md-6">
                                <x-form.textarea nama="tentangFakultas" placeholder="masukkan tentang fakultas">
                                    {{ old('tentangFakultas') }}
                                </x-form.textarea>
                                <x-input-error :messages="$errors->get('tentangFakultas')" class="mt-2" />
                            </div>

                            <div class="col-md-6 space-x-1">
                                <div>
                                    <label class="form-check-label font-medium ms-1">Status Fakultas</label>
                                    <div class="form-check form-check-inline">
                                        <input name="statusFakultas"
                                            class="form-check-input @error('statusFakultas') border-rose-500 @enderror "
                                            type="radio" value="1" id="status-fakultas1" checked />
                                        <label class="form-check-label" for="status-fakultas1">Enable</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input name="statusFakultas"
                                            class="form-check-input @error('statusFakultas') border-rose-500 @enderror"
                                            type="radio" value="0" id="status-fakultas0" />
                                        <label class="form-check-label" for="status-fakultas0">Disable</label>
                                    </div>
                                    <x-input-error :messages="$errors->get('statusFakultas')" class="mt-2" />
                                </div>
                            </div>
                            <h6>3. Kontak</h6>
                            <div class="col-md-6">
                                <x-form.input nama="email" type="email" placeholder="masukkan Email kampus">
                                    Email
                                </x-form.input>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="col-md-6">
                                <x-form.input nama="telepon" type="text" placeholder="masukkan telepon kampus">
                                    Telepon
                                </x-form.input>
                                <x-input-error :messages="$errors->get('telepon')" class="mt-2" />
                            </div>

                            <div class="col-md-6">
                                <x-form.input nama="whatsapp" type="text" placeholder="masukkan whatapps kampus">
                                    Whatapps
                                </x-form.input>
                                <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />
                            </div>

                            <div class="pt-4 space-x-4">
                                <a href="{{ route('admin.kampus') }}"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
                                <x-primary-button>
                                    Simpan
                                </x-primary-button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
