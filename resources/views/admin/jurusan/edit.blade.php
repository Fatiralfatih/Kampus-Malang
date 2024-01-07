<x-admin-layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl">
                <div class="card mb-2">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-lg">Edit Jurusan {{ ucwords($jurusan->nama) }} Fakultas
                            {{ $jurusan->fakultas->nama }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.jurusan.update', $jurusan->slug) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-5">
                                <div class="col-md-8">
                                    <div class="input-group input-group-merge">
                                        <x-form.input nama="namaJurusan" placeholder="Masukkan Nama Jurusan"
                                            :value="old('nama', $jurusan->nama)">
                                            Nama Jurusan
                                        </x-form.input>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('namaJurusan')" class="mt-2" />

                                <div class="col-md-8 mt-4">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <select class="form-select" id="pilih-fakultas" name="fakultasSlug" required>
                                            @foreach ($fakultases as $fakultas)
                                                <option value="{{ $fakultas->slug }}" @selected(old('slug', $jurusan->fakultas->slug) == $fakultas->slug)>
                                                    {{ ucwords($fakultas->nama) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="pilih-fakultas">Fakultas</label>
                                    </div>
                                    <x-input-error :messages="$errors->get('fakultasSlug')" class="mt-2" />
                                </div>
                                <div class="col-md-8">
                                    <label class="d-block form-label">Status Jurusan</label>
                                    <div class="form-check mb-2">
                                        <input type="radio" name="statusJurusan" id="status1"
                                            class="form-check-input @error('statusJurusan') border-red-500 @enderror "
                                            value="1" @checked(old('status', $jurusan->status)) required />
                                        <label class="form-check-label" for="status1">Enable</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="status0" name="statusJurusan"
                                            class="form-check-input @error('statusJurusan') border-red-500 @enderror"
                                            value="0" @checked(!old('status', $jurusan->status)) required />
                                        <label class="form-check-label" for="status0">Disable</label>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('statusJurusan')" class="mb-4" />
                            </div>
                            <a href="{{ route('admin.jurusan', $jurusan->fakultas->kampus->slug) }}"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
                            <x-primary-button>
                                Simpan
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
