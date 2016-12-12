/**
 * Created by Duong Td on 17/11/2016.
 */
//khoa tao moi sinh vien
$(document).ready(function() {
    $("#excel_import_new_student:file").change(function(e) {
        $("#thead_import_student").text("");
        $("tbody").text("");
        $("#import_student").remove();
        $("#thead_import_student").append('<tr><th>Mã số sinh viên</th><th>Họ và tên</th><th>Khoá học</th><th>Chương trình đào tạo</th><th>VNU Email</th><th class="th_tuychon">tùy chọn</th></tr>');
        handleFile(e);
    });

    //nhan xoa 1 sinh vien o cot tuy chon
    $(document).on("click",".remove_student_excel",function(){
        $(this).parent().parent().remove();
    });

    //click them sinh vien vao he thong
    $(document).on("click","#import_student",function(){
        $('#status_all').text('');
        $('#status_all').append('<h4 class="semi-bold text-info">Đang thêm sinh viên. Vui lòng không tắt trình duyệt !</h4><div class="progress progress-striped active "><div id="processing" data-percentage="0%" class="progress-bar progress-bar-danger"></div></div>');
        $("thead").children('tr').children('.th_tuychon').text('trạng thái');
        var items = new Array();
        $.each($("tbody").children('tr'), function(item,val) {
            items.push($(this));
            var action = $(this).children('.status_new_student');
            action.text('');
            action.append('<img src="/storage/app/public/icons/loading_small.gif">');
        });

        ajax_excel_student(items,0);
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

                for (var i = 6; i < new_workbook.length; i += 5) {
                    var html = '<tr>'
                        +'<td class="code">'+ new_workbook[i] +'</td>'
                        +'<td class="name">'+ new_workbook[i+1] +'</td>'
                        +'<td class="course">'+ new_workbook[i+2] +'</td>'
                        +'<td class="academic_program">'+ new_workbook[i+3] +'</td>'
                        +'<td class="vnu_email">'+ new_workbook[i+4] +'</td>'
                        +'<td style="text-align:center; cursor: pointer" class="status_new_student"><div class="remove_student_excel"><span class="text-danger semi-bold">xóa</span></div></td>'
                        +'</tr>';
                    $("tbody").append(html);
                }
                /* DO SOMETHING WITH workbook HERE */
            };
            reader.readAsBinaryString(f);
        }
        $('table').before('<div id="status_all" class="form-group"><button class="btn btn-success" id="import_student" type="button">Thêm sinh viên vào hệ thống</button></div>');
    }

    function ajax_excel_student(item, index) {
        if(index >= item.length){
            $('#status_all').text('');
            $('#status_all').append('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><h4 class="semi-bold">Hoàn thành !</h4><p class="text-info semi-bold">Đã thêm thành công '
                + ($("tr").length - $(".errors").length - 1) +
                ' sinh viên, Có '+$(".errors").length+' lỗi !</p></div>');
            return;
        }
        var code = item[index].children('.code').text();
        console.log(code);
        var name = item[index].children('.name').text();
        var course = item[index].children('.course').text();
        var academic_program = item[index].children('.academic_program').text();
        var vnu_email = item[index].children('.vnu_email').text();
        var action = item[index].children('.status_new_student');
        $.ajax({
            url: 'ajax/them-sinh-vien',
            type: 'POST',
            dataType: 'JSON',
            data: {
                code: code,
                name: name,
                course: course,
                academic_program: academic_program,
                vnu_email: vnu_email
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
                console.log(response);
            })
            .fail(function() {
                action.text('');
                action.append('<div class="errors"><p class="text-danger semi-bold" style="text-align:left"><i class="fa fa-warning"></i> Lỗi chưa xác định !</p></div>');
            })
            .always(function() {
                return ajax_excel_student(item,index+1);
            });
    }

    $(document).on("click","#start_new_student_form", function(event) {
        $("#new_student_form").text('');
        $("#new_student_form").append('<img src="/storage/app/public/icons/loading_small.gif"><span class="text-info semi-bold">Đang xử lý</span>');
        $.ajax({
            url: '/faculty/new_student_form',
            type: 'POST',
            dataType: 'JSON',
            data: {
                name: $("#name").val(),
                code: $("#code").val(),
                vnu_email: $("#vnu_email").val(),
                course_id: $("select[name=course_id]").val(),
                academic_program_id: $("select[name=academic_program_id]").val(),
            },
        })
        .done(function(response) {
            $("#new_student_form").text('');
            $("p.text-error").text('');
            if(response['errors']){
                $("#new_student_form").append('<img width="20px" height="20px" src="/storage/app/public/icons/error.png"><span class="semi-bold text-danger"> Kiểm tra lại thông tin nhập !</span><br><br><button id="start_new_student_form" type="button" class="btn btn-primary">Thêm sinh viên</button> <button id="reset_form" type="button" class="btn btn-danger">Nhập lại</button>');
                $("#name_error").text(response['errors']['name']);
                $("#code_error").text(response['errors']['code']);
                $("#vnu_email_error").text(response['errors']['vnu_email']);
                $("#course_id_error").text(response['errors']['course_id']);
                $("#academic_program_id_error").text(response['errors']['academic_program_id']);
            }
            else {
                $("#new_student_form").append('<img width="25px" height="25px" src="/storage/app/public/icons/success.png"><span class="semi-bold text-success"> Thêm sinh viên thành công !</span><br><button id="start_new_student_form" type="button" class="btn btn-primary">Thêm sinh viên</button> <button id="reset_form" type="button" class="btn btn-danger">Nhập lại</button>');
            }
        })
        .fail(function() {
            $("p.text-danger").text('');
            $("#new_student_form").text('');
            $("#new_student_form").append('<img width="20px" height="20px" src="/storage/app/public/icons/error.png"><span class="semi-bold text-success"> Có lỗi xảy ra ! Vui lòng thử lại sau</span><br><br><button id="start_new_student_form" type="button" class="btn btn-primary">Thêm sinh viên</button> <button id="reset_form" type="button" class="btn btn-danger">Nhập lại</button>');
        })
        .always(function() {
            $("p.text-danger").text('');
            console.log("complete");
        });
        
    });
});
