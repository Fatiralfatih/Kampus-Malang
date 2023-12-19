<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ url('/') }}/assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Kampus Malang</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" class="rounded-full" type="image/x-icon"
        href="https://media.istockphoto.com/id/1289587871/id/vektor/huruf-alfabet-km-mk-abstrak-logo-vector-template.jpg?s=612x612&w=0&k=20&c=x3At2ht2sIexUYpEaNHvjLO5hTlklemXAVEat7QctC4=" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/fonts/materialdesignicons.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/fonts/flag-icons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/rtl/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/libs/select2/select2.css" />
    <!-- Page CSS -->
    <link rel="stylesheet" href="{{url('/')}}/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/pages/ui-carousel.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/pages/app-academy.css" />
    
    <link rel="stylesheet" href="{{url('/')}}/assets/vendor/css/pages/front-page-landing.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Helpers -->
    <script src="{{ url('/') }}/assets/vendor/js/helpers.js"></script>
    <script src="{{ url('/') }}/assets/vendor/js/template-customizer.js"></script>
    <script src="{{ url('/') }}/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    {{ $slot }}

                    <!-- / Content -->
                    @if (session()->has('success'))
                        <div class="fixed bg-green-500 p-6 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                            <p> {{ ucwords(session('success')) }} </p>
                        </div>
                    @elseif (session()->has('error'))
                        <div class="fixed bg-red-500 p-6 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                            <p> {{ ucwords(session('error')) }} </p>
                        </div>
                    @endif
                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , made with <span class="text-danger"></span> by
                                    <a href="" class="footer-link fw-medium">Fatir Al fatih</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>

                </div>
                <!-- Content wrapper -->
            </div>

            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ url('/') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ url('/') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ url('/') }}/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ url('/') }}/assets/vendor/libs/select2/select2.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/plyr/plyr.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/swiper/swiper.js"></script>

    <!-- Main JS -->
    <script src="{{ url('/') }}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ url('/') }}/assets/js/app-academy-course.js"></script>
    <script src="{{ url('/') }}/assets/js/ui-carousel.js"></script>

</body>

</html>
