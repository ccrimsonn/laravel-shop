<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
            <li><a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Shopping Cart</a></li>
            <li class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> User Account</a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="{{ route('register') }}">Sign Up</a></li>
                    <li><a class="dropdown-item" href="#">Sign In</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>