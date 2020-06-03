@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/billinginfos') }}">BillingInfo</a> :
@endsection
@section("contentheader_description", $billinginfo->$view_col)
@section("section", "BillingInfos")
@section("section_url", url(config('laraadmin.adminRoute') . '/billinginfos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "BillingInfos Edit : ".$billinginfo->$view_col)

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
				{!! Form::model($billinginfo, ['route' => [config('laraadmin.adminRoute') . '.billinginfos.update', $billinginfo->id ], 'method'=>'PUT', 'id' => 'billinginfo-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'order_id')
					@la_input($module, 'user_id')
					@la_input($module, 'company')
					@la_input($module, 'email')
					@la_input($module, 'name')
					@la_input($module, 'address')
					@la_input($module, 'zip_code')
					@la_input($module, 'phone')
					@la_input($module, 'mobile_phone')
					@la_input($module, 'fax')
					@la_input($module, 'shipping_order')
					@la_input($module, 'shipping_to_billing')
					@la_input($module, 'payment_method')
					@la_input($module, 'country')
					@la_input($module, 'state')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/billinginfos') }}">Cancel</a></button>
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
	$("#billinginfo-edit-form").validate({
		
	});
});
</script>
@endpush
