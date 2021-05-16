$(document).ready(function() {
  // Delete confirm
  $('.delete-btn').on('click', function () {
    var url = $(this).data('url');
    var cf = confirm('Bạn có chắc muốn xóa?');
    if (cf) {
      var form = document.createElement('form');
      form.setAttribute('method', 'POST');
      form.setAttribute('action', url);

      var inputCsrf = document.createElement('input');
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      inputCsrf.setAttribute('name', '_token');
      inputCsrf.setAttribute('type', 'hidden');
      inputCsrf.setAttribute('value', csrfToken);
      form.appendChild(inputCsrf);

      var inputMethod = document.createElement('input');
      inputMethod.setAttribute('name', '_method');
      inputMethod.setAttribute('type', 'hidden');
      inputMethod.setAttribute('value', 'DELETE');
      form.appendChild(inputMethod);

      $(document.body).append(form);
      form.submit();
    }
  });

  // Validate user form
  $('#user-form').validate({
    rules: {
      name: {
        required: true,
        maxlength: 60,
      },
      email: {
        required: true
      },
      password: {
        required: true
      }
    },
    messages: {
      name: {
        required: 'Nhập tên khách hàng.',
        maxlength: 'Tối đa 60 ký tự.',
      },
      email: {
        required: 'Nhập email khách hàng.',
        email: 'Email không đúng định dạng.'
      },
      password: {
        required: 'Nhập mật khẩu.'
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      if (element.is("textarea")) {
        error.insertAfter(element.next());
      } else {
        element.closest('.form-group').append(error);
      }
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
  // Setup CSRF Token for AJAX
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Validate user form
  $('#change-password-form').validate({
    rules: {
      current_password: {
        required: true,
      },
      new_password: {
        required: true,
      },
      confirm_new_password: {
        required: true,
        equalTo : "#new_password"
      },
    },
    messages: {
      current_password: {
        required: 'Nhập mật khẩu hiện tại.',
      },
      new_password: {
        required: 'Nhập mật khẩu mới.',
      },
      confirm_new_password: {
        required: 'Xác nhận mật khẩu mới.',
        equalTo: 'Xác nhận mật khẩu mới không chính xác.s'
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      if (element.is("textarea")) {
        error.insertAfter(element.next());
      } else {
        element.closest('.form-group').append(error);
      }
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});