@extends('layouts.layout')
@section('sidebar')
	<li class="active"><a href="index.html"> <i class="icon-custom-home"></i> <span
                                class="title">Tổng quan</span></span> </a>

                </li>

                <li class=""><a href="javascript:;"> <i class="fa fa-file-text"></i> <span class="title">Thông tin cá nhân</span>
                        <span class="arrow "></span> </a>
                    <ul class="sub-menu">
                        <li><a href="/thong-tin-ca-nhan">Thông tin cá nhân</a></li>
                        <li><a href="/duyet-sinh-vien">Duyệt đề tài sinh viên</a></li>
                    </ul>
                </li>
                <li class=""><a href="javascript:;"> <i class="icon-custom-ui"></i> <span
                                class="title">Quản Lý Sinh Viên</span> <span class="arrow "></span> </a>
                    <ul class="sub-menu">
                        <li><a href="/them-sinh-vien"> Danh Sách Sinh Viên </a></li>
                        <li><a href="/them-sinh-vien"> Thêm Sinh Viên </a></li>
    
                    </ul>
                </li>
@endsection
@section('script')
	<script type="text/javascript" src="/public/js/teacher/teacher.js"></script>
    <script type="text/javascript" src="/public/js/teacher/teacher_hung.js"></script>
    <script type="text/javascript" src="/public/js/teacher/teacher_duong.js"></script>

@endsection