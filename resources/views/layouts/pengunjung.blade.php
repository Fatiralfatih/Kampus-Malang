<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>University.jawa</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/style.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="dark:bg-gray-950 dark:text-slate-200">
    <!-- navbar -->
    <header
        class="bg-slate-300 dark:bg-gray-950 dark:text-white dark:rounded-none fixed top-0 left-0 z-10 flex items-center w-full rounded-b-lg">
        <div class="container">
            <div class="navbar rounded-lg">
                <div class="flex-1">
                    <a href="{{ route('pengunjung.dashboard') }}"
                        class="md:text-2xl text-lg font-semibold">University.<span
                            class="text-indigo-700">Jawa</span></a>
                </div>
                <div class=" flex-none items-center">
                    <label class="swap swap-rotate btn btn-ghost btn-circle">
                        <!-- this hidden checkbox controls the state -->
                        <input id="check-theme" class="checkbox opacity-0" type="checkbox" />
                        <!-- sun icon -->
                        <svg class="swap-on dark:text-white w-7 h-7 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                        </svg>
                        <!-- moon icon -->
                        <svg class="swap-off dark:text-white w-7 h-7 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                        </svg>
                    </label>
                </div>
                <div class="flex-none">
                    @auth
                        {{-- user / logout --}}
                        <div class="dropdown dropdown-end ">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                <div class="w-full rounded-full self-center mt-2 items-center">
                                    <ion-icon name="log-in-outline" size="large" ></ion-icon>
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="mt-3 z-[1] p-2 gap-2 shadow menu menu-sm dropdown-content bg-base-100  dark:text-slate-300 rounded-box w-[400px] sm:w-[300px] md:w-[200px]  dark:bg-dark ">
                                <li>
                                    <div class="flex dark:hover:bg-indigo-500">
                                        <ion-icon name="person-outline" size="small"></ion-icon>
                                        <div class="flex-grow-1">
                                            <span>
                                                {{ Auth::user()->nama }}
                                            </span><br>
                                            <small class="text-slate-400">
                                                {{ Auth::user()->role }}
                                            </small>
                                        </div>
                                    </div>
                                </li>
                                @if (Auth::user()->role === 'admin')
                                    <li class="flex dark:hover:bg-indigo-500 rounded-lg">
                                        <a href="{{ route('admin.dashboard') }}" class="flex-grow-1">
                                            <ion-icon name="rocket-outline" size="small"></ion-icon>
                                            <span class="capitalize">Admin</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="flex dark:hover:bg-indigo-500 rounded-lg">
                                        <a href="{{ route('pengunjung.notifikasi') }}" class="flex-grow-1">
                                            <ion-icon name="notifications-outline" size="small"></ion-icon>
                                            <span class="capitalize">Notifikasi</span>
                                        </a>
                                    </li>
                                @endif
                                <form action="{{ route('logout') }}" method="POST">
                                    <li>
                                        @csrf
                                        <button type="submit" class=" max-w-full dark:hover:bg-indigo-500"><ion-icon
                                                size="small" name="log-out-outline"></ion-icon> Logout</button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                        {{-- end user --}}
                    @else
                        <div>
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 bg-indigo-600 rounded-lg hover:bg-indigo-800 text-white">Login</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    @if (Session('success'))
        <div role="alert"
            class="alert top-28 right-8 fixed z-10 max-w-[300px] md:max-w-[400px] md:top-20 lg:right-10 xl:right-32 2xl:right-[460px] dark:bg-indigo-500 dark:text-slate-200 dark:border-none ">
            <div class=" border-green-500 text-green-500">
                <svg role="img" class="w-8 fill-current " viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <title>Cachet</title>
                    <path
                        d="M11.746.254C5.265.254 0 5.519 0 12c0 6.481 5.265 11.746 11.746 11.746 6.482 0 11.746-5.265 11.746-11.746 0-1.44-.26-2.82-.734-4.097l-.264-.709-1.118 1.118.1.288c.373 1.064.575 2.207.575 3.4a10.297 10.297 0 01-10.305 10.305A10.297 10.297 0 011.441 12 10.297 10.297 0 0111.746 1.695c1.817 0 3.52.47 5.002 1.293l.32.178 1.054-1.053-.553-.316A11.699 11.699 0 0011.746.254zM22.97.841l-13.92 13.92-3.722-3.721-1.031 1.03 4.752 4.753L24 1.872z" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-green-400"> {{ Session()->get('success') }} </h3>
            </div>
            <a href="{{ route('pengunjung.notifikasi') }}" class="btn btn-sm btn-primary">See</a>
        </div>
    @elseif (Session('logout') || Session('login'))
        <div role="alert"
            class="alert top-28 right-8 fixed z-10 max-w-[300px] md:max-w-[400px] md:top-20 lg:right-10 xl:right-32 2xl:right-[460px] dark:bg-indigo-500 dark:text-slate-200 dark:border-none ">
            <div class=" border-green-500 text-green-500">
                <svg role="img" class="w-8 fill-current " viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <title>Cachet</title>
                    <path
                        d="M11.746.254C5.265.254 0 5.519 0 12c0 6.481 5.265 11.746 11.746 11.746 6.482 0 11.746-5.265 11.746-11.746 0-1.44-.26-2.82-.734-4.097l-.264-.709-1.118 1.118.1.288c.373 1.064.575 2.207.575 3.4a10.297 10.297 0 01-10.305 10.305A10.297 10.297 0 011.441 12 10.297 10.297 0 0111.746 1.695c1.817 0 3.52.47 5.002 1.293l.32.178 1.054-1.053-.553-.316A11.699 11.699 0 0011.746.254zM22.97.841l-13.92 13.92-3.722-3.721-1.031 1.03 4.752 4.753L24 1.872z" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-green-400 capitalize"> {{ Session()->get('logout') ?? Session()->get('login') }}  </h3>
            </div>
        </div>
    @endif

    {{ $slot }}

    {{-- footer --}}
    <footer class="footer footer-center bottom-0 text-base-content dark:bg-gray-950 dark:text-white p-4">
        <aside>
            <p>Copyright © 2023 - All right reserved by Fatir Al Fatih</p>
        </aside>
    </footer>
    {{-- end footer --}}
    <script src="{{ url('/') }}/js/script.js"></script>
</body>

</html>
