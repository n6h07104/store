<x-header/>

<form class="card login-form" method="post" action="{{ route('dataRegis') }}">
    @csrf
<div class="card-body">
<div class="title">
<h3>Login Now</h3>
<p>You can login using your social media account or email address.</p>
</div>

<div class="alt-option">
</div>
<div class="form-group input-group">
    <label for="reg-fn">Name</label> <br><hr>
    <input class="form-control d-inline-block" type="name" name="name" id="reg-name" required>
    </div>
    <div class="form-group input-group">
        <label for="reg-fn">Email</label> <br><hr>
        <input class="form-control d-inline-block" type="email" name="email" id="reg-email" required>
        </div>
<div class="form-group input-group">
<label for="reg-fn">Password</label><br><hr>
<input class="form-control" type="password" name="password" id="reg-pass" required>
</div>

<div class="button">
<button class="btn btn-primary" type="submit">Login</button>
</div>
<p class="outer-link">Don't have an account? <a href="">Register here </a>
</p>
</div>
</form>

<x-footer/>
