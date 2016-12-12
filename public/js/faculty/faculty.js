$(document).ready(function() {

	//khi click sửa thông tin(save)
	$("#eable_edit_profile").click(function(event) {
		$(this).hide();
		$("#action_edit_profile").append('<button class="btn btn-success btn-cons" type="button" id="edit_profile">Cập nhật</button><button class="btn btn-danger btn-cons" type="button" id="cancle_edit_profile">Hủy</button>');
		var description_profile = $("#description_profile");
		description_profile.removeAttr('disabled');
		description_profile.focus();
	});
	$(document).on("click","#cancle_edit_profile",function(){
		$("#action_edit_profile").text('');
	});
	$(document).on("click","#edit_profile",function(){
		var action_edit_profile = $("#action_edit_profile");
		action_edit_profile.text('');
		action_edit_profile.append('<img src="/storage/app/public/icons/loading_small.gif">');
		$.ajax({
			url: 'update_profile',
			type: 'POST',
			dataType: 'JSON',
			data: {
				description: $("textarea#description_profile").val(),
			},
		})
			.done(function(response) {
				if(response['errors']){
					action_edit_profile.text('');
					action_edit_profile.append('<button class="btn btn-success btn-cons" type="button" id="edit_profile">Cập nhật</button><button class="btn btn-danger btn-cons" type="button" id="cancle_edit_profile">Hủy</button>');
					$("#error_update_description").text(response['errors'][0]);
				}
				else {
					$("textarea#description_profile").attr('disabled', '');
					action_edit_profile.text('');
					action_edit_profile.append('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Thành công:&nbsp; Đã cập nhật thông tin cá nhân</div>');
					$("#eable_edit_profile").show();
				}
			})
			.fail(function() {
				action_edit_profile.text('');
				action_edit_profile.append('<button type="button" id="edit_profile">Cập nhật</button><button type="button" id="cancle_edit_profile">Hủy</button>');
			})
			.always(function() {
				console.log("complete");
			});

	});
	$(document).on("click","#edit_profile",function(){

	});

	$("#excel_import_new_teacher:file").change(function(e) {
		$("#thead_import_teacher").text("");
		$("tbody").text("");
		$("#import_teacher").remove();
		$("#thead_import_teacher").append('<tr><th>họ tên</th><th>mã số</th><th>chức danh</th><th>email</th><th>bộ môn</th><th>chức vụ</th><th class="th_tuychon">tùy chọn</th></tr>');
		handleFile(e);
	});

	//nhan xoa 1 giang vien o cot tuy chon
	$(document).on("click",".remove_teacher_excel",function(){
		$(this).parent().parent().remove();
	});

	//click them giang vien vao he thong
	$(document).on("click","#import_teacher",function(){
		$('#status_all').text('');
		$('#status_all').append('<h4 class="semi-bold text-info">Đang thêm giảng viên ! Vui lòng không tắt trình duyệt !</h4><div class="progress progress-striped active "><div id="processing" data-percentage="0%" class="progress-bar progress-bar-danger"></div></div>');
		$("thead").children('tr').children('.th_tuychon').text('trạng thái');
		var items = new Array();
		$.each($("tbody").children('tr'), function(item,val) {
			items.push($(this));
			var action = $(this).children('.status_new_teacher');
			action.text('');
			action.append('<img src="/storage/app/public/icons/loading_small.gif">');
		});

		ajax_excel_teacher(items,0);
	});

	function handleFile(e) {
		var files = e.target.files;
		var i,f;
		for (i = 0, f = files[i]; i != files.length; ++i) {
			var reader = new FileReader();
			var name = f.name;
			reader.onload = function(e) {
				var data = e.target.result;
				var workbook = XLSX.read(data, {type: 'binary'});
				workbook = workbook.Sheets['Sheet1'];

				var rows = new Array();
				var new_workbook = new Array();
				$.each(workbook, function(index, val) {
					new_workbook.push(val['v']);
				});

				for (var i = 7; i < new_workbook.length; i += 6) {
					var html = '<tr>'
						+'<td class="name">'+ new_workbook[i] +'</td>'
						+'<td class="code">'+ new_workbook[i+1] +'</td>'
						+'<td class="degree">'+ new_workbook[i+2] +'</td>'
						+'<td class="vnu_email">'+ new_workbook[i+3] +'</td>'
						+'<td class="department">'+ new_workbook[i+4] +'</td>'
						+'<td class="chucvu">'+ new_workbook[i+5] +'</td>'
						+'<td style="text-align:center; cursor: pointer" class="status_new_teacher"><div class="remove_teacher_excel"><span class="text-danger semi-bold">xóa</span></div></td>'
						+'</tr>';
					$("tbody").append(html);
				}
				/* DO SOMETHING WITH workbook HERE */
			};
			reader.readAsBinaryString(f);
		}
		$('table').before('<div id="status_all" class="form-group"><button class="btn btn-success" id="import_teacher" type="button">Thêm giảng viên vào hệ thống</button></div>');
	}

	function ajax_excel_teacher(item, index) {
		if(index >= item.length){
			$('#status_all').text('');
			$('#status_all').append('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><h4 class="semi-bold">Hoàn thành !</h4><p class="text-info semi-bold">Đã thêm thành công '
                + ($("tr").length - $(".errors").length - 1) +
                ' giảng viên, Có '+$(".errors").length+' lỗi !</p></div>');
			return;
		}
		var name = item[index].children('.name').text();
		console.log(name);
		var code = item[index].children('.code').text();
		var degree = item[index].children('.degree').text();
		var vnu_email = item[index].children('.vnu_email').text();
		var department = item[index].children('.department').text();
		var chucvu = item[index].children('.chucvu').text();
		var action = item[index].children('.status_new_teacher');
		$.ajax({
			url: 'ajax/them-giang-vien',
			type: 'POST',
			dataType: 'JSON',
			data: {
				name: name,
				code: code,
				degree: degree,
				vnu_email: vnu_email,
				department: department,
				chucvu: chucvu
			}
		})
		.done(function(response) {
			$("#processing").css("width",((index+1)*100/item.length)+10+"%");
			if(response['errors'] == ''){
				action.text('');
				action.append('<img width="30px" height="30px" src="/storage/app/public/icons/success.png"><span class="green-color">thành công</span>');
			}
			else {
				action.text('');
				var error0 = error1 = error2 = '';
				if(response['errors'][0]){
					error0 = response['errors'][0];
				}
				if(response['errors'][1]){
					error1 = response['errors'][1];
				}
				if(response['errors'][2]){
					error2 = response['errors'][2];
				}
				action.append('<div class="errors"><p class="text-danger semi-bold" style="text-align:left"><i class="fa fa-warning"></i> Lỗi</p><p class="text-danger" style="text-align:left">'+error0+'</p>'+
                        '<p class="text-danger" style="text-align:left">'+error1+'</p>'+
                        '<p class="text-danger" style="text-align:left">'+error2+'</p></div>');
			}
		})
		.fail(function() {
			action.text('');
			action.append('<div class="errors"><p class="text-danger semi-bold" style="text-align:left"><i class="fa fa-warning"></i> Lỗi chưa xác định !</p></div>');
		})
		.always(function() {
			return ajax_excel_teacher(item,index+1);
		});
	}


	$(document).on("click","#start_new_teacher_form", function(event) {
		$("#new_teacher_form").text('');
		$("#new_teacher_form").append('<img src="/storage/app/public/icons/loading_small.gif"><span class="text-info semi-bold">Đang xử lý</span>');
		$.ajax({
			url: '/faculty/new_teacher_form',
			type: 'POST',
			dataType: 'JSON',
			data: {
				name: $("#name").val(),
				code: $("#code").val(),
				degree: $("#degree").val(),	
				vnu_email: $("#vnu_email").val(),
				department_id: $("select[name=department_id]").val(),
				chucvu: $("select[name=chucvu]").val(),
			},
		})
		.done(function(response) {
			$("p.text-error").text("");
			$("#new_teacher_form").text('');
			if(response['errors']){
				$("#new_teacher_form").append('<img width="20px" height="20px" src="/storage/app/public/icons/error.png"><span class="semi-bold text-danger"> Kiểm tra lại thông tin nhập !</span><br><br><button id="start_new_teacher_form" type="button" class="btn btn-primary">Thêm giảng viên</button> <button id="reset_form" type="button" class="btn btn-danger">Nhập lại</button>');
				$("#name_error").text(response['errors']['name']);
				$("#code_error").text(response['errors']['code']);
				$("#degree_error").text(response['errors']['degree']);
				$("#vnu_email_error").text(response['errors']['vnu_email']);
				$("#department_id_error").text(response['errors']['department_id']);
				$("#chucvu_error").text(response['errors']['chucvu']);
			}
			else {
				$("#new_teacher_form").append('<img width="25px" height="25px" src="/storage/app/public/icons/success.png"><span class="semi-bold text-success"> Thêm giảng viên thành công !</span><br><button id="start_new_teacher_form" type="button" class="btn btn-primary">Thêm giảng viên</button> <button id="reset_form" type="button" class="btn btn-danger">Nhập lại</button>');
			}
		})
		.fail(function() {
			$("#new_teacher_form").text('');
			$("#new_teacher_form").append('<img width="20px" height="20px" src="/storage/app/public/icons/error.png"><span class="semi-bold text-success"> Có lỗi xảy ra ! Vui lòng thử lại sau</span><br><br><button id="start_new_teacher_form" type="button" class="btn btn-primary">Thêm giảng viên</button> <button id="reset_form" type="button" class="btn btn-danger">Nhập lại</button>');
		})
		.always(function() {
			console.log("complete");
		});
		
	});
});
