@extends("dashboard.style.main")
@section("content")
<div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
    <h4 class="card-title">Basic form elements</h4>
    <p class="card-description"> Basic form elements </p>
    <form class="forms-sample" action="{{ route("admin.update",$data->id) }}" method="post">
        @csrf
        @method("PUT")
   @error("name")<div style="color:red;">{{ $message }}</div>@enderror
    <div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input type="text" class="form-control" value="{{ $data->name }}" id="exampleInputName1" placeholder="Name" name="name">
    </div>
    @error("email") <div style="color:red">{{ $message }}</div>@enderror
    <div class="form-group">
    <label for="exampleInputEmail3">Email address</label>
    <input type="email" class="form-control" value="{{ $data->email }}" id="exampleInputEmail3" placeholder="Email" name="email">
    </div>
    <div class="form-group">
    <label for="exampleSelectGender">Gender</label>
    <select name="gender" class="form-control" id="exampleSelectGender">
    <option value="1" @selected($data->gender==1)>Male</option>
    <option value="0" @selected($data->gender==0)>Female</option>
    </select>
    </div>



    <div class="form-group">
    <label for="exampleSelectGender">privilege</label>
    <select name="prive" class="form-control" id="exampleSelectGender">
        @foreach (config("permission")["privi"] as $key=>$val)

        <option value="{{ $key }}" @selected($key==$data->prive)>{{ $val }}</option>
        @endforeach

    </select>
    </div>
    @error("permission") <div style="color:red">{{ $message }}</div>@enderror

    <div class="col-md-6">
    <div class="form-group">
        @foreach (config("permission")["permission"] as $val )

        <div class="form-check">
        <label class="form-check-label">
        <input type="checkbox" class="form-check-input"
         @foreach ($data->permission as $permission ) @checked($val==$permission) @endforeach value="{{ $val }}"
         name="permission[]"> {{ $val }} <i class="input-helper-ganger"></i></label>
        </div>
        @endforeach




    </div>
    </div>

    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <button class="btn btn-danger">Cancel</button>
    </form>
    </div>
    </div>
    </div>
@endsection
