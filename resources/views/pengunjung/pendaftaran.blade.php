<x-pengunjung-layout>

    <main class="min-h-screen">
        {{-- hero section --}}
        <section class="pt-20">
            <div class="container">
                <div class="hero min-h-[400px] bg-base-200">
                    <div class="hero-content flex-col lg:flex-row">
                      <img src="{{asset('storage/'. $kampus->gambar->first()->gambar)}}" class="max-w-sm rounded-lg shadow-2xl" />
                      <div>
                        <h1 class="text-3xl font-bold">{{$kampus->nama}}</h1>
                        <p class="py-6">Terima kasih sudah memilih {{ $kampus->nama }} </p>
                        <button class="btn btn-primary">Get Started</button>
                      </div>
                    </div>
                  </div>
            </div>
        </section>
        {{-- end hero section --}}

    </main>

</x-pengunjung-layout>
