@section('header')
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="/"><img src="/img/logo-mebel.png" width="210px" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <div class="header__search">
                        <form action="#">
                            <input type="text" placeholder="Telusuri">
                            <button type="submit" class="header__search__btn">Cari</button>
                        </form>
                    </div>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <ul class="header__right__widget">
                        <li><a href="#"><span class="fas fa-heart"></span>
                                <div class="tip">2</div>
                            </a>
                        </li>
                        <li>
                            @auth
                                <a href="{{ route('shoppingCarts.index') }}">
                                    <span class="fas fa-shopping-cart"></span>
                                    <div class="tip">{{ App\Models\ShoppingCart::total() }}</div>
                                </a>
                            @else
                                <a href="#" data-toggle="modal" data-target="#modalLogin">
                                    <span class="fas fa-shopping-cart"></span>
                                </a>
                            @endauth
                        </li>
                    </ul>
                    <div class="header__right__auth">
                        @guest
                            <a href="#" class="btn login__btn font-weight-bold" data-toggle="modal" data-target="#modalLogin">Login</a>
                            <a href="#" class="btn register__btn font-weight-bold" data-toggle="modal" data-target="#modalRegister">Register</a>
                        @else
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link text-dark font-weight-normal" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="far fa-user-circle" style="font-size: 20px;"></span> {{ Auth::user()->name }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('histories.index') }}" class="dropdown-item">Transaksi</a>
                                        <a href="#" class="dropdown-item">Setting</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
@show