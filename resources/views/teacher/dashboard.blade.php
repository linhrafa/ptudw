@extends('teacher.layout')

@section('main')
	<h2>{{$data['teacher']->name}}</h2>
	{{--<h2>{{$data['teacher']->id}}</h2>--}}
	<h4>Khoa {{$data['faculty']->name}}</h4>
	<h4>{{$data['dept']->name}}</h4>

	<h4>Trình độ: {{$data['teacher']->degree}}</h4>
	<h4>Lĩnh vực nghiên cứu: {{$data['teacher']->area_research}}</h4>

@endsection
