<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="nav-align-left">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="{{ route('admin.kampus.edit', $kampus->slug) }}"
                                        class="nav-link {{ Request::is('admin/kampus/edit/' . $kampus->slug) ? 'active' : '' }} ">
                                        Edit Kampus
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.fakultas', $kampus->slug) }}" class="nav-link">
                                        Edit Fakultas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.jurusan', $kampus->slug) }}" class="nav-link">
                                        Edit Jurusan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.gambar', $kampus->slug) }}" class="nav-link">
                                        Edit Gambar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.kontak', $kampus->slug) }}" class="nav-link">
                                        Edit Kontak
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.kampus') }}"
                                        class="inline-flex ms-3 items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kembali</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                {{-- edit kampus --}}
                                <div class="col-xl">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0 uppercase text-lg">Edit Data Kampus {{ $kampus->nama }}
                                            </h5>
                                            <small class="text-body float-end">Edit Data Kampus</small>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.kampus.update', [$kampus->slug]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="space-y-5">
                                                    <x-form.input nama="nama" placeholder="Masukkan nama kampus"
                                                        :value="old('nama', $kampus->nama)">
                                                        Nama Kampus
                                                    </x-form.input>
                                                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />

                                                    <x-form.input nama="alamat" placeholder="Masukkan alamat kampus"
                                                        :value="old('alamat', $kampus->alamat)">
                                                        alamat Kampus
                                                    </x-form.input>
                                                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />


                                                    <x-form.input nama="akreditasi"
                                                        placeholder="Masukkan akreditasi kampus" :value="old('akreditasi', $kampus->akreditasi)">
                                                        akreditasi Kampus
                                                    </x-form.input>
                                                    <x-input-error :messages="$errors->get('akreditasi')" class="mt-2" />

                                                    <x-form.input nama="website" placeholder="Masukkan website kampus"
                                                        :value="old('website', $kampus->website)">
                                                        website Kampus
                                                    </x-form.input>
                                                    <x-input-error :messages="$errors->get('website')" class="mt-2" />

                                                    <div class="mt-4">
                                                        <div class="form-floating form-floating-outline">
                                                            <select id="kategori-kampus"
                                                                class="select2 form-select  @error('kategori') border-red-500 @enderror"
                                                                name="kategori" required data-allow-clear="true"
                                                                required>
                                                                <option value="{{ old('kategori', $kampus->kategori) }}"
                                                                    selected>{{ ucwords($kampus->kategori) }}
                                                                </option>
                                                                <option value="politeknik">
                                                                    {{ ucwords('politeknik') }}
                                                                </option>
                                                                <option value="swasta">{{ ucwords('swasta') }}
                                                                </option>
                                                                <option value="negeri">{{ ucwords('negeri') }}
                                                                </option>
                                                                <option value="sekolah tinggi">
                                                                    {{ ucwords('sekolah tinggi') }}</option>
                                                                <option value="insitut">{{ ucwords('insitut') }}
                                                                </option>
                                                            </select>
                                                            <label for="kategori-kampus">Kategori</label>
                                                        </div>
                                                    </div>
                                                    <x-input-error :messages="$errors->get('kategori')" class="mt-2" />

                                                    <div class="form-floating form-floating-outline">
                                                        <textarea id="basic-icon-default-message" class="form-control  @error('tentang') border-red-500 @enderror"
                                                            name="tentang" required placeholder="{{ ucwords('Masukkan tentang kampus') }}" style="height: 80px" required>{{ old('tentang', $kampus->tentang) }}</textarea>
                                                        <label for="tentang-kampus"
                                                            class="flex items-center">{{ ucwords('tentang') }}</label>
                                                    </div>
                                                    <x-input-error :messages="$errors->get('tentang')" class="mb-2" />
                                                </div>
                                                <x-primary-button class="mt-4">
                                                    Simpan
                                                </x-primary-button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>
