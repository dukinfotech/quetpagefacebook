@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Danh sách khách hàng</h3>
		<a class="btn btn-success float-right" href="/admin/users/create">
			Thêm mới
		</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive">
		<table id="user-table" class="table table-bordered table-striped table-sm">
			<thead>
			<tr>
				<th width="10">#</th>
				<th>Tên</th>
				<th>Số điện thoại</th>
				<th>Email</th>
                <th>Trạng thái</th>
				<th>Ghi chú</th>
                <th>Ngày tạo</th>
                <th>Số ngày sử dụng</th>
				<th width="150">Tác vụ</th>
			</tr>
			</thead>
			<tbody>
			@foreach($users as $k=> $user)
				<tr>
					<td>{{ $k+1 }}</td>
					<td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
					<td class="status-badge-{{ $user->id }}" data-status="{{ $user->is_active?1:0 }}">
						<span class="badge bg-{{ $user->is_active ? 'success' : 'secondary' }}">
							{{ $user->is_active ? 'Đã kích hoạt' : 'Chưa kích hoạt' }}
						</span>
					</td>
                    <td>{{ $user->note }}</td>
                    <td>{{ $user->created_at }}</td>
					<td>{{ $user->created_at->diffInDays(now()) }}</td>
					<td>
						<a class="btn btn-warning" href="/admin/users/{{ $user->id }}/edit" title="Sửa">
							<i class="fas fa-pen"></i>
						</a>
						<button class="btn btn-info status-btn" data-user="{{ $user->id }}" title="{{ $user->is_active?'Vô hiệu hóa':'Kích hoạt' }}">
							<i class="fas fa-globe-asia"></i>
						</button>
						<button class="btn btn-danger delete-btn" data-url="/admin/users/{{ $user->id }}" title="Xóa">
							<i class="fas fa-trash-alt"></i>
						</button>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>
@endsection

@push('scripts')
<script>
$("#user-table").DataTable({
	"columnDefs": [
		{
			"targets": [4, 8],
			"orderable": false
		}
	]
});
// Change Status User
$('.status-btn').click(function () {
	var userId = $(this).data('user');
	$.ajax({
		method: 'POST',
		url: '/admin/users/' + userId + '/update-status',
		data: { _method: 'PUT' }
	}).then(function () {
		var isActive = $('.status-badge-' + userId).data('status');
		var html =  '<span class="badge bg-'+ (isActive == 1 ? 'secondary' : 'success') +'">' +
									(isActive == 1  ? 'Vô hiệu hóa' : 'Đã kích hoạt') + 
								'</span>';
		$('.status-badge-' + userId).html(html);
		$('.status-badge-' + userId).data('status', isActive == 0 ? 1 : 0);
	});
});
</script>
@endpush