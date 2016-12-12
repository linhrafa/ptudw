$(document).ready(function() {
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    }
	});
	$("#re_login_captcha").click(function(){
		$.ajax({
			url: '/app/get_captcha',
			type: 'POST',
			dataType: 'JSON',
			data: {name: 'default'},
		})
		.done(function(response) {
			$('#login_captcha').attr('src', response);
		})
		.fail(function() {
			
		})
		.always(function() {
			console.log("complete");
		});
	});

	$("form").submit(function(event) {
		var username = $("#username");
		var password = $("#password");
		var text_captcha = $("#text_captcha");
		
		var check = true;

		$("#username_null").remove();
		$("#email_null").remove();
		$("#password_null").remove();
		$("#captcha_null").text('');
		if(username.val() == ''){
			username.before('<p id="username_null" class="text-error">Chưa nhập tài khoản !</p>');
			check = false;
		}
		if(password.val() == ''){
			password.before('<p id="password_null" class="text-error">Chưa nhập mật khẩu !</p>');
			check = false;
		}
		if($("#email").length != 0 && $("#email").val() == ''){
			$("#email").before('<p id="email_null" class="text-error">Chưa nhập email !</p>');
			check = false;
		}
		if(text_captcha && text_captcha.val() == ''){
			$("#captcha_null").text('Chưa nhập mã bảo vệ !');
			check = false;
		}
		if(!check){
			return false;
		}
		else return true;
	});
	$(document).on("click","#reset_form",function(event) {
		$("input").val("");
		$(".first_select").attr('selected', '');
		return false;
	});
});

