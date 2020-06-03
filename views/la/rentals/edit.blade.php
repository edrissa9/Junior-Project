@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/rentals') }}">Rental</a> :
@endsection
@section("contentheader_description", $rental->$view_col)
@section("section", "Rentals")
@section("section_url", url(config('laraadmin.adminRoute') . '/rentals'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Rentals Edit : ".$rental->$view_col)

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
				{!! Form::model($rental, ['route' => [config('laraadmin.adminRoute') . '.rentals.update', $rental->id ], 'method'=>'PUT', 'id' => 'rental-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'user_id')
					@la_input($module, 'car_id')
					@la_input($module, 'address')
					@la_input($module, 'duration')
					@la_input($module, 'status')
					@la_input($module, 'date')
					@la_input($module, 'total_price')
					@la_input($module, 'discount')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/rentals') }}">Cancel</a></button>
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
	$("#rental-edit-form").validate({
		
	});
});
</script>
@endpush
