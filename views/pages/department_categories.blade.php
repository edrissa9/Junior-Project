@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#first" onclick="loadCategoryNav({{ $tab_cat1->id }},'{{ csrf_token() }}')" data-toggle="tab">{{ $tab_cat1->name }}</a></li>
            @foreach($tab_cats as $cat)
            <li class=""><a href="#{{ $cat->id }}" onclick="loadCategoryNav({{ $cat->id }},'{{ csrf_token() }}')" data-toggle="tab">{{ $cat->name }}</a></li>
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
                            <a href="/product/{{$tab_p->id}}"><img height="200px" src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$tab_p->id)->first()->image)->path() }}" alt="" /></a>
                            <h2>D{{ $tab_p->price }}</h2>
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
        </div>
    </div>
</section>

@stop