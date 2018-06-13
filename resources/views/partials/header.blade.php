<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
            <li>
                <a class="nav-link" href="{{ route('shoppingCart') }}">
                    <i class="fas fa-shopping-cart"></i> Shopping Cart
                    <span class="badge badge-secondary">
                        {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
                    </span>
                </a>
            </li>
            <li class="dropdown">
                @if(auth()->guard('customer')->Check())
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> {{ auth()->guard('customer')->user()->email }}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                @else
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> User Account</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="{{ route('signUpPage') }}">Sign Up</a></li>
                        <li><a class="dropdown-item" href="{{ route('signInPage') }}">Sign In</a></li>
                    </ul>
                @endif
            </li>
        </ul>
    </div>
</nav>