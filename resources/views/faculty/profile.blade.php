@extends('faculty.layout')
@section('name_page')
	Trang cá nhân
@endsection
@section('main')
<div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Thông tin cơ bản</h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border">
				<form id="form_traditional_validation" action="#" novalidate="novalidate">
                           
                      <div class="form-group">
	    <label>Tên Khoa: </label>
	    <input type="text" class="form-control" id="name_profile" value="{{$user->name}}" disabled>
	</div>
	<div class="form-group">
	    <label>Mã Khoa: </label>
	    <input type="text" class="form-control" id="code_profile" value="{{$user->code}}" disabled>
	</div>
	<div class="form-group">
	    <label>Vnu Email: </label>
	    <input type="text" class="form-control" id="vnu_email_profile" value="{{$user->vnu_email}}" disabled>
	</div>
	<div class="form-group">
	    <label>Mô tả: </label>
	    <p id="error_update_description" class="red-color"></p>
	    <textarea class="form-control" id="description_profile" disabled>{{$user->description}}</textarea>
	</div>
	<div id="action_edit_profile"></div>
	<button type="button" class="btn btn-info btn-cons" id="eable_edit_profile">Sửa Thông tin</button>
				</form>
                </div>
              </div>
            </div>		
          </div>
	
@endsection()