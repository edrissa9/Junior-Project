@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/categorydepartments') }}">CategoryDepartment</a> :
@endsection
@section("contentheader_description", $categorydepartment->$view_col)
@section("section", "CategoryDepartments")
@section("section_url", url(config('laraadmin.adminRoute') . '/categorydepartments'))
@section("sub_section", "Edit")

@section("htmlheader_title", "CategoryDepartments Edit : ".$categorydepartment->$view_col)

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
				{!! Form::model($categorydepartment, ['route' => [config('laraadmin.adminRoute') . '.categorydepartments.update', $categorydepartment->id ], 'method'=>'PUT', 'id' => 'categorydepartment-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/categorydepartments') }}">Cancel</a></button>
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
	$("#categorydepartment-edit-form").validate({
		
	});
});
</script>
@endpush
