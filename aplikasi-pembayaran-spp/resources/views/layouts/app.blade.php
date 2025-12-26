<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/5.3.5/apexcharts.min.css"
        integrity="sha512-IqtQ7LKr3He47p7HjxynmqZfN07VljNkdGyGDdDJ//f1r6bT0IEKQf2CCtSgun/pvbFlNnPDMRrMSQhmSxmSSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/5.3.5/apexcharts.min.js"
        integrity="sha512-dC9VWzoPczd9ppMRE/FJohD2fB7ByZ0VVLVCMlOrM2LHqoFFuVGcWch1riUcwKJuhWx8OhPjhJsAHrp4CP4gtw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');

        * {
            font-family: 'Manrope', sans-serif;
        }

        .nav-link {
            color: #fff;
        }

        .nav-link:hover {
            color: #fff;
        }

        .nav-link:active {
            color: #fff;
        }

        ul hr.divider {
            margin: 2vh 8px;
            background-color: #aaa;
            height: 2px;
        }

        .card-stat {
            color: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            font-weight: 600;
            transition: 0.3s;
        }

        .card-stat:hover {
            transform: translateY(-2px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        }

        .card-stat h2 {
            font-size: 1.6rem;
            margin-top: 10px;
            font-weight: bold;
        }

        .table thead {
            background-color: #f8f9fa;
            font-weight: 600;
        }
    </style>
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')

    <main class="flex-fill">
        @yield('content')
    </main>

    @include('layouts.footer')

    @include('auth.logout')

    @if ($errors->any())
        <script>
            let errorList = `
            <ul style="text-align:center; margin:0; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li class="text-center" style="list-style-type: none;">{{ $error }}</li>
                @endforeach
            </ul>
        `;

            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal!',
                html: errorList,
                confirmButtonColor: '#007bff',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                confirmButtonColor: '#007bff',
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#007bff',
            });
        </script>
    @endif
</body>

</html>
