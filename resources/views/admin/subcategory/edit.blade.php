@extends('layouts/admin')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h4>Edit subcategory</h4>
			</div>
			<div class="x_content">
				<br/>
				<form action="{{url('')}}/admin/subcategory/{{$subcategory->id}}" class="form-horizontal col-md-8" method="post">

					<input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}

					<div class="form-group">
						<label for="name" class="control-lable col-md-3 col-xs-12 col-sm-4">Name :</label>
						<div class="col-md-9 col-xs-12 col-sm-8">
							<input type="text" name="name" value="{{ $subcategory->name }}" class="form-control">
							<div class="text-danger">{{ $errors->first('name')}}</div>
						</div>						
					</div>

					<div class="form-group">
						<label for="category_id" class="control-lable col-md-3 col-xs-12 col-sm-4">Category :</label>
						<div class="col-md-9 col-xs-12 col-sm-8">
							<select name="category_id" id="category_id" class="form-control">
								<option>-- ေရြးခ်ယ္ပါ --</option>
								@foreach( $categories as $category )
								@if ($category->id == $subcategory->category_id)
								<option value="{{ $category->id }}" selected="true">{{ $category->name }}</option>
								@else
								<option value="{{ $category->id }}" selected="true">{{ $category->name }}</option>
								@endif
								@endforeach
							</select>
							<div class="text-danger">{{ $errors->first('category_id')}}</div>
						</div>						
					</div>

					<div class="form-group">
						<label for="remark" class="control-lable col-md-3 col-xs-12 col-sm-4">Remark :</label>
						<div class="col-md-9 col-xs-12 col-sm-8">
							<textarea class="form-control" name="remark" required="true">
							{{ $subcategory->remark }}</textarea>
							<div class="text-danger">{{ $errors->first('remark')}}</div>
						</div>						
					</div>

					<div class="form-group">
			            <div class="col-sm-9 col-md-offset-3">
			                <button class="btn btn-info"><span class="glyphicon glyphicon-save"></span>&nbsp;<span>Save</span></button>
			                <a href="{{ url('/admin/category') }}" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;<span>Back</span></a>
			            </div>
		            </div>

				</form>

			</div>
		</div>
	</div>
</div>

@endsection
