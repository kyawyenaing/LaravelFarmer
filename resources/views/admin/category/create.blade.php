@extends('layouts/admin')

@section('content')

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h4>All Categories</h4>
			</div>
			<div class="x_content">
				<br/>

				<form action="{{ url('/admin/category') }}" method="post" class="form-horizontal col-md-8">
					<!-- <input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="parent" value="0">
 -->
 					{{ csrf_field() }}
 					
					<div class="form-group">
						<label for="Name" class="control-label col-md-3 col-xs-12 col-sm-4">Name :</label>
						<div class="col-md-9 col-sm-8 col-xs-12">
							<input type="text" name="name" class="form-control" value="{{ old('name') }}">
							<div class="text-danger">{{ $errors->first('name') }}</div>
						</div>
					</div>

					<div class="form-group">
						<label for="remark" class="control-label col-md-3 col-xs-12 col-sm-4">Remark :</label>
						<div class="col-md-9 col-sm-8 col-xs-12">
							<textarea name="remark" id="summernote" class="form-control">{{ old('remark') }}</textarea>
							<div class="text-danger">{{ $errors->first('remark') }}</div>
						</div>
					</div>

					<div class="form-group">
			            <div class="col-sm-9 col-md-offset-3">
			                <button class="btn btn-info"><span class="glyphicon glyphicon-save"></span>&nbsp;<span>Save</span></button>
			                <a href="{{ url('admin/category') }}" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;<span>Back</span></a>
			            </div>
		            </div>

				</form>

			</div>
		</div>
	</div>
</div>

@endsection
