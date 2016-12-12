@extends('layouts.layout')
@section('sidebar')
	{{-- <li><a href="/user/login">đăng nhập</a></li>
	<li><a href="/user/register">đăng ký</a></li> --}}
@endsection
@section('main')
	<div class="col-md-4 col-md-offset-4">
		<form method="post" accept-charset="utf-8">
		
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
			@if($check_captcha == true)
				<div class="form-group">
					<img id="login_captcha" src="{{ Captcha::src() }}">
					<button id="re_login_captcha" type="button">Lấy mã khác</button><br>
					<p class="red-color">
						{{$errors->first('captcha')}}
					</p>
					<label for="username">Nhập mã bảo vệ</label>
					<input type="text" class="form-control" name="captcha">
				</div>
			@endif
			<div class="form-group">
				<input type="checkbox" name="remember" value="1">
				Ghi nhớ đăng nhập
			</div>
			<input name="_token" value="{{csrf_token()}}" hidden>
			<button id="auth_register" type="submit" class="btn btn-primary">Đăng nhập</button>
		</form>
	</div>
@endsection