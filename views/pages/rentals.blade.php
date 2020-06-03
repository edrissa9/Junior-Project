@extends('layouts.app')

@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" style="margin-bottom:-5%">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Rentals</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Car</td>
                    <td class="price">Address</td>
                    <td class="quantity">Duration</td>
                    <td class="quantity">Date</td>
                    <td class="quantity">Total (GMD)</td>
                    <td class="total">Status</td>
                </tr>
                </thead>
                <tbody>
                  @if(isset($rentals))
                    @foreach($rentals as $rental)
                        <tr>
                            <td class="cart_product">
                                <h4><a>{{ \App\Models\CarRental::find($rental->car_id)->name }}
                                {{ \App\Models\CarRental::find($rental->car_id)->model }}</a></h4>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $rental->address }}</a></h4>
                            </td>
                            <td class="cart_price">
                                <h4>{{ $rental->duration }}</h4>
                            </td>
                            <td class="cart_price">
                                <h4>{{ $rental->date }}</h4>
                            </td>
                            <td class="cart_price">
                                <h4>{{ $rental->total_price }}</h4>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                  @if($rental->status == 'accepted')
                                    <span style="color:green">{{$rental->status}}</span>
                                  @elseif($rental->status == 'evaluation')
                                    <span>{{$rental->status}}</span>
                                  @elseif($rental->status == 'pending')
                                    <span style="color:red">{{$rental->status}}</span>
                                  @endif</p>
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
