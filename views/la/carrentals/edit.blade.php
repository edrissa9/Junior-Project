@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/carrentals') }}">CarRental</a> :
@endsection
@section("contentheader_description", $carrental->$view_col)
@section("section", "CarRentals")
@section("section_url", url(config('laraadmin.adminRoute') . '/carrentals'))
@section("sub_section", "Edit")

@section("htmlheader_title", "CarRentals Edit : ".$carrental->$view_col)

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
				{!! Form::model($carrental, ['route' => [config('laraadmin.adminRoute') . '.carrentals.update', $carrental->id ], 'method'=>'PUT', 'id' => 'carrental-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'model')
					@la_input($module, 'price_per_hour')
					@la_input($module, 'price_per_day')
					@la_input($module, 'condition')
					@la_input($module, 'quantity')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/carrentals') }}">Cancel</a></button>
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
	$("#carrental-edit-form").validate({
		
	});
});
</script>
@endpush
