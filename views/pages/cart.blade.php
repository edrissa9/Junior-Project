@extends('layouts.app')

@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" style="margin-bottom:-5%">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        @if(isset($status))
          <div class="alert alert-danger"><p>{{$status}}</p></div>
        @endif
        @if(isset($line_items))
        <div class="table-responsive cart_info">
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
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="#/" onclick="addQuantity('{{ $line_item->id }}','{{csrf_token()}}')"> + </a>
                                    <input class="cart_quantity_input" id="quantityOf{!!$line_item->id!!}" type="text" name="quantity" value="{{$line_item->quantity}}" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href="#/" onclick="subtractQuantity('{{ $line_item->id }}','{{csrf_token()}}')"> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">D{{ $line_item->total_price}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="/cart/delete-item/{{$line_item->id}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @endif
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
  @if(isset($cart))
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <!-- <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p> -->
        </div>
        <div class="row">
          <div class="col-sm-6">
              <div class="total_area">
                  <ul>
                      <li>Cart Sub Total <span>D{{ $cart->total_price }}</span></li>
                      <li>Total <span>D{{ $cart->total_price }}</span></li>
                  </ul>
                  <a class="btn btn-default update" href="/cart">Update</a>

              </div>
          </div>
            <div class="col-sm-6">
              <form method="post" action="/check-out">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="chose_area">
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select name="country">
                                <option value="no_select">--Select Country--</option>
                                <option value="gmb">Gambia</option>
                                <option value="sen">Senegal</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select name="region">
                              <option value="no_select">--Select Region--</option>
                                <option value="g_b">Greater Banjul</option>
                                <option value="w_c_r">West Coast Region</option>
                                <option value="u_r_r">Upper River Region</option>
                                <option value="l_r_r">Lower River Region</option>
                                <option value="dk">Dakar</option>
                            </select>

                        </li>
                    </ul>
                    <button class="btn btn-default check_out" type="submit">Check Out</button>
                </div>
              </form>
            </div>
        </div>
    </div>
  @endif
</section><!--/#do_action-->
@stop
