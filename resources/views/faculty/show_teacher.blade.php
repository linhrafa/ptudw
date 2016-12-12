@extends('faculty.layout')

@section('name_page')
	Thêm giảng viên
@endsection

@section('main')
	<div class="row column-seperation">
      <div class="col-md-12">
        
        <div id="table_teacher">
          <table class="table table-bordered">

            <thead id="thead_table_teacher">
					<tr>
						<th>HỌ TÊN</th>
						<th>MÃ SỐ</th>
						<th>CHỨC DANH</th>
						<th>EMAIL</th>
						<th>CHỨC VỤ</th>
						<th>TÙY CHỌN</th>
					</tr>
            </thead>

            <tbody id="tbody_table_teacher">
            	  @foreach($teachers as $teacher)
		              <tr>
		                  <td>{{ $teacher->name }}</td>
		                  <td>{{ $teacher->code }}</td>
		                  <td>{{ $teacher->degree }}</td>
		                  <td>{{ $teacher->vnu_email }}</td>
		                  <td>{{ $teacher->area_research }}</td>
		                  <td></td>
		              </tr>
		          @endforeach
            </tbody>


          </table>
        </div>
      </div>
    </div>
@endsection