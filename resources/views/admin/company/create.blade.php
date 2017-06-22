@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<div class="x_title">
					<h4>Create A New Company</h4>
				</div>
				<div class="x_content">
					<form action="{{ url('/admin/company') }}" method="post" class="form-horizontal col-md-8">
					{{csrf_field()}}
					<div class="form-group">
						<label for="name" class="control-lable col-md-3 col-xs-12 col-sm-4">Name :</label>
						<div class="col-md-9 col-xs-12 col-sm-8">
							<input type="text" name="name" value="{{ old('name') }}" class="form-control">
							<div class="text-danger">{{ $errors->first('name')}}</div>
						</div>						
					</div>

					<div class="form-group">
						<label for="category_id" class="control-lable col-md-3 col-xs-12 col-sm-4">Category :</label>
						<div class="col-md-9 col-xs-12 col-sm-8">
							<select name="category_id" id="category_id" class="form-control">
								<option>-- ေရြးခ်ယ္ပါ --</option>
								@foreach( $categories as $category )
								<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
							<div class="text-danger">{{ $errors->first('category_id')}}</div>
						</div>						
					</div>

					<div class="form-group">
						<label for="website" class="control-lable col-md-3 col-xs-12 col-sm-4">Website :</label>
						<div class="col-md-9 col-xs-12 col-sm-8">
							<input type="text" name="website" value="{{ old('website') }}" class="form-control" placeholder="www.example.com">
							<div class="text-danger">{{ $errors->first('website')}}</div>
						</div>						
					</div>

					<div class="form-group">
						<label for="address" class="control-lable col-md-3 col-xs-12 col-sm-4">Address :</label>
						<div class="col-md-9 col-xs-12 col-sm-8">
							<textarea class="form-control" name="address">{{ old('address') }}</textarea>
							<div class="text-danger">{{ $errors->first('address')}}</div>
						</div>						
					</div>

					<div class="form-group">
						<div class="col-md-offset-3 col-sm-9">
							<button class="btn btn-primary">
								<span class="glyphicon glyphicon-save">Save</span>
							</button>
						</div>
					</div>
						
					</form>
				</div>

			</div>
		</div>
	</div>
@endsection