@extends('dashboard.style.main')
@section('content')
@if (Session::has("ms-admin"))
<div class="alert alert-primary" role="alert">
    {{ session("ms-admin") }}
  </div>

@endif
@if(Auth::guard("admin")->user()->can("add.user"))
<a href="{{ route("admin.create") }}" class="btn btn-primary">Add User</a>
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
      Data Table Example</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>email</th>
              <th>gender</th>
              <th>privilae</th>
              <th>controller</th>
            </tr>
          </thead>
          <tbody>
@forelse ($data as $key=>$val )
<tr>
  <td>{{ ++$key }}</td>
  <td>{{ $val->name }}</td>
  <td>{{ $val->email }}</td>
  <td>{{ $val->gender==1?"Male":"female" }}</td>
  <td>{{ $val->prive==100?"owner":"supervisor" }}</td>
  <td>
    
    <a href="{{ route("admin.show",$key) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route("admin.destroy",$key) }}"  method="POST">
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
