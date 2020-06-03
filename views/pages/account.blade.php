@extends('layouts.app')

@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" style="margin-bottom:-5%">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Account</li>
            </ol>
        </div>
        @if(Session::has('status'))
          <div class="alert alert-danger"><p>{{session()->get('status')}}</p></div>
        @endif
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Total Price (GMD)</td>
                    <td class="price">Total Discount (GMD)</td>
                    <td class="quantity">Shipping Fee (GMD)</td>
                    <td class="quantity">Total (GMD)</td>
                    <td class="total">Status</td>
                    <td>Items</td>
                </tr>
                </thead>
                <tbody>
                  @if(isset($carts))
                    @foreach($carts as $cart)
                        <tr>
                            <td class="cart_product">
                                <h4><a href="">{{ $cart->total_price }}</a></h4>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $cart->total_discount }}</a></h4>
                            </td>
                            <td class="cart_price">
                                <h4>{{ $cart->tax }}</h4>
                            </td>
                            <td class="cart_price">
                                <h4>{{ $cart->total_price + $cart->tax }}</h4>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                  @if(\App\Models\Order::where('cart_id',$cart->id)->first()->status == 'complete')
                                    <span style="color:green">{{\App\Models\Order::where('cart_id',$cart->id)->first()->status}}</span>
                                  @elseif(\App\Models\Order::where('cart_id',$cart->id)->first()->status == 'in progress')
                                    <span>{{\App\Models\Order::where('cart_id',$cart->id)->first()->status}}</span>
                                  @elseif(\App\Models\Order::where('cart_id',$cart->id)->first()->status == 'pending')
                                    <span style="color:red">{{\App\Models\Order::where('cart_id',$cart->id)->first()->status}}</span>
                                  @endif</p>
                            </td>
                            <td class="cart_delete" style="text-align: center">
                                <a class="cart_quantity_delete" href="/order/line-items/{{$cart->id}}"><i class="fa fa-check"></i></a>
                            </td>
                        </tr>
                    @endforeach
                  @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
@stop
