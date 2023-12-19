<x-admin-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span> Dashboard</h4>

        <!-- Card Border Shadow -->
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="mdi mdi-account-multiple-outline"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0 display-6">{{ count($usersCount) }}</h4>
                        </div>
                        <p class="mb-0 text-heading">Data Member</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-success">
                                    <i class="mdi mdi-account-multiple-plus"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0 display-6"> {{$mahasiswaCount}} </h4>
                        </div>
                        <p class="mb-0 text-heading">Data Mahasiswa</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary">
                                    <i class="mdi mdi-office-building-outline"></i>
                                </span>
                            </div>
                            <h4 class="ms-1 mb-0 display-6">{{ $kampusCount }}</h4>
                        </div>
                        <p class="mb-0 text-heading">Data Kampus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</x-admin-layout>
