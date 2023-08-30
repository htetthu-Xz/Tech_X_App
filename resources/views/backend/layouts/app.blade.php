<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('backend/images/techX.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/argon-dashboard/2.0.4/css/nucleo-icons.min.css" rel="stylesheet">

    {{-- Fonts and icons --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/argon-dashboard/2.0.4/css/nucleo-svg.min.css" integrity="sha512-3vhUeqMoZelRDM1EDZGDqNi+r/FBKb0Xigen7qjdUOqtIlyDPlzjQieCU1MrjygOpmc+VAlKG/MyLa00fesRMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- datepicker --}}
    <link rel="stylesheet" href="{{ asset('plugins/Zebra-Datepicker/dist/css/bootstrap/zebra_datepicker.css') }}">

    {{-- alert --}}
    <link rel="stylesheet" href="{{ asset('plugins/awesome-notifications/dist/style.css') }}">

    {{-- richtext editor --}}
    <link rel="stylesheet" href="{{ asset('backend/plugins/richtexteditor/rte_theme_default.css') }}">

    {{-- data table --}}
    <link rel="stylesheet" href="{{ asset('plugins/datatable/jquery.dataTables.min.css') }}">

    {{-- Font Awesome Icons --}}
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('backend/css/nucleo-svg.css') }}" rel="stylesheet" />

    {{-- CSSFiles --}}
    <link id="pagestyle" href="{{ asset('backend/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />

    {{-- select2 --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" /> --}}
    <link href="{{ asset('backend/css/select2.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">

    @stack('css')
</head>
<body class="g-sidenav-show dark-version bg-gray-600">

    @include('backend.layouts.sidebar')

    <main class="main-content position-relative border-radius-lg">

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
    <script src="{{ asset('backend/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/js/argon-dashboard.js?v=2.0.4') }}"></script>
    <script src="{{ asset('backend/plugins/richtexteditor/rte.js') }}"></script>
    <script src="{{ asset('backend/plugins/richtexteditor//plugins/all_plugins.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/chartjs.min.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('plugins/bootstrap-5-jbvalidator/dist/jbvalidator.min.js') }}"></script>
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script> --}}

    @include('backend.layouts.toster')

    <script>
        $(function() {
            $('#dob').Zebra_DatePicker({
                format: 'Y-m-d',
                default_position: 'below',
                select_other_months: true,
                direction: false
            });
        });
    </script>
    @stack('script')
</body>
</html>