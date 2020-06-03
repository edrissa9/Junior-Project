@extends('layouts.app')

@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" style="margin-bottom:-5%">
            <ol class="breadcrumb">
                <li class="active"><a href="/account">Account</a></li>
            </ol>
        </div>
        @if(Session::has('status'))
          <div class="alert alert-danger"><p>{{session()->get('status')}}</p></div>
        @endif
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                </tr>
                </thead>
                <tbody>
                  @if(isset($line_items))
                    @foreach($line_items as $line_item)
                        <tr>
                            <td class="cart_product">
                                <img height="110px" width="110px" src="{{ \App\Models\Upload::find(\App\Models\ProductAvatar::where('product_id',$line_item->product_id)->first()->image)->path() }}" alt="">
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ \App\Models\Product::find($line_item->product_id)->name }}</a></h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_price">
                                <p>D{{ $line_item->unit_price }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                    <p>{!!$line_item->quantity!!}</p>

                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">D{{ $line_item->total_price}}</p>
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Cart Sub Total</td>
                                        <td>D{{ $cart->total_price }}</td>
                                    </tr>
                                    <tr class="shipping-cost">
                                        <td>Shipping Cost</td>
                                        <td>D{{$cart->tax}}</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><span>D{{ $cart->total_price + $cart->tax }}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                  @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
@stop
