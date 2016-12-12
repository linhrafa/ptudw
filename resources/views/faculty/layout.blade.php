@extends('layouts.layout')
@section('sidebar')
	<li class="active"><a href="index.html"> <i class="icon-custom-home"></i> <span
                                class="title">Tổng quan</span></span> </a>

                </li>

                <li class=""><a href="javascript:;"> <i class="fa fa-file-text"></i> <span class="title">Quản lý giảng viên</span>
                        <span class="arrow "></span> </a>
                    <ul class="sub-menu">
                        <li><a href="/danh-sach-giang-vien"> Danh Sách Giảng Viên </a></li>
                        <li><a href="/them-giang-vien">Thêm Giảng Viên </a></li>
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
	<script type="text/javascript" src="/public/js/faculty/faculty.js"></script>
    <script type="text/javascript" src="/public/js/faculty/faculty_duong.js"></script>
    <script type="text/javascript" src="/public/js/faculty/faculty_hung.js"></script>
    <script type="text/javascript" src="/public/js/faculty/faculty_newstudent.js"></script>
@endsection