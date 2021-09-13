<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>{{ env('APP_NAME') }} - Admin</title>

    <link href="{{ asset('adminkit/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('adminkit/css/light.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        .content {
            padding: 1.5rem 2.5rem 1rem;
        }
    </style>
    @stack('css')
</head>

<body>
    <div class="wrapper">
        @include('layouts.components.sidebar')

        <div class="main">
            @include('layouts.components.navbar')

            <main class="content">
                <div class="container-fluid p-0">
                    @if (isset($title_page))
                    <h1 class="h3 mb-3">{{ $title_page }}</h1>
                    @endif

                    <div class="card">
                        {{-- <div class="card-header">
                            <h3 class="card-title">Feather Icons</h3>
                            <h6 class="card-subtitle text-muted">Simply beautiful open source icons</h6>
                        </div> --}}
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                    @stack('modal')
                </div>
            </main>

            @include('layouts.components.footer')
        </div>
    </div>

    <script src="{{ asset('adminkit/js/jquery.js') }}"></script>
    <script src="{{ asset('adminkit/js/app.js') }}"></script>
    @stack('js')
</body>
</html>
