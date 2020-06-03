@extends('layouts.app')

@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" style="margin-bottom:-5%">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div id="checkOutCartPane" class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
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
                    <td class="cart_price">
<!--                        <div class="cart_quantity_button">-->
<!--                            <a class="cart_quantity_up" href="#/" onclick="addQuantity('{{ $line_item->id }}','{{csrf_token()}}')"> + </a>-->
                            <p>{{$line_item->quantity}}</p>
<!--                            <a class="cart_quantity_down" href="#/" onclick="subtractQuantity('{{ $line_item->id }}','{{csrf_token()}}')"> - </a>-->
<!--                        </div>-->
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">D{{ $line_item->total_price}}</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="/cart/delete-item/{{$line_item->id}}"><i class="fa fa-times"></i></a>
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
                                <td>Shipping Cost, {{$tax_rate}}%</td>
                                <td>D{{$cart->tax}}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><span>D{{ $cart->total_price + $cart->tax }}</span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr><td colspan="4">&nbsp;</td><td><a class="btn btn-default check_out" href="#" onclick="billing()" style="float: right"><i class="fa fa-arrow-circle-o-right"></i> Billing</a></td></tr>
                </tbody>
            </table>
        </div>
        <div id="checkOutCartOptionPane" class="payment-options">

        </div>


        <div class="shopper-informations" style="display: none; margin-bottom: 10%">
            <div class="row">
                <div id="billingStatus" style="display:none" class="alert alert-danger"><p>Please fill in all the fields!</p></div>
                <div class="col-sm-8 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form>
                                <input id="company_name" type="text" placeholder="Company Name">
                                <input id="email" required type="text" placeholder="Email *">
                                <input id="name" required type="text" placeholder="Name *">
                                <input id="address" required type="text" placeholder="Address *">
                            </form>
                        </div>
                        <div class="form-two">
                            <form>
                                <input required id="zip_code" type="text" placeholder="Zip / Postal Code *">
                                <input required id="phone" type="text" placeholder="Phone *">
                                <input required id="mobile_phone" type="text" placeholder="Mobile Phone">
                                <input id="fax" type="text" placeholder="Fax">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea required id="message" name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="9"></textarea>
                        <label><input type="checkbox" class="shipping_to_billing" value="checked"> Shipping to bill address</label>
                    </div>
                </div>
            </div>
            <div id="checkOutCartOptionPane" class="payment-options">
                <span>Payment Options: </span>
                <span>
                    <label><input class="paymentMethod" value="master_visa_card" type="checkbox"> Master / Visa Card</label>
                </span>
                <span>
                    <label><input class="paymentMethod" value="paypal" type="checkbox"> Paypal</label>
                </span>
                <a class="btn btn-default check_out" href="#" onclick="checkOut('{{ $cart->id }}','{{ $cart->total_price }}','{{csrf_token()}}')" style="float: right;"><i class="fa fa-arrow-circle-o-right"></i> Check Out</a>
            </div>
        </div>
    </div>
</section> <!--/#cart_items-->
@stop
