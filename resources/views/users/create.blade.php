@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Thêm mới</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" id="user-form" action="/admin/users" method="POST">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="name">Họ và tên <span class="text-danger">*</span></label>
				<input type="text" name="name" class="form-control" id="name" placeholder="Nhập họ và tên" value="{{ old('name') }}">
			</div>
            <div class="form-group">
				<label for="email">Email <span class="text-danger">*</span></label>
				<input type="email" name="email" class="form-control" id="email" placeholder="Nhập email" value="{{ old('email') }}">
			</div>
			<div class="form-group">
				<label for="password">Mật khẩu <span class="text-danger">*</span></label>
				<input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
			</div>
            <div class="form-group">
				<label for="phone">Số điện thoại</label>
				<input type="text" name="phone" class="form-control" id="phone" placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
			</div>
			<div class="form-group">
				<label for="note">Ghi chú</label>
				<textarea class="form-control" name="note" id="note" rows="3">{{ old('note') }}</textarea>
			</div>
            @if ($errors->any())
                <div class="text-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Lưu</button>
		</div>
	</form>
</div>
@endsection