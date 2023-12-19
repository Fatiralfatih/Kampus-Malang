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
                        <h5 class="card-header text-lg font-medium uppercase">
                            Form Tambah Pelaksanaan Jurusan {{ $jurusan->nama }}
                        </h5>
                        <div class="card-body">
                            <form action="{{ route('admin.jurusan.pelaksanaan.store', $jurusan->slug) }}" method="POST"
                                class="row g-3">
                                @csrf
                                <div class="col-md-8">
                                    <div class="input-group input-group-merge">
                                        <x-form.input nama="nama" placeholder="Masukkan nama jadwal">
                                            nama jadwal
                                        </x-form.input>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />

                                <div class="col-md-6 mt-4">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" name="jadwal" class="form-control"
                                            placeholder="YYYY-MM-DD" id="flatpickr-date"
                                            value="{{ old('jadwal') }}" />
                                        <label for="flatpickr-date">Jadwal Pelaksanaan</label>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('jadwal')" class="mt-2" />

                                <div class="col-12">
                                    <a href="{{ route('admin.jurusan', [$jurusan->fakultas->kampus->slug]) }}"
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
