@extends("dashboard.style.main")
@section("content")
<div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
    <h4 class="card-title">Basic form elements</h4>
    <p class="card-description"> Basic form elements </p>
    <form class="forms-sample" action="{{ route("admin.store") }}" method="post">
        @csrf
   @error("name")<div style="color:red;">{{ $message }}</div>@enderror
    <div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input type="text" class="form-control" value="{{ old("name") }}" id="exampleInputName1" placeholder="Name" name="name">
    </div>
    @error("email") <div style="color:red">{{ $message }}</div>@enderror
    <div class="form-group">
    <label for="exampleInputEmail3">Email address</label>
    <input type="email" class="form-control" value="{{ old("email") }}" id="exampleInputEmail3" placeholder="Email" name="email">
    </div>
    @error("password") <div style="color:red">{{ $message }}</div>@enderror
    <div class="form-group">
    <label for="exampleInputPassword4">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword4" name="password" placeholder="Password">
    </div>
    @error("password") <div style="color:red">{{ $message }}</div>@enderror
    <div class="form-group">
    <label for="exampleInputPassword4">Confirm Password </label>
    <input type="password" class="form-control" id="exampleInputPassword4" name="password_confirmation" placeholder="Password">
    </div>

    <div class="form-group">
    <label for="exampleSelectGender">Gender</label>
    <select name="gender" class="form-control" id="exampleSelectGender">
    <option value="1">Male</option>
    <option value="0">Female</option>
    </select>
    </div>



    <div class="form-group">
    <label for="exampleSelectGender">privilege</label>
    <select name="prive" class="form-control" id="exampleSelectGender">
        @foreach (config("permission")["privi"] as $key=>$val)

        <option value="{{ $key }}">{{ $val }}</option>
        @endforeach

    </select>
    </div>
    @error("permission") <div style="color:red">{{ $message }}</div>@enderror

    <div class="col-md-6">
    <div class="form-group">
        @foreach (config("permission")["permission"] as $val )

        <div class="form-check">
        <label class="form-check-label">
        <input type="checkbox" class="form-check-input" value="{{ $val }}" name="permission[]"> {{ $val }} <i class="input-helper-ganger"></i></label>
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
