<aside class="navbar-aside" id="offcanvas_aside">
      <div class="aside-top"><a class="brand-wrap" href="{{ route('dashboard') }}"><img class="logo" src="{{ asset('dash/assets/imgs/theme/logo.svg') }}" alt="Evara Dashboard"></a>
        <div>
          <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
        </div>
      </div>
      <nav>
        <ul class="menu-aside">
          {{-- Dashboard --}}
          <li class="menu-item active"><a class="menu-link" href="{{ route('dashboard') }}"><i class="icon material-icons md-home"></i><span class="text">Dashboard</span></a></li>
          
          {{-- Products --}}
          <li class="menu-item">
            <a class="menu-link" href="{{ route('products.index') }}">
              <i class="icon material-icons md-shopping_bag"></i>
              <span class="text">Products</span>
            </a>
          </li>
          
          {{-- Categories --}}
          <li class="menu-item">
            <a class="menu-link" href="{{ route('categories.index') }}">
              <i class="icon material-icons md-category"></i>
              <span class="text">Categories</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>