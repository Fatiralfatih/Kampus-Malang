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
                                    <a href="{{ route('admin.kampus.edit', $kampus->slug) }}" class="nav-link ">
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
                                    <a href="{{ route('admin.kontak', $kampus->slug) }}"
                                        class="nav-link {{ Request::is('admin/kontak/' . $kampus->slug) ? 'active' : '' }} ">
                                        Edit Kontak
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.kampus') }}"
                                        class="inline-flex ms-3 items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kembali</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                {{-- edit kontak kampus --}}
                                @if ($kampus->kontak)
                                    <div class="col-xl">
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0">Edit Kontak Kampus</h5>
                                                <small class="text-body float-end">Edit Kontak Kampus</small>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('admin.kampus.edit.kontak', $kampus->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mt-3">
                                                        <div class="input-group input-group-merge">
                                                            <span
                                                                class="input-group-text  @error('email') border-red-500 @enderror"><i
                                                                    class="mdi mdi mdi-web"></i></span>
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text"
                                                                    class="form-control @error('email') border-red-500 @enderror"
                                                                    name="email" id="email-kampus"
                                                                    placeholder="{{ ucwords('Masukkan email Kampus') }}"
                                                                    value="{{ old('email', $kampus->kontak->email) }}"
                                                                    required />
                                                                <label
                                                                    for="email-kampus">{{ ucwords('email') }}</label>

                                                            </div>
                                                            <span id="basic-icon-default-email2"
                                                                class="input-group-text">ac.id</span>
                                                        </div>
                                                        <x-input-error :messages="$errors->get('website')" class="mt-2" />
                                                    </div>
                                                    <x-input-error :messages="$errors->get('email')" class="mb-4" />

                                                    <div class="input-group input-group-merge mt-4">
                                                        <span
                                                            class="input-group-text @error('telepon') border-red-500 @enderror">
                                                            <i class="mdi mdi-check-decagram-outline">
                                                            </i>
                                                        </span>
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="tel"
                                                                class="form-control @error('telepon') border-red-500 @enderror"
                                                                name="telepon" id="telepon-kampus"
                                                                placeholder="{{ ucwords('Masukkan telepon Kampus') }}"
                                                                value="{{ old('telepon', $kampus->kontak->telepon) }}"
                                                                required />
                                                            <label
                                                                for="telepon-kampus">{{ ucwords('telepon') }}</label>
                                                        </div>
                                                    </div>
                                                    <x-input-error :messages="$errors->get('telepon')" class="mb-4" />

                                                    <div class="input-group input-group-merge mt-4">
                                                        <span
                                                            class="input-group-text @error('whatsapp') border-red-500 @enderror">
                                                            <i class="mdi mdi-check-decagram-outline">
                                                            </i>
                                                        </span>
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="tel"
                                                                class="form-control @error('whatsapp') border-red-500 @enderror"
                                                                name="whatsapp" id="whatsapp-kampus"
                                                                placeholder="{{ ucwords('Masukkan whatsapp Kampus') }}"
                                                                value="{{ old('whatsapp', $kampus->kontak->whatsapp) }}"
                                                                required />
                                                            <label
                                                                for="whatsapp-kampus">{{ ucwords('whatsapp') }}</label>
                                                        </div>
                                                    </div>
                                                    <x-input-error :messages="$errors->get('whatsapp')" class="" />


                                                    <x-primary-button class="mt-4">
                                                        Simpan
                                                    </x-primary-button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    {{-- tambah kontak --}}
                                    <div class="col-xl">
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-lg uppercase">Tambah Kontak Kampus</h4>
                                                <small class="text-body float-end">tambah Data Kampus</small>
                                            </div>
                                            <p class="ms-4 text-red-400 font-medium">Note: Kampus Ini tidak ada
                                                kontak</p>
                                            <div class="card-body">
                                                <form
                                                    action="{{ route('admin.kampus.tambah.kontak', ['kampus' => $kampus->slug]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="mt-3">
                                                        <div class="input-group input-group-merge">
                                                            <span
                                                                class="input-group-text  @error('email') border-red-500 @enderror"><i
                                                                    class="mdi mdi mdi-web"></i></span>
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text"
                                                                    class="form-control @error('email') border-red-500 @enderror"
                                                                    name="email" id="email-kampus"
                                                                    placeholder="{{ ucwords('Masukkan email Kampus') }}"
                                                                    value="{{ old('email') }}" required />
                                                                <label
                                                                    for="email-kampus">{{ ucwords('email') }}</label>

                                                            </div>
                                                            <span id="basic-icon-default-email2"
                                                                class="input-group-text">ac.id</span>
                                                        </div>
                                                        <x-input-error :messages="$errors->get('website')" class="mt-2" />
                                                    </div>
                                                    <x-input-error :messages="$errors->get('email')" class="mb-4" />

                                                    <div class="input-group input-group-merge mt-4">
                                                        <span
                                                            class="input-group-text @error('telepon') border-red-500 @enderror">
                                                            <i class="mdi mdi-check-decagram-outline">
                                                            </i>
                                                        </span>
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="tel"
                                                                class="form-control @error('telepon') border-red-500 @enderror"
                                                                name="telepon" id="telepon-kampus"
                                                                placeholder="{{ ucwords('Masukkan telepon Kampus') }}"
                                                                value="{{ old('telepon') }}" required />
                                                            <label
                                                                for="telepon-kampus">{{ ucwords('telepon') }}</label>
                                                        </div>
                                                    </div>
                                                    <x-input-error :messages="$errors->get('telepon')" class="mb-4" />

                                                    <div class="input-group input-group-merge mt-4">
                                                        <span
                                                            class="input-group-text @error('whatsapp') border-red-500 @enderror">
                                                            <i class="mdi mdi-check-decagram-outline">
                                                            </i>
                                                        </span>
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="tel"
                                                                class="form-control @error('whatsapp') border-red-500 @enderror"
                                                                name="whatsapp" id="whatsapp-kampus"
                                                                placeholder="{{ ucwords('Masukkan whatsapp Kampus') }}"
                                                                value="{{ old('whatsapp') }}" required />
                                                            <label
                                                                for="whatsapp-kampus">{{ ucwords('whatsapp') }}</label>
                                                        </div>
                                                    </div>
                                                    <x-input-error :messages="$errors->get('whatsapp')" class="" />


                                                    <x-primary-button class="mt-4">
                                                        Simpan
                                                    </x-primary-button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>
