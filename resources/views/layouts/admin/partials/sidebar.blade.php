@section('sidebar')
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Sistem Swalayan Online</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">SSO</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Navigations</li>
            <li class="{{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> 
                    <span>Beranda</span>
                </a>
            </li>
            <li class="{{ (request()->segment(1) == 'payments') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('payments.index') }}">
                      <i class="fas fa-wallet"></i>
                    <span>Pembayaran</span>
                </a>
            </li>
            <li class="dropdown {{ (request()->segment(1) == 'categories' || request()->segment(1) == 'products' || request()->segment(1) == 'brands') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-box-open"></i>
                    <span>Data Produk</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ (request()->segment(1) == 'categories') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.index') }}">Kategori Produk</a>
                    </li>
                    <li class="{{ (request()->segment(1) == 'brands') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('brands.index') }}">Merk Produk</a>
                    </li>
                    <li class="{{ (request()->segment(1) == 'products') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
                    </li>
                </ul>
            </li>
            {{-- <li>
                <a class="nav-link" href="#">
                    <i class="fas fa-tags"></i> 
                    <span>Promo</span>
                </a>
            </li> --}}
            <li class="{{ (request()->segment(1) == 'transactions') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('transactions.index') }}">
                    <i class="fas fa-money-check-alt"></i> 
                    <span>Transaksi</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
@show