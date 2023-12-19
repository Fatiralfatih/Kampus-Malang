<x-pengunjung-layout>
    <div class="container-lg container-y mt-5 bg-icon-left">
        {{-- <h6 class="text-center fw-semibold d-flex justify-content-center align-items-center mb-4">
            <span class="text-uppercase">contact us</span>
        </h6>
        <h3 class="text-center mb-2"><span class="fw-bold">Lets work</span> together</h3>
        <p class="text-center fw-medium mb-3 mb-md-5 pb-3">Any question or remark? just write us a message</p> --}}
        <div class="row gy-4">
            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="rounded text-black card-body">
                        <p class="display-6 mb-4">Terima kasih sudah memilih Kampus {{ $kampus->nama }} </p>
                        @forelse ($kampus->Gambar as $gambar)
                            <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="let’s contact"
                                class="w-90  mb-2 pb-1" />
                        @empty
                            <p>tidak ada gambar</p>
                        @endforelse
                        {{-- <p class="mb-0">
                            Looking for more customisation, more features, and more anything? Don’t worry, We’ve
                            provide you
                            with an entire team of experienced professionals.
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4 text-lg font-semibold">Silahkan pilih jurusan</h5>
                        <form action="{{ route('pendaftaran.store', $kampus->slug) }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="multicol-country">Jurusan</label>
                                        <div class="col-sm-10">
                                            <select id="multicol-country" name="jurusan_id" class="select2 form-select">
                                                <option @selected($kampus->jurusan) disable>Pilih Jurusan</option>
                                                @forelse ($kampus->Jurusan as $jurusan)
                                                    <option value="{{ $jurusan->id }}">{{ ucwords($jurusan->nama) }}
                                                    </option>
                                                @empty
                                                    <option selected disabled class="text-red-500">Tidak ada jurusan
                                                    </option>
                                                @endforelse
                                            </select>
                                            <x-input-error :messages="$errors->get('jurusan_id')" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <x-primary-button class="mt-4">
                                Daftar
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-pengunjung-layout>
