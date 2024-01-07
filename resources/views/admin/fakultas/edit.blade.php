<x-admin-layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl">
                <div class="card mb-2">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Fakultas {{ ucwords($fakultas->nama) }} Kampus
                            {{ $fakultas->Kampus->nama }} </h5>
                        <small class="text-body float-end">Merged input group</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.fakultas.update', $fakultas->slug) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="kampusSlug" value="{{ $fakultas->kampus->slug }}">

                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <x-form.input nama="nama" placeholder="Masukkan Nama Fakultas" :value="old('nama', $fakultas->nama)">
                                        Nama Fakultas
                                    </x-form.input>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />

                            <div class="input-group input-group-merge mt-2 mb-2">
                                <div class="form-floating form-floating-outline">
                                    <textarea id="basic-icon-default-message" class="form-control  @error('tentang') border-red-500 @enderror"
                                        name="tentang" placeholder="{{ ucwords('Masukkan tentang fakultas') }}" style="height: 80px" required>{{ old('tentang', $fakultas->tentang) }}</textarea>
                                    <label for="tentang-fakultas"
                                        class="flex items-center">{{ ucwords('tentang') }}</label>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('tentang')" class="mt-2" />
                            <div class="mb-2">
                                <label class="d-block form-label">Status Fakultas</label>
                                <div class="form-check mb-2">
                                    <input type="radio" id="status-enable" name="status"
                                        class="form-check-input @error('status') border-red-500 @enderror"
                                        value="1" required @checked(old('status', $fakultas->status)) />
                                    <label class="form-check-label" for="status-enable">Enable</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="status-disable" name="status"
                                        class="form-check-input @error('status') border-red-500 @enderror"
                                        value="0" required @checked(!old('status', $fakultas->status)) />
                                    <label class="form-check-label" for="status-disable">Disable</label>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('status')" class="mb-4" />

                            <a href="{{ route('admin.fakultas', $fakultas->kampus->slug) }}"
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
