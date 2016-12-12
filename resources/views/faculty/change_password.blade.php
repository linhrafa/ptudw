@extends('faculty.layout')
@section('name_page')
	Đổi mật khẩu
@endsection
@section('main')
<div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Thông tin cung cấp để đổi mật khẩu</h4>
                  
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border">
				<form method="post" novalidate="novalidate">
					<div class="row">
						<div class="col-md-4">
		                	<div class="form-group">
							    <label>Nhập mật khẩu cũ </label>
							    <p class="text-error">{{$errors->first('old_password')}}</p>
							    <input type="password" class="form-control" name="old_password">

							    <label>Nhập mật khẩu mới </label>
							    <p class="text-error">{{$errors->first('new_password')}}</p>
							    <input type="password" class="form-control" name="new_password">

							    <label>Nhập lại mật khẩu mới </label>
							    <p class="text-error">{{$errors->first('re_new_password')}}</p>
							    <input type="password" class="form-control" name="re_new_password">
							    <input name="_token" value="{{csrf_token()}}" hidden>
							</div>	
		                </div> 
					</div> 
					<button type="submit" class="btn btn-info btn-cons">Đổi mật khẩu</button>
				</form>
                </div>
              </div>
            </div>		
          </div>
	
@endsection()