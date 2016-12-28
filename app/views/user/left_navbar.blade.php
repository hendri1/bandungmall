          <!--======= SIDE BAR =========-->
          <div class="col-sm-3 animate fadeInLeft" data-wow-delay="0.2s">
            <div class="side-bar">
              <h4>Filter by</h4>

              <!-- HEADING -->
              <div class="heading">
                <h6>CATEGORIES</h6>
              </div>
              
              <!-- CATEGORIES -->
              <ul class="cate">
              @foreach ($data_category_parent as $key=>$parent)
                <li class="drop-menu"><a class="title collapsed" data-toggle="collapse" data-target="#category{{ $parent->id }}"> {{ $parent->name }} </a>
                  <div class="collapse" id="category{{ $parent->id }}">
                    <div class="well">
                      <ul>
                      @foreach ($data_category_child as $child)
                        @if ($child->parent === $parent->id)
                          <li><a href="{{ URL::to('product?category_id=' . $child->id) }}">{{ $child->name }}</a></li>
                        @endif
                      @endforeach
                      </ul>
                    </div>
                  </div>
                </li>
              @endforeach
              </ul>

              <!-- HEADING -->
              <div class="heading">
                <h6>COLOR</h6>
              </div>
              
              <!-- COLORE -->
              <ul class="cate">
                <li>
                  <a href="{{ URL::to('product?search=Hitam') }}">
                    <small style="background-color:#333333;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Hitam
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Biru') }}">
                    <small style="background-color:#1664c4;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Biru
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Merah') }}">
                    <small style="background-color:#c00707;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Merah
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Hijau') }}">
                    <small style="background-color:#6fcc14;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Hijau
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Coklat') }}">
                    <small style="background-color:#943f00;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Coklat
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Pink') }}">
                    <small style="background-color:#ff1cae;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Pink
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Abu') }}">
                    <small style="background-color:#adadad;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Abu
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Ungu') }}">
                    <small style="background-color:#5d00dc;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Ungu
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Kuning') }}">
                    <small style="background-color:#f1f40e;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Kuning
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Orange') }}">
                    <small style="background-color:#ffc600;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Orange
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Biru') }}">
                    <small style="background-color:#0a43a3;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Biru
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Silver') }}">
                    <small style="background-color:#ecf1ef;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Silver
                  </a>
                </li>
                <li>
                  <a href="{{ URL::to('product?search=Putih') }}">
                    <small style="background-color:#f3f1e7;padding:2px 9px;margin-right:8px;border-radius:20px"></small>
                    Putih
                  </a>
                </li>
              </ul>

              <!-- HEADING -->
              <div class="heading">
                <h6>PRICE</h6>
              </div>
              <!-- PRICE -->
              <div>
                <a href="{{ URL::to('product?price=asc') }}" class="btn btn-small btn-dark" >FILTER FROM LOWEST</a>
                <a href="{{ URL::to('product?price=desc') }}" class="btn btn-small btn-dark" >FILTER FROM HIGHEST</a> 
              </div>

              <!-- HEADING -->
              <div class="heading">
                <h6>DATE</h6>
              </div>
              <!-- DATE -->
              <div>
                <a href="{{ URL::to('product?date=desc') }}" class="btn btn-small btn-dark" >FILTER FROM NEWEST</a>
                <a href="{{ URL::to('product?date=asc') }}" class="btn btn-small btn-dark" >FILTER FROM OLDEST</a> 
              </div>

              <!-- HEADING -->
              <div class="heading">
                <h6>SALE</h6>
              </div>
              <!-- SALE -->
              <div>
                <a href="{{ URL::to('product?sale=desc') }}" class="btn btn-small btn-dark" >FILTER FROM BIGEST</a>
                <a href="{{ URL::to('product?sale=asc') }}" class="btn btn-small btn-dark" >FILTER FROM SMALLEST</a> 
              </div>

            </div>
          </div>