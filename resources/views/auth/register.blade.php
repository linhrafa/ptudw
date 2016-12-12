@extends('layouts.layout')
@section('sidebar')
	<li><a href="/user/login">đăng nhập</a></li>
	<li><a href="/user/register">đăng ký</a></li>
@endsection
@section('main')
	<div class="col-md-4 col-md-offset-4">
		<form method="post" accept-charset="utf-8">
		
			<div class="form-group">
				<label for="username">Tên tài khoản</label>
				<p class="red-color">{{$errors->first('username')}}</p>
				<input id="username" class="form-control" name="username" placeholder="Tên tài khoản" value="{{ old('username') }}">
			</div>
			
			<div class="form-group">
				<label for="username">Mật khẩu</label>
				<p class="red-color">{{$errors->first('password')}}</p>
				<input type="password" id="password" class="form-control" name="password" placeholder="Tên tài khoản">
			</div>

			<div class="form-group">
				<label for="username">nhập lại mật khẩu</label>
				<p class="red-color">{{$errors->first('re_password')}}</p>
				<input type="password" id="re_password" class="form-control" name="re_password" placeholder="Tên tài khoản">
			</div>

			<input name="_token" value="{{csrf_token()}}" hidden>
			<button id="auth_register" type="submit" class="btn btn-primary">Đăng ký</button>
		</form>
	</div>
@endsection