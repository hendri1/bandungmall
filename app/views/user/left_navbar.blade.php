<!--left column-->
<div class="col-lg-3 col-md-3 col-sm-12">
    <div class="panel-group" id="accordionNo">
        <!--Category-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-toggle="collapse" href="#collapseCategory"
                                           class="collapseWill active ">
                    <span class="pull-left"> <i class="fa fa-caret-right"></i></span> Category </a></h4>
            </div>
            <div id="collapseCategory" class="panel-collapse collapse in">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked tree">
                        @foreach ($data_category_parent as $key=>$parent)
                        <li class="active dropdown-tree open-tree"><a class="dropdown-tree-a"> {{ $parent->name }} </a>
                                <ul class="category-level-2 dropdown-menu-tree">
                                @foreach ($data_category_child as $child)
                                    @if ($child->parent === $parent->id)
                                        <li class="dropdown-tree"><a class="dropdown-tree-a" href="{{ URL::to('product?category_id=' . $child->id) }}">{{ $child->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
			<div class="panel panel-default">
			
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapseColor"
                                                   class="collapseWill active ">
                            Color <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                    </div>
                    <div id="collapseColor" class="panel-collapse collapse in">
                        <div class="panel-body smoothscroll maxheight300 color-filter">
                            <div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Hitam' ) }}">
                                    <small style="background-color:#333333"></small>
                                    Hitam  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Biru' ) }}">
                                    <small style="background-color:#1664c4"></small>
                                    Biru  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Merah' ) }}">
                                    <small style="background-color:#c00707"></small>
                                    Merah  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Hijau' ) }}">
                                    <small style="background-color:#6fcc14"></small>
                                    Hijau  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Coklat' ) }}">
                                    <small style="background-color:#943f00"></small>
                                    Coklat  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Pink' ) }}">
                                    <small style="background-color:#ff1cae"></small>
                                    Pink  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Abu' ) }}">
                                    <small style="background-color:#adadad"></small>
                                    Abu  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Ungu' ) }}">
                                    <small style="background-color:#5d00dc"></small>
                                    Ungu  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Kuning' ) }}">
                                    <small style="background-color:#f1f40e"></small>
                                    Kuning  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Orange' ) }}">
                                    <small style="background-color:#ffc600"></small>
                                    Orange  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Biru' ) }}">
                                    <small style="background-color:#0a43a3"></small>
                                    Biru  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Silver' ) }}">
                                    <small style="background-color:#ecf1ef"></small>
                                    Silver  </a>
                            </div>
							<div class="block-element">
                                <a class="dropdown-tree-a" href="{{ URL::to('product?search=Putih' ) }}">
                                    <small style="background-color:#f3f1e7"></small>
                                    Putih  </a>
                            </div>
                            <div class="block-element">
                                <label> &nbsp; </label>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapsePrice"
                                                   class="collapseWill active ">
                            Price<span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                    </div>
                    <div id="collapsePrice" class="panel-collapse collapse in">
                        <div class="panel-body smoothscroll maxheight300 color-filter">
                        	<form action="{{ URL::to('product?' ) }}" id="formPrice">
				<div class="block-element">
                                    <input type="radio" value="asc" id="price" name="price" {{isset($price) && $price == 'asc' ? 'checked':''}}><span>Lowest</span>
                            	</div>	
                            	<div class="block-element">
                                    <input type="radio" value="desc" id="price" name="price" {{isset($price) && $price == 'desc' ? 'checked':''}}><span>Highest</span>
                            	</div>	
	
				<div style="margin-top:20px;">
				 	<div>
				        	<input class="btn  btn-block btn-lg btn-primary" value="FILTER" type="submit" style="width: 100px; padding: 0px; height: 30px;">
				        </div>
				</div>
                            	</form>	
                            <div class="block-element">
                                <label> &nbsp; </label>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapseDate"
                                                   class="collapseWill active ">
                            Order by Date<span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                    </div>
                    <div id="collapseDate" class="panel-collapse collapse in">
                        <div class="panel-body smoothscroll maxheight300 color-filter">
                        	<form action="{{ URL::to('product?' ) }}" id="formDate">
				<div class="block-element">
                                    <input type="radio" value="desc" id="date" name="date" {{isset($date) && $date== 'desc' ? 'checked':''}}><span>Newest</span>
                            	</div>	
                            	<div class="block-element">
                                    <input type="radio" value="asc" id="date" name="date" {{isset($date) && $date== 'asc' ? 'checked':''}}><span>Oldest</span>
                            	</div>	
	
				<div style="margin-top:20px;">
				 	<div>
				        	<input class="btn  btn-block btn-lg btn-primary" value="FILTER" type="submit" style="width: 100px; padding: 0px; height: 30px;">
				        </div>
				</div>
                            	</form>	
                            <div class="block-element">
                                <label> &nbsp; </label>
                            </div>
                        </div>
                    </div>
<div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapseSale"
                                                   class="collapseWill active ">
                            Order by Sale<span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                    </div>
                    <div id="collapseSale" class="panel-collapse collapse in">
                        <div class="panel-body smoothscroll maxheight300 color-filter">
                        	<form action="{{ URL::to('product?' ) }}" id="formSale">
				<div class="block-element">
                                    <input type="radio" value="desc" id="sale" name="sale" {{isset($sale) && $sale== 'desc' ? 'checked':''}}><span>Biggest</span>
                            	</div>	
                            	<div class="block-element">
                                    <input type="radio" value="asc" id="sale" name="sale" {{isset($sale) && $sale== 'asc' ? 'checked':''}}><span>Cheappest</span>
                            	</div>	
	
				<div style="margin-top:20px;">
				 	<div>
				        	<input class="btn  btn-block btn-lg btn-primary" value="FILTER" type="submit" style="width: 100px; padding: 0px; height: 30px;">
				        </div>
				</div>
                            	</form>	
                            <div class="block-element">
                                <label> &nbsp; </label>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
