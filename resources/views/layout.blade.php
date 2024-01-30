<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LMS</title>
    <!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-between">
    <div class="container-fluid">
        <a class="navbar-brand"><b style="color: white">LMS Dashboard</b></a>
        <form class="form-inline">
            @if(\Route::current()->getName() == 'login')
                <label style="color: white;font-weight: bold">Don't you have an account ??</label>&nbsp;&nbsp;
                <a href="{{route('registration')}}" class="btn btn-success">Signup</a>
            @endif
        </form>
    </div>
</nav>

{{--changing content goes here--}}
@yield('lgrContent')
</body>
</html>
