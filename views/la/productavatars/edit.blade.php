@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/productavatars') }}">ProductAvatar</a> :
@endsection
@section("contentheader_description", $productavatar->$view_col)
@section("section", "ProductAvatars")
@section("section_url", url(config('laraadmin.adminRoute') . '/productavatars'))
@section("sub_section", "Edit")

@section("htmlheader_title", "ProductAvatars Edit : ".$productavatar->$view_col)

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
				{!! Form::model($productavatar, ['route' => [config('laraadmin.adminRoute') . '.productavatars.update', $productavatar->id ], 'method'=>'PUT', 'id' => 'productavatar-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'product_id')
					@la_input($module, 'image')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/productavatars') }}">Cancel</a></button>
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
	$("#productavatar-edit-form").validate({
		
	});
});
</script>
@endpush
