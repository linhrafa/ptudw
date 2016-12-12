@extends('admin.layout')
@section('main')
	<div class="col-md-4 col-md-offset-4">
		<form method="post" accept-charset="utf-8">
			@if(isset($success))
				<p class="green-color">tạo tài khoản thành công</p>
			@endif
			<div class="form-group">
				<p class="red-color">
					{{$errors->first('name')}}
				</p>
				
				<label for="name">Tên Khoa</label>
				
				<input id="last_name" class="form-control" name="name" placeholder="Tên tài khoản" value="{{ old('name') }}">
			</div>
			<div class="form-group">
				<p class="red-color">
					{{$errors->first('email')}}
				</p>
				
				<label for="name">Vnu email</label>
				
				<input id="last_name" class="form-control" name="email" placeholder="Tên tài khoản" value="{{ old('email') }}">
			</div>
			<div class="form-group">
				<p class="red-color">
					{{$errors->first('code')}}
				</p>
				
				<label for="name">Mã khoa</label>
				
				<input id="last_name" class="form-control" name="code" placeholder="Tên tài khoản" value="{{ old('code') }}">
			</div>
			<div class="form-group">
				<p class="red-color">
					{{$errors->first('username')}}
				</p>
				
				<label for="username">Tên tài khoản</label>
				
				<input id="last_name" class="form-control" name="username" placeholder="Tên tài khoản" value="{{ old('username') }}">
			</div>

			<div class="form-group">
				<label for="username">Mật khẩu</label>
				<p class="red-color">
					{{$errors->first('password')}}
				</p>
				<input type="password" id="first_name" class="form-control" name="password" placeholder="Mật khẩu" value="">
			</div>

			<div class="form-group">
				<label for="username">Nhập lại mật khẩu</label>
				<p class="red-color">
					{{$errors->first('re-password')}}
				</p>
				<input type="password" id="first_name" class="form-control" name="re-password" placeholder="Mật khẩu" value="">
			</div>

			<input name="_token" value="{{csrf_token()}}" hidden>
			<button id="auth_register" type="submit" class="btn btn-primary">Thêm</button>
		</form>
	</div>
@endsection