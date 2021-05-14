@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Đổi mật khẩu</h3>
	</div>
    <form role="form" id="change-password-form" method="POST" action="/admin/update-password">
        @csrf
        @method('PUT')
		<div class="card-body">
			<div class="form-group">
				<label for="current_password">Mật khẩu hiện tại <span class="text-danger">*</span></label>
				<input type="password" name="current_password" class="form-control" id="current_password" placeholder="Nhập mật khẩu hiện tại">
			</div>
            <div class="form-group">
				<label for="new_password">Mật khẩu mới <span class="text-danger">*</span></label>
				<input type="password" name="new_password" class="form-control" id="new_password" placeholder="Mật khẩu mới">
			</div>
            <div class="form-group">
				<label for="confirm_new_password">Xác nhận mật khẩu mới <span class="text-danger">*</span></label>
				<input type="password" name="confirm_new_password" class="form-control" id="confirm_new_password" placeholder="Xác nhận mật khẩu mới">
			</div>
            @if($errors->any())
            <div class="text-danger">{{ $errors->first() }}</div>
            @endif
        </div>
        <div class="card-footer">
			<button type="submit" class="btn btn-primary changePasswordBtn">Đổi mật khẩu</button>
		</div>
    </form>
</div>
@endsection