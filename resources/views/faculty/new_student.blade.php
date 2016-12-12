@extends('faculty.layout')
@section('name_page')
  Thêm sinh viên
@endsection
@section('main')
  <ul class="nav nav-tabs" id="tab-01">
    <li class="active"><a href="#tab1hellowWorld">Thêm bằng excel</a></li>
    <li><a href="#tab1FollowUs">Thêm thủ công</a></li>
  </ul>
  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1hellowWorld">
      <div class="row column-seperation">
        <div class="col-md-12">
          <form id="upload_excel_student" class="form-group" method="post" enctype="multipart/form-data">
                <input id="excel_import_new_student" type="file" name="excel_import">
                <input id="excel_import_token" name="_token" value="{{csrf_token()}}" hidden>
            </form>

                <div id="show_item_excel">
                    <table class="table table-bordered">
                        <thead id="thead_import_student">

                        </thead>
                        <tbody id="tbody_excel_student">
                        </tbody>
                    </table>
                </div>
        </div>
      </div>
    </div>

    <div class="tab-pane" id="tab1FollowUs">
      <div class="row">
          <div class="col-md-6">
      <div class="grid simple">
        <div class="grid-title no-border">
          <h4><span  class="semi-bold">Thêm sinh viên</span></h4>
          <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
        </div>
        <div class="grid-body">
            <div class="form-group">
              <label class="semi-bold">Họ và tên</label>
              <p id="name_error" class="text-error"></p>
              <input type="text" id="name" class="form-control" placeholder="Họ và tên">
            </div>
            <div class="form-group">
              <label class="semi-bold">Mã sinh viên</label>
              <p id="code_error" class="text-error"></p>
              <input type="text" id="code" class="form-control" placeholder="Mã giảng viên">
            </div>
            <div class="form-group">
              <label class="semi-bold">Vnu email</label>
              <p id="vnu_email_error" class="text-error"></p>
              <input type="text" id="vnu_email" class="form-control" placeholder="Vnu email">
            </div>
            <div class="row">
                <div class="col-md-6">
                  <label class="semi-bold">Khóa học</label>
                  <p id="course_id_error" class="text-error"></p>
                  <select name="course_id" class="form-group">
                    <option class="first_select" value="">Chọn</option>
                    @foreach($courses as $item)
                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="col-md-6">
                  <label class="semi-bold">Chương trình đào</label>
                  <p id="academic_program_id_error" class="text-error"></p>
                  <select name="academic_program_id" class="form-group">
                    <option class="first_select" value="">Chọn</option>
                    @foreach($academic_programs as $item)
                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div id="new_student_form"><button id="start_new_student_form" type="button" class="btn btn-primary">Thêm sinh viên</button> <button id="reset_form" type="button" class="btn btn-danger">Nhập lại</button></div>
        </div>
      </div>
    </div>
      </div>
    </div>

  </div>
@endsection

@section('main')
    <h4>Thêm Sinh viên</h4>
    
@endsection