@extends('layouts.app')

@section('content')

<section id="advertisement">
    <div class="container">
        <img src="/images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach($departments as $department)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#{{$department->id}}">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        {{ $department->name }}
                                    </a>
                                </h4>
                            </div>
                            <div id="{{$department->id}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach($categories as $category)
                                        @if($category->department_id === $department->id)
                                        <li><a href="/category/{{$category->id}}"> {{ $category->name }} </a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Kids</a></h4>
                            </div>
                        </div>
                    </div><!--/category-productsr-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                          <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                              @foreach($brands as $brand)
                                <li><a href="/product/brand/{{$brand->brand}}"> <span class="pull-right">({{\App\Models\Product::where('brand',$brand->brand)->count()}})</span>{{$brand->brand}}</a></li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-6">
                        <div class="view-product">
                            <img src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$found_product->id)->first()->image)->path() }}" alt="" />
                            <h3>ZOOM</h3>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="product-information"><!--/product-information-->
                            <img src="/images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{ $found_product->name }}</h2>
                            <p>{!! $found_product->description !!}</p>
                            <img src="/images/product-details/rating.png" alt="" />
                            <span>
									<span>GMD{{ $found_product->price }}</span>
									<label>Quantity:</label>
									<input type="text" value="1" name="quantity"/>
									<button onclick="addToCart('{{$found_product->id}}','{{csrf_token()}}')" type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                            <p><b>Availability:</b> {{ $found_product->quantity }} left In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> sun-Creek</p>
                            <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#first" onclick="loadCategoryNav({{ $tab_cat1->id }})" data-toggle="tab">{{ $tab_cat1->name }}</a></li>
                            @foreach($tab_cats as $cat)
                            <li class=""><a href="#{{ $cat->id }}" onclick="loadCategoryNav({{ $cat->id }})" data-toggle="tab">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="first" >
                            @foreach($tab1_cat_products as $tab_p)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="/product/{{$tab_p->id}}"><img src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$tab_p->id)->first()->image)->path() }}" alt="" /></a>
                                            <h2>D{{ $tab_p->price }}</h2>
                                            <p>{{ $tab_p->name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                @foreach($recommended_first_slide as $p)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="/product/{{$p->id}}"><img src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$p->id)->first()->image)->path() }}" alt="" /></a>
                                                <h2>D{{ $p->price }}</h2>
                                                <p>{{ $p->name }}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="item">
                                @foreach($recommended_second_slide as $p)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="/product/{{$p->id}}"><img src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$p->id)->first()->image)->path() }}" alt="" /></a>
                                                <h2>D{{ $p->price }}</h2>
                                                <p>{{ $p->name }}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="item">
                                @foreach($recommended_third_slide as $p)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="/product/{{$p->id}}"><img src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$p->id)->first()->image)->path() }}" alt="" /></a>
                                                <h2>D{{ $p->price }}</h2>
                                                <p>{{ $p->name }}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

@stop
