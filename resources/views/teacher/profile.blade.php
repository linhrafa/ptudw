
@extends('teacher.layout')
@section('name_page')
    Trang cá nhân
@endsection
@section('main')
<div class="row">
            <div class="col-md-6">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><span class="semi-bold">Thông tin cơ bản</span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border">
                 <div class="form-group">
        <label>Tên giảng viên: </label>
        <input type="text" class="form-control" id="name_profile" value="{{$user->name}}" disabled>
    </div>
    <div class="form-group">
        <label>Mã giảng viên: </label>
        <input type="text" class="form-control" id="code_profile" value="{{$user->code}}" disabled>
    </div>
    <div class="form-group">
        <label>Vnu Email: </label>
        <input type="text" class="form-control" id="vnu_email_profile" value="{{$user->vnu_email}}" disabled>
    </div>
    <div class="form-group">
        <label>Học vị: </label>
        <input type="text" class="form-control" id="degree_profile" value="{{$user->degree}}" disabled>
    </div>
    <div class="form-group">
        <label>Chức vụ trong khoa: </label>
        <input type="text" class="form-control" id="chucvu_profile" value="{{$user->chucvu}}" disabled>
    </div>

    <div class="form-group">
        <label>Bộ môn: </label>
        <select id="department_id" name="department_id" class="form-control" disabled>
            @foreach($list_department as $item)
                @if($item['id'] == $user->department_id)
                    <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                @else
                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endif 
            @endforeach
        </select>
        
    </div>
                </div>
              </div>
            </div>      
            <div class="col-md-6">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><span class="semi-bold">Lĩnh vực nghiên cứu</span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>
                    <div class="form-group">
                        <label>Mô tả thêm về lĩnh vực nghiên cứu </label>
                        <textarea class="form-control" id="description_profile">{{$user->description}}</textarea>
                    </div>
                    @foreach($list_research_area as $key => $value)
                        <div id="{{$key}}" class="research_area children-{{$value->depth}}"><input type="checkbox"> {{$value->name}}</div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
@endsection()