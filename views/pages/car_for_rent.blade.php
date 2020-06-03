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
              <div class="product-details"><!--product-details-->
                <div class="col-sm-5">
                    <div class="product-information"><!--/product-information-->
                        <img src="/images/product-details/new.jpg" class="newarrival" alt="" />
                        <h2>{{ $car->name }}</h2>
                        <p>{!! $car->model !!}</p>
                        <img src="/images/product-details/rating.png" alt="" />
                        <span>
                          <span>GMD{{ $car->price_per_hour }}/hour</span>
                          <span>GMD{{ $car->price_per_day }}/day</span>
                          </span>
                        <p><b>Availability:</b> {{ $car->quantity }} left In Stock</p>
                        <p><b>Condition:</b> {!! $car->condition !!}</p>
                        <p><b>Brand:</b> sun-Creek</p>
                        <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                    </div><!--/product-information-->
                </div>
                  <div class="col-sm-7">
                      <div class="view-product">
                          <img src="{{ \App\Models\Upload::find(\App\Models\CarAvatar::where('carrentals_id',$car->id)->first()->avatar)->path() }}" height="250" alt="" />
                          <h3>ZOOM</h3>
                      </div>
                  </div>

              </div><!--/product-details-->
              <div class="recommended_items" style="margin-top:-5%"><!--recommended_items-->
                  <h2 class="title text-center">Process Car Rental</h2>
                  <div class="form-one" style="width:100%">
                    <form method="post" action="/process-car-rental">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <input type="hidden" name="car" value="{{$car->id}}">
                      <div class="chose_area">
                          <ul class="user_info">
                              <li class="single_field" style="width:40%">
                                  <label>Address:</label>
                                  <input type="text" name="address" placeholder="Address">
                              </li>
                              <li class="single_field">
                                  <label>Rental Duration:</label>
                                  <select name="duration">
                                    <option value="no_select">--Select Duration--</option>
                                      <option value="1 hour">1 Hour</option>
                                      <option value="2 hours">2 Hours</option>
                                      <option value="5 hours">5 Hours</option>
                                      <option value="10 hours">10 Hours</option>
                                      <option value="1 day">1 Day</option>
                                      <option value="2 days">2 Days</option>
                                      <option value="3 days">3 Days</option>
                                      <option value="1 week">1 Week</option>
                                      <option value="2 weeks">2 Weeks</option>
                                      <option value="3 weeks">3 Weeks</option>
                                      <option value="4 weeks">4 Weeks</option>
                                  </select>
                              </li>
                              <li class="single_field" style="width: 25%;">
                                  <label>Date Needed:</label>
                                  <input type="text" name="date_needed" placeholder="Date (year/month/day)">
                              </li>
                          </ul>
                          <button style="float:right;margin-right:2%" class="btn btn-default check_out" type="submit">Submit</button>
                      </div>
                    </form>
                  </div>
              </div><!--/recommended_items-->
            </div>
        </div>
    </div>
</section>


@stop
