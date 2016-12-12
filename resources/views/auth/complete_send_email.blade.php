<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{csrf_token()}}" />
	<title></title>
	<link rel="stylesheet" href="/public/css/login.css">
	<link href="/webarch/webarch/HTML/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	 <link href="/webarch/webarch/HTML/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet"
          type="text/css"/>
</head>
<body>
	<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="/storage/app/public/images/coltech.jpg" />
            <form id="auth_login" method="post" class="form-signin">
                
				<label>Link tạo mật khẩu mới đã gửi đến mail <span class="text-success">{{$vnu_email}}</span></label>
                <input name="_token" value="{{csrf_token()}}" hidden>
                <a href="/dat-lai-mat-khau"><button id="dauth_login" class="btn btn-lg btn-primary btn-block btn-signin" type="button">Thực hiện lại</button></a>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
<script src="/public/js/lib/jquery-3.1.0.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="/public/js/my_jquery.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>

    
