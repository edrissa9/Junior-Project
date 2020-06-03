@extends('layouts.app')

@section('content')

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>sun</span>-Creek</h1>
                                <h2>Rent a Car anytime, anywhere</h2>
                                <p>We do all type of car rentals. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/sc1.jpg" class="girl img-responsive" alt="" />
                                <img src="/images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>sun</span>-Creek</h1>
                                <h2>Deliveries anytime, anywhere</h2>
                                <p>We delivery your product within Gambia and Senegal. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/sc2.png" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>sun</span>-Creek</h1>
                                <h2>Get your groceries</h2>
                                <p>Buy all your groceries and get them delivered to your door steps </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/sc15.png" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

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
                    </div><!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                              @foreach($brands as $brand)
                                <li><a href="/product/brand/{{$brand->brand}}"> <span class="pull-right">({{\App\Models\Product::where('brand',$brand->brand)->count()}})</span>{{$brand->brand}}</a></li>
                              @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img height="198px" src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$product->id)->first()->image)->path() }}" alt="" />
                                        <h2>D{{ $product->price }}</h2>
                                        <p>{{ $product->name }}</p>
                                        <a href="#/" class="btn btn-default add-to-cart" onclick="addToCart('{{$product->id}}','{{csrf_token()}}')"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <a href="/product/{{$product->id}}"class="btn btn-default add-to-cart"><i class="fa fa-eye"></i> Details</a>
                                            <h2>D{{ $product->price }}</h2>
                                            <p>{{ $product->name }}</p>
                                            <a href="#/" class="btn btn-default add-to-cart" onclick="addToCart('{{$product->id}}','{{csrf_token()}}')"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#/"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#/"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div><!--features_items-->

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
                                                <a href="/product/{{$tab_p->id}}"><img height="198px" src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$tab_p->id)->first()->image)->path() }}" alt="" /></a>                                                <h2>D{{ $tab_p->price }}</h2>
                                                <p>{{ $tab_p->name }}</p>
                                                <a href="#/" onclick="addToCart('{{$tab_p->id}}','{{csrf_token()}}')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                                                <a href="/product/{{$p->id}}"> <img height="200px" src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$p->id)->first()->image)->path() }}" alt="" /></a>
                                                <h2>D{{ $p->price }}</h2>
                                                <p>{{ $p->name }}</p>
                                                <a href="#/" onclick="addToCart('{{$p->id}}','{{csrf_token()}}')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                                                <a href="/product/{{$p->id}}"> <img height="200px" src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$p->id)->first()->image)->path() }}" alt="" /></a>
                                                <h2>D{{ $p->price }}</h2>
                                                <p>{{ $p->name }}</p>
                                                <a href="#/" onclick="addToCart('{{$p->id}}','{{csrf_token()}}')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                                                <a href="/product/{{$p->id}}"> <img height="200px" src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$p->id)->first()->image)->path() }}" alt="" /></a>
                                                <h2>D{{ $p->price }}</h2>
                                                <p>{{ $p->name }}</p>
                                                <a href="#/" onclick="addToCart('{{$p->id}}','{{csrf_token()}}')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
