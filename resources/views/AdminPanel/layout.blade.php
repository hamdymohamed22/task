<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test_Project</title>
    <link rel="stylesheet" href=" {{ asset('panel') }}/css/all.min.css">
    <link rel="stylesheet" href=" {{ asset('panel') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('panel') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('panel') }}/css/framework.css">
</head>

<body>
    <div class="page d-flex">
        @include('AdminPanel.sidebar')
        <div class="content w-full">


            @include('AdminPanel.navbar')
            <div class=" d-grid g-20 mb-20">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('panel/js/all.min.js') }}"></script>
    <script src="{{ asset('panel/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('panel/js/jquery.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script> --}}
    @yield('scripts')
</body>

</html>
