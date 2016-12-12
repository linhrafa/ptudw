
<?php //ĐÂY LÀ 1 FILE ROUTE
	Route::post('source1/source2','example_controller@test');
?>
<?php //ĐÂY LÀ 1 CONTROLLER
	class example_controller 

	{
		protected function test(Request $request) // Truyền biến $request vào trong function. sau khi ajax gửi thông tin đến controller thì biến $request sẽ có tham số.
		{
			//$request->param1 == 1996
			$year = array();
			$year[] = $request->param1;
			$year[] = $request->param2;
			$year[] = $request->param3;
			

			return json_encode($year); //encode từ array to json để trả kết quả về ajax
		}	
	}
?>
<html>
	<div id="year1">1996</div>
	<div id="year2">1997</div>
	<div id="year3">1998</div>

	<div id="send">send</div>
	<script>
		$(document).ready(function() {
			$("#send").click(function(){
				$.ajax({
					url: 'source1/source2', /* thay 'source1/source2' bằng tên Route như phía trên route có tên là 'source1/source2' thì:
					url: 'source1/source2'
					*/
					type: 'POST', /*Có 2 lựa chọn là POST hoặc GET. nếu POST thì bảo mật hơn vì GET nó truyền biến trên thanh địa chỉ.
					- nếu như ROUTE mình định nghĩa truyền theo post (Route::post();) thì:
					type phải là POST;
					- nếu như ROUTE mình định nghĩa truyền theo get (Route::get();) thì:
					type phải là GET; 
					Khuyến khích POST hết
					*/
					dataType: 'JSON', // còn nhiều kiểu dữ liệu nhưng cứ cái này cho đồng bộ
					data: { 
						/*
						Đây là dữ liệu truyền vào controller mà biến $request sẽ nhận được.
						Theo kiểu json nhé
						*/
						param1: $("#year1").text(),
						// trong controller thì $request->param1 sẽ bằng 1996;
						param2: $("#year2").text(),
						// trong controller thì $request->param2 sẽ bằng 1997;
						param3: $("#year3").text(),
						// trong controller thì $request->param3 sẽ bằng 1998;
					},
				})
				.done(function(response) {
					// biến response chính là JSON được trả về tại controller;
					// như trên JSON chính là $year được encode
					// hay response == {1996,1997,1998}
					// response[0] == 1996;
					/*các câu lệnh trong đây được chạy khi ajax success
					 ajax success khi:
					 1: code ajax không bị lỗi chỗ nào.
					 2: code php chạy bị lỗi: ví dụ như cú pháp sai, insert database lỗi ..v..v
					*/
					console.log("success");
				})
				.fail(function() {
					//ngược lại so với cái trên
					console.log("error");
				})
				.always(function() {
					// luôn luôn chạy hàm này dù đúng hay sai
					console.log("complete");
				});
				
			});
		});	
	</script>
</html>