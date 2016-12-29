<!-- Header -->
  <header class="header-style-2"> 
    <!-- Top Bar -->
    <div class="top-bar">
      <div class="container"> 
        <!-- Language -->
        <div class="language"> <a href="{{ URL::to('help') }}">BANTUAN</a></div>
        <div class="top-links">
          <ul>            
            @if (!Auth::check())
            <li><a href="#" data-toggle="modal" data-target="#ModalLogin"> <span class="hidden-xs">Login</span><i class="glyphicon glyphicon-log-in hide visible-xs "></i> </a></li>
            <li class="hidden-xs"><a href="#" data-toggle="modal" data-target="#ModalSignup"> Register </a></li>
            @else
            <li><a href="{{ URL::to('user/myAccount') }}">{{ Auth::user()->first_name. ' ' . Auth::user()->last_name }}</a></li>
            <li><a href="{{ URL::to('user/doLogout') }}">Logout <i class="fa fa-sign-out"></i></a></li>
            @endif
          </ul>
        </div>
      </div>
    </div>
    
    <!-- Logo -->
    <div class="container">
      <div class="logo"> <a href="{{ URL::to('/') }}"> <img src="{{ asset('public/assets/common/images/logo-large.png') }}" alt="Bandungmall.co.id"> </a> </div>
      </div>
      
         <div class="sticky">
      <div class="container">

      <!-- Nav -->
      <!-- Nav -->
        <nav class="webimenu"> 
          <!-- MENU BUTTON RESPONSIVE -->
          <div class="menu-toggle"> <i class="fa fa-bars"> </i> </div>
          <ul class="ownmenu">

          <li><a href="#.">WANITA <b class="caret"> </b></a>
            <ul class="dropdown">
              @foreach ($data_category_child as $child)
                @if ($child->parent === 1)
                  <li><a href="{{ URL::to('product?category_id=' . $child->id) }}">{{ $child->name }}</a></li>
                @endif
              @endforeach
            </ul>
          </li>

          <li><a href="#.">PRIA <b class="caret"> </b></a>
            <ul class="dropdown">
              @foreach ($data_category_child as $child)
                @if ($child->parent === 2)
                  <li><a href="{{ URL::to('product?category_id=' . $child->id) }}">{{ $child->name }}</a></li>
                @endif
              @endforeach
            </ul>
          </li>

          <li class="meganav"><a href="#.">ALL CATEGORIES <b class="caret"> </b></a> 
              <!--======= MEGA MENU =========-->
              <ul class="megamenu full-width">
                <li class="row nav-post">
                @foreach ($data_category_parent as $key=>$parent)
                  <div class="col-sm-3">
                    <h6>{{ $parent->name }}</h6>
                    <ul>
                    @foreach ($data_category_child as $child)
                      @if ($child->parent === $parent->id)
                          <li><a href="{{ URL::to('product?category_id=' . $child->id) }}">{{ $child->name }}</a></li>
                      @endif
                    @endforeach
                    </ul>
                  </div>
                @endforeach
                </li>
              </ul>
          </li>
          
          <!--======= Shopping Cart =========-->
          <li class="shop-cart"><a href="{{ URL::to('cart') }}"><i class="fa fa-shopping-cart"></i></a> 
            <span class="numb">
              @if(Session::has('cartQty'))
                {{Session::get('cartQty')}}
              @else
                0
              @endif
            </span>
            <ul class="dropdown">
              <li>
                @if(Session::has('cartQty'))
                    Terdapat {{Session::get('cartQty')}} barang dalam Cart<br>
                @else
                    <span style="color:#fff">Cart masih kosong</span>
                @endif
              </li>
            </ul>
          </li>
          <!--======= SEARCH ICON =========-->
          <li class="search-nav"><a href="#" class="search-trigger" data-toggle="modal" data-target="#ModalSearch"><i class="fa fa-search"></i></a></li>
        </ul>
      </nav>
    </div>
  </div>
</header>
<!-- Header End -->
