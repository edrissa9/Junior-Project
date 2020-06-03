@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/lineitems') }}">LineItem</a> :
@endsection
@section("contentheader_description", $lineitem->$view_col)
@section("section", "LineItems")
@section("section_url", url(config('laraadmin.adminRoute') . '/lineitems'))
@section("sub_section", "Edit")

@section("htmlheader_title", "LineItems Edit : ".$lineitem->$view_col)

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
				{!! Form::model($lineitem, ['route' => [config('laraadmin.adminRoute') . '.lineitems.update', $lineitem->id ], 'method'=>'PUT', 'id' => 'lineitem-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'product_id')
					@la_input($module, 'cart_id')
					@la_input($module, 'quantity')
					@la_input($module, 'unit_price')
					@la_input($module, 'discount')
					@la_input($module, 'total_price')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/lineitems') }}">Cancel</a></button>
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
	$("#lineitem-edit-form").validate({
		
	});
});
</script>
@endpush
