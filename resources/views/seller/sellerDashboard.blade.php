<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZVCart Seller</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/3026e1a73d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/adminlogin.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="sdash col-auto col-md-3 col-xl-2 px-sm-2 px-0">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline"><i>Seller Dashboard</i></span>
                    </a>
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-house" style="color: #fff"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-tag" style="color: #ffffff;"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Products</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{ route('products.add.view') }}" class="nav-link px-0 text-white"> <span
                                            class="d-none d-sm-inline">Add Products</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('seller.products') }}" class="nav-link px-0 text-white"> <span
                                            class="d-none d-sm-inline">View Product</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('seller.orders') }}" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-list" style="color: #ffffff;"></i></i>
                                <span class="ms-1 d-none d-sm-inline text-white">Orders</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('seller.billing') }}" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-file-invoice-dollar" style="color: #ffffff;"></i>
                                <span class="ms-1 d-none d-sm-inline text-white">Billing</span> </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#"
                            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-circle-user fa-lg" style="color: #fff;"></i>
                            <span class="d-none d-sm-inline mx-1">Seller</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light text-small shadow ">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form class="dropdown-item" id="logout-form" action="{{ route('seller.logout') }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="{{ route('seller.logout') }}"
                                    onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Log
                                    out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                @yield('seller-content-page')
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>
