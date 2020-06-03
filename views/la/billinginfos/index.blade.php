@extends("la.layouts.app")

@section("contentheader_title", "BillingInfos")
@section("contentheader_description", "BillingInfos listing")
@section("section", "BillingInfos")
@section("sub_section", "Listing")
@section("htmlheader_title", "BillingInfos Listing")

@section("headerElems")
@la_access("BillingInfos", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add BillingInfo</button>
@endla_access
@endsection

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

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("BillingInfos", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add BillingInfo</h4>
			</div>
			{!! Form::open(['action' => 'LA\BillingInfosController@store', 'id' => 'billinginfo-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
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
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/billinginfo_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#billinginfo-add-form").validate({
		
	});
});
</script>
@endpush
