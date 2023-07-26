<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            <img src="{{asset('assets/logo/logo1.png')}}" alt="" style="width:90px"><label for="" style="font-weight: bold; font-family:'Poppins',sans-serif;">Hijab</label>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                @if (auth()->check() && auth()->user()->role == 'Member')
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/promosi">Promosi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Kontak</a>
                    </li>
                </ul>
                @elseif(auth()->check() && auth()->user()->role == 'Admin')
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/customer">Data Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Kontak</a>
                    </li>
                </ul>
                @endif
            </div>
            
            <div class="navbar align-self-center d-flex">
                @if (auth()->check() && auth()->user()->role == 'Member')
                <a class="nav-icon position-relative text-decoration-none" href="/transaksi/list">
                    <i class="fa fa-receipt"></i>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                </a>    
                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                </a>
                <form action="">
                    <a class="nav-icon position-relative text-decoration-none" href="/logout">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </form>
                @elseif(auth()->check() && auth()->user()->role == 'Admin')   
                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                </a>
                <form action="">
                    <a class="nav-icon position-relative text-decoration-none" href="/logout">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </form>
                @else
                    <a href="/login" class="btn btn-sm btn-primary" style="background: rgb(0, 0, 16); color:white">Login</a>
                @endif
               
            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->