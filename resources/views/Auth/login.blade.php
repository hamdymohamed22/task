<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('login/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/all.css') }}">
    <title>Task</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Home</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                        <li class="nav-item">
                            {{-- <a class=" nav-link" href="{{ route('signup') }}">signup</a> --}}
                        </li>
                    @endguest
                </ul>

                @auth
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                    <form action="{{ route('logout') }}" class="d-flex" method="post">
                        @csrf
                        <button class="btn btn-outline-danger" type="submit">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container">
        @include('inc.messages')
        <div class="container pt-5 mt-5 ">
            <h1 class="text-center"> Log in</h1>
            <div class="mx-auto col-md-6 pt-5">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login/js/all.min.js') }}"></script>
</body>

</html>
