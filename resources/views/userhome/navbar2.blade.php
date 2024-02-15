<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="#"><img width="30" height="30"
                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    alt="#" /></a>
            <a class="navbar-brand" href="#" style="color: #f7444e">
                ZVCart
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.html">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog_list.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>

                    @if (Route::has('login'))
                        @auth

                            <li>
                                <form class="d-flex" id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Logout</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                    href="{{ route('login.view') }}" name="loginbtn">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                    href="{{ route('register.view') }}">Register</a>
                            </li>
                        @endauth
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</header>
