@extends('layouts.app')

@section('content')

<section id="advertisement">
    <div class="container">
        <img src="/images/sc1.jpg" height="150" alt="" />
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
                </div>
            </div>

            <div class="col-sm-9 padding-right">
              @if(Session::has('status'))
                <div class="alert alert-success"><p>{{Session::get('status')}}</p></div>
              @endif
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Car Rental Features Cars</h2>
                    @foreach($car_rentals as $car_rental)
                    <div class="col-sm-6">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">

                                    <img src="{{ \App\Models\Upload::find(\App\Models\CarAvatar::where('carrentals_id',$car_rental->id)->first()->avatar)->path() }}" height="250" alt="" />

                                    <h2>D{{ $car_rental->price_per_hour }}/hour</h2>
                                    <h2>D{{ $car_rental->price_per_day }}/day</h2>
                                    <p>{{ $car_rental->name }} {{ $car_rental->model }}</p>
                                    <a href="/rent-car/{{$car_rental->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Rent Now!</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="/car-rentals/car-for-rent/{{$car_rental->id}}"class="btn btn-default add-to-cart"><i class="fa fa-eye"></i> Details</a>
                                        <h2>D{{ $car_rental->price_per_hour }}/hour</h2>
                                        <h2>D{{ $car_rental->price_per_day }}/day</h2>
                                        <p>{{ $car_rental->name }}  {{ $car_rental->model }}</p>

                                        <a href="/rent-car/{{$car_rental->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Rent Now!</a>
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
            </div>
        </div>
    </div>
</section>


@stop
