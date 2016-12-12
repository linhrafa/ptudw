@extends('student.layout')
@section('name_page')
	Đổi mật khẩu
@endsection
@section('main')
<div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Thông tin cung cấp để đổi mật khẩu</h4>
                  <p>(Bạn sẽ nhận được link thay đổi mật khẩu ở email của bạn )</p>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border">
				<form method="post" novalidate="novalidate">
					<div class="row">
						<div class="col-md-4">
		                	<div class="form-group">
							    <label>Nhập email </label>
							    <p class="text-error">{{$errors->first('email')}}</p>
							    <input type="text" class="form-control" name="email">
							    <input name="_token" value="{{csrf_token()}}" hidden>
							</div>	
		                </div> 
					</div> 
					<button type="submit" class="btn btn-info btn-cons">Gửi link thay đổi mật khẩu</button>
				</form>
                </div>
              </div>
            </div>		
          </div>
	
@endsection()