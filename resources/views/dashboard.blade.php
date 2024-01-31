<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>@yield('title','Dashboard')</title>
    <link href="{{asset('bootstrap/css/style.css')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"/>
</head>
<body>
<div class="container-fluid p-0 d-flex h-100">
    <div id="bdSidebar"
         class="d-flex flex-column flex-shrink-0 p-3 bg-success text-white offcanvas-md offcanvas-start">
        <a href="#" class="navbar-brand"></a>
        <button class="btn btn-lg btn-dark">{{auth()->user()->name}}</button>
        <hr>
        <ul class="mynav nav nav-pills flex-column mb-auto">
            @if(auth()->user()->type == 1)
                <li class="nav-item mb-1">
                    <a href="{{route('goToRegisterStudent')}}">
                        <i class="fa-regular fa-user"></i>
                        Add Student
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="{{route('addResultPage')}}">
                        <i class="fa-regular fa-bookmark"></i>
                        Add Results
                    </a>
                </li>
            @else
                <li class="nav-item mb-1">
                    <a href="{{route('goToResultView')}}">
                        <i class="fa-regular fa-user"></i>
                        View Results
                    </a>
                </li>
            @endif
            <li class="nav-item mb-1">
                <a href="{{route('logout')}}">
                    <i class="fa fa-sign-out"></i>
                    Logout
                </a>
            </li>
        </ul>
        <hr>
    </div>

    <div class="bg-light flex-fill">
        <div class="p-4">
            @yield('dashboardContent')
        </div>
    </div>
</div>
</body>
</html>
