<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('backend/images/techX.png') }}">
    <link id="pagestyle" href="{{ asset('backend/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />\
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/awesome-notifications/dist/style.css') }}">
    <title>{{ config('app.name') }}</title>
    <style>
        body {
            background-color: #051139;
        }
        .card-bg {
            background-color: transparent;
        }
        .card-body h3,i,span,.form-label {
            color: #CFD1D9;
        }
        .card-body a {
            color: #b8b9c0;
            text-decoration: underline;
        }
        .card-body a:hover {
            color: #dddee3;
            text-decoration: underline;
            margin-bottom: 5px;
        }
        .head-icon {
            text-align: center;
        }
        .bd-callout {
            background-color: #ffd9d8;
            padding: 1.25rem;
            margin-top: 1.25rem;
            margin-bottom: 1.25rem;
            border: 1px solid #273569;
            border-left-width: .25rem;
            border-radius: .25rem
        }
        .bd-callout ul {
            list-style-type: none;
        }
        .bd-callout-danger {
            border-left-color: #d9534f;
            color: #d9534f;
        }
        .bd-callout i{
            color: #d9534f;
        }
    </style>
</head>
<body>
    
	<main>
        <section class="container d-flex flex-column">
            <div class="row align-items-center justify-content-center g-0 min-vh-100">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <!-- Card -->
                    <div class="card shadow card-bg">
                        <!-- Card body -->
                        <div class="card-body p-6">
                            <div class="mb-4">
                                <p class=" head-icon"><i class="ri-lock-fill fs-1"></i></p>
                                <h3 class="mb-1 fw-bold">Forgot Password</h1>
                                <p>Fill the form to reset your password.</p>
                            </div>
                            @include('backend.layouts.page_info')
                            <form action="{{ route('admin.sendResetLink') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email "
                                        required />
                                </div>
                                <div class="mb-3 d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        Send Reset Link
                                    </button>
                                </div>
                                <span>Return to <a href="{{ route('get.login') }}">Login In</a></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="{{ asset('plugins/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/awesome-notifications/dist/index.var.js') }}"></script>
    @if (session()->has('send_success'))
        <script>
            let notifier = new AWN();
            notifier.success("{{ session('send_success') }}", {durations: {info: 3000}})
        </script>
    @endif
</body>
</html>

