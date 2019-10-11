<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title') </title>

    {{-- CORE JS --}}
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- SELECT 2 CSS -->
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" />

    <!-- BOOTSTRAP SELECT CSS -->
    <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- BOOTSTRAP MATERIAL DATETIME PICKER CSS -->
    <link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

    <!-- MATERIAL ICONS FONT CSS -->
    <link href="{{ asset('icon/materialicon/material-icons.css') }}" rel="stylesheet" />

    <!-- FONTAWESOME ICONPICKER  -->
    <link href="{{ asset('icon/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css')}}" rel="stylesheet">

    {{-- SWEETALERT CSS --}}
    <link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')

    @stack('css-stack')

    <script>
        // USE LARAVEL.CSRFTOKEN
        window.Laravel = @php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); @endphp

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':  window.Laravel.csrfToken // FIX 419 => ALTERNATIVE USE $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json', //  FIX UNDEFINED DATA
        });
    </script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> Masuk </a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"> Daftar </a>
                            </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ auth()->user()->nickname }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(request()->user()->group_id === 1)
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}"> Dashboard </a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    {{-- PROFILE JS --}}
    <script src="{{ asset('js/profile.js' )}}"></script>

    {{-- SELECT 2 JS --}}
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>

    {{-- SELECT PLUGIN JS --}}
    <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    {{-- EDITTABLE TABLE JS --}}
    <script src="{{ asset('plugins/editable-table/mindmup-editabletable.js') }}"></script>

    {{-- MOMENT PLUGIN JS --}}
    <script src="{{ asset('plugins/momentjs/moment-with-locales.js') }}"></script>

    {{-- AUTOSIZE PLUGIN JS --}}
    <script src="{{ asset('plugins/autosize/autosize.js' )}}"></script>

    {{-- DATE PICKER --}}
    <script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

    {{-- FONTAWESOME ICONPICKER --}}
    <script src="{{ asset('icon/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js') }}"></script>

    {{-- PROFILE JS --}}
    <script src="{{ asset('js/profile.js') }}"></script>

    {{-- SWEETALERT JS --}}
    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"> </script>

    @yield('js')

    @stack('js-stack')
</body>

</html>
