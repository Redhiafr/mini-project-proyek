@section('offcanvas')
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><a href="#"><span class="fas fa-heart"></span>
                <div class="tip">2</div>
            </a></li>
        <li><a href="#"><span class="fas fa-shopping-cart"></span>
                <div class="tip">2</div>
            </a></li>
        @auth
            <li class="dropdown">
                <a id="navbarDropdown" class="nav-link text-dark font-weight-normal" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span class="far fa-user-circle" style="font-size: 20px;"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="#" class="dropdown-item">Transaksi</a>
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
        @endauth
    </ul>
    <div class="offcanvas__logo">
        <a href="/"><img src="img/logo-korbanphp.png" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        @guest
            <a href="#" class="btn login__btn font-weight-bold">Login</a>
            <a href="#" class="btn register__btn font-weight-bold">Register</a>
        @endguest
    </div>
</div>
@show