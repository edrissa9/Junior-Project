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
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">{{ $found_category->name }} Features Items</h2>
                    @if(count($products) == 0)
                        <div class="alert alert-info">
                            <h2 class="text-center">NO PRODUCTS IN THIS CATEGORY</h2>
                        </div>
                    @endif
                    @foreach($products as $product)
                        <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img height="200" src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$product->id)->first()->image)->path() }}" alt="" />
                                    <h2>D{{ $product->price }}</h2>
                                    <p>{{ $product->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="/product/{{$product->id}}"class="btn btn-default add-to-cart"><i class="fa fa-eye"></i> Details</a>
                                            <h2>D{{ $product->price }}</h2>
                                            <p>{{ $product->name }}</p>

                                        <a href="#/" onclick="addToCart('{{$product->id}}','{{csrf_token()}}')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                    @if(count($products) == 9)
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="pagination">
                                <li class="active"><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

@stop
