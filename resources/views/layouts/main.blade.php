<!doctype html>
<html lang="en">

<head>
    {{-- Required meta tags --}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Agenda Pimpinan | {{ $title }}</title>
    <link rel="icon" href="img/LogoKupu2.png" type="x-icon">
    {{-- Bootstrap CSS klo diaktifkan icon bs 4 tidak muncul--}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> --}}
    
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    {{-- My Style --}}
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}

	{{-- <link rel="canonical" href="https://www.wrappixel.com/templates/adminpro/" /> --}}

    <!-- Custom CSS adminpro -->
    <link href="/css/style.min.css" rel="stylesheet">

    <!-- Plugin CSS dataTables -->
    <link href="/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

    {{-- Calendar --}}
    
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

    {{-- bootstrap library  --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
    {{-- jquery library --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    {{-- calender library --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    
    
</head>

<body>

    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>

    {{-- bootsrap 5  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- All Jquery -->
    <script src="/libs/jquery/dist/jquery.min.js"></script>   
    {{-- StaticAdmin bootsrap 4--}}
    <script src="/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="/js/app.min.js"></script>
    <script src="/js/app.init.js"></script>
    <script src="/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    {{-- <script src="/js/feather.min.js"></script> --}}
    {{-- <script src="/js/custom.min.js"></script> --}}

    <!--This page plugins dataTable -->
    <script src="/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/js/pages/datatable/custom-datatable.js"></script>
    <script src="/js/pages/datatable/datatable-basic.init.js"></script>

    {{-- calendar --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

</body>
        {{-- <div class="copyright text-center text-sm-center text-muted mt-3 mb-5">
            &copy; {{ now()->year }} <a href="#" class="font-weight-bold ml-1">Copyright by Miftakhul Fahmi - Dittekda</a>
        </div> --}}
</html>