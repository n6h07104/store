@extends("dashboard.style.main")
@section("content")
@if (Session::has("ms-admin"))
<div class="alert alert-primary" role="alert">
    {{ session("ms-admin") }}
  </div>
@endif

@if(Auth::guard("admin")->user()->can("add.product"))
<a href="{{ route("product.create") }}" class="btn btn-primary">Add Product</a>
@endif

<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Data Table Product</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>price</th>
              <th>sale</th>
              <th>count</th>
              <th>cateogry</th>
              <th>Images</th>
              <th>controller</th>
            </tr>
          </thead>
          <tbody>
@forelse ($data as $key=>$val )
<tr>
  <td>{{ ++$key }}</td>
  <td>{{ $val->name }}</td>
  <td>{{ $val->price }}</td>
  <td>{{ $val->sale }}</td>
  <td>{{ $val->count }}</td>
  <td>{{ $val->category }}</td>
  <td>
    @foreach ( $val->images as $img )
    <img src="{{ asset('storage/images/'.$img["file"]) }}" style="height: 80px;">
    @endforeach
</td>

  <td>
    <a href="{{ route("product.show",$val->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route("product.destroy",$val->id) }}"  method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger d-block">Delete</button>
    </form>
  </td>
</tr>

@empty

@endforelse
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
@endsection
