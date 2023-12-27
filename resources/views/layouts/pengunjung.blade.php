<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>University.jawa</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/style.css" />
    @vite('resources/css/app.css')
</head>

<body class="dark:bg-gray-950 dark:text-slate-200">
    <!-- navbar -->
    <header
        class="bg-slate-300 dark:bg-gray-950 dark:text-white dark:rounded-none fixed top-0 left-0 z-10 flex items-center w-full rounded-b-lg">
        <div class="container">
            <div class="navbar rounded-lg">
                <div class="flex-1">
                    <a href="{{route('pengunjung.dashboard')}}" class="md:text-2xl text-lg font-semibold">University.<span
                            class="text-indigo-700">Jawa</span></a>
                </div>
                <div class="me-5 flex-none">
                    <label class="swap swap-rotate">
                        <!-- this hidden checkbox controls the state -->
                        <input id="check-theme" type="checkbox" />
                        <!-- sun icon -->
                        <svg class="swap-on dark:text-white w-10 h-10 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                        </svg>
                        <!-- moon icon -->
                        <svg class="swap-off dark:text-white w-10 h-10 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                        </svg>
                    </label>
                </div>
                <div class="flex-none gap-2">
                    <div class="form-control">
                        <form action="{{ route('pengunjung.dashboard') }}">
                            <input type="text" name="search" placeholder="Search"
                                class="input input-bordered border-slate-400 md:w-auto dark:bg-gray-950 dark:input-primary dark:text-white w-24 border-2" />
                            <button type="submit" hidden>Cari</button>
                        </form>
                    </div>

                    @auth
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                <div class="w-10 rounded-full">
                                    <span class="text-3xl">🏄‍♀️</span>
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 dark:bg-dark dark:text-slate-300 rounded-box w-52">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
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
    
    {{$slot}}

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
