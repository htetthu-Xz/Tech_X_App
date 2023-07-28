<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/argon-dashboard/2.0.4/css/nucleo-icons.min.css" rel="stylesheet">

    {{-- Fonts and icons --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/argon-dashboard/2.0.4/css/nucleo-svg.min.css" integrity="sha512-3vhUeqMoZelRDM1EDZGDqNi+r/FBKb0Xigen7qjdUOqtIlyDPlzjQieCU1MrjygOpmc+VAlKG/MyLa00fesRMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- datepicker --}}
    <link rel="stylesheet" href="{{ asset('plugins/Zebra-Datepicker/dist/css/bootstrap/zebra_datepicker.css') }}">

    {{-- alert --}}
    <link rel="stylesheet" href="{{ asset('plugins/awesome-notifications/dist/style.css') }}">

    {{-- data table --}}
    <link rel="stylesheet" href="{{ asset('plugins/datatable/jquery.dataTables.min.css') }}">

    {{-- Font Awesome Icons --}}
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('backend/css/nucleo-svg.css') }}" rel="stylesheet" />

    {{-- CSSFiles --}}
    <link id="pagestyle" href="{{ asset('backend/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />

    @stack('css')
    <style>
        .nav-item a:hover {
            background-color: #283255;
            border-radius: 0.5rem;
        }
        .nav-item:hover {
            margin-left: 5px;
        }
    </style>
</head>
<body class="g-sidenav-show dark-version bg-gray-600">

    @include('backend.layouts.sidebar')

    <main class="main-content position-relative border-radius-lg ">

        @include('backend.layouts.navbar')
      
        <div class="container-fluid py-4">

            @yield('content')

            @include('backend.layouts.footer')

        </div>

    </main>

    <script src="{{ asset('plugins/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('plugins/Zebra-Datepicker/dist/zebra_datepicker.src.js') }}"></script>
    <script src="{{ asset('plugins/awesome-notifications/dist/index.var.js') }}"></script>
    <script src="{{ asset('plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/chartjs.min.js') }}"></script>

    @stack('script')


    <script>
        // var win = navigator.platform.indexOf('Win') > -1;
        // if (win && document.querySelector('#sidenav-scrollbar')) {
        // var options = {
        //     damping: '0.5'
        // }
        // Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        // }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('backend/js/argon-dashboard.min.js?v=2.0.4') }}"></script>


</body>
</html>