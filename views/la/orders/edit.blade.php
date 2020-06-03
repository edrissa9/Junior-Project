@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/orders') }}">Order</a> :
@endsection
@section("contentheader_description", $order->$view_col)
@section("section", "Orders")
@section("section_url", url(config('laraadmin.adminRoute') . '/orders'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Orders Edit : ".$order->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($order, ['route' => [config('laraadmin.adminRoute') . '.orders.update', $order->id ], 'method'=>'PUT', 'id' => 'order-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'order_id')
					@la_input($module, 'cart_id')
					@la_input($module, 'date')
					@la_input($module, 'address')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/orders') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#order-edit-form").validate({
		
	});
});
</script>
@endpush
