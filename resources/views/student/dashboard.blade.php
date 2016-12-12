@extends('layouts.layout')

@section('sidebar')
	<li><a href="/cap-nhap-thong-tin">Cập nhập thông tin</a></li>
	<li><a href="/xem-giang-vien">Xem thông tin các giảng viên</a></li>
	<li><a href="/lamgido">sinh viên làm gì đó</a></li>
	<li><a href="/logout">Đăng xuất</a></li>
@endsection
@section('main')
	<h2>{{$data['student']->name}}</h2>
	{{--<h2>{{$data['teacher']->id}}</h2>--}}

	<h4>Mã số sinh viên: {{$data['student']->code}}</h4>
	<h4>VNU Email: {{$data['student']->vnu_email}}</h4>

@endsection
