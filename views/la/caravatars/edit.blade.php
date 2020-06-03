@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/caravatars') }}">CarAvatar</a> :
@endsection
@section("contentheader_description", $caravatar->$view_col)
@section("section", "CarAvatars")
@section("section_url", url(config('laraadmin.adminRoute') . '/caravatars'))
@section("sub_section", "Edit")

@section("htmlheader_title", "CarAvatars Edit : ".$caravatar->$view_col)

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
				{!! Form::model($caravatar, ['route' => [config('laraadmin.adminRoute') . '.caravatars.update', $caravatar->id ], 'method'=>'PUT', 'id' => 'caravatar-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'carrentals_id')
					@la_input($module, 'avatar')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/caravatars') }}">Cancel</a></button>
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
	$("#caravatar-edit-form").validate({
		
	});
});
</script>
@endpush
