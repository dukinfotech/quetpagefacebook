@extends('layouts.auth')

@section('content')
<div class="card">
  <div class="card-body">
    <p class="login-box-msg">
      <span class="h5">Thông tin đăng nhập</span>
    </p>

    <form action="/login" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <div class="icheck-primary">
          <input type="checkbox" id="remember" name="remember_me">
          <label for="remember">
            Ghi nhớ
          </label>
        </div>
        <div>
          <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </div>
      </div>
    </form>
    @if ($errors->any())
    <ul class="text-danger">
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif
  </div>
  <!-- /.login-card-body -->
</div>
@endsection