@extends('layouts/admin')

@section('content')

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h4>All SubCategories</h4>
      </div>
      <div class="x_content">
        <span class="pull-left text-success">
          @if(session('message'))
          {{session('message')}}
          @endif
        </span>
        @if($subcategories->isEmpty())
          <span class="text-center text-danger">
          <h4>အခ်က္အလက္မ်ား ထည့္သြင္းထားျခင္း မရွိေသးပါ။</h4></span>
        @endif
        <span class="pull-right">{{$subcategories->links()}}</span>
        <table class="table table-hover">
          <tr>
            <th>Name</th>
            <th>Remark</th>
            <th colspan="2">Option</th>
          </tr>
          @foreach($subcategories as $subcategory)
          <tr>
            <td>{{$subcategory->name}}</td>
            <td>{{$subcategory->category->name}}</td>
            <td>{{$subcategory->remark}}</td>
            <td>
            <a href="{{url('')}}/admin/subcategory/{{$subcategory->id}}/edit" class="btn btn-info">
              <span class="glyphicon glyphicon-edit"></span>
            </a>
            <form action="{{url('')}}/admin/subcategory/{{$subcategory->id}}" method="post" class="form-delete">
                <input type="hidden" name="_method" value="DELETE">
                  {{csrf_field()}}
                <button class="btn btn-danger">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
            </form>
            </td>
          </tr>
          @endforeach

        </table>

        <span class="pull-right">{{$subcategories->links()}}</span>
      </div>
    </div>
  </div>
</div>

<a href="{{url('admin/subcategory/create')}}" class="btn btn-success">
  <span class="glyphicon glyphicon-plus-sign"></span>&nbsp;<span>add new</span>
</a>

@endsection
