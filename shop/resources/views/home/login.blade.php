<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>品优购，欢迎登录</title>

	<link rel="stylesheet" type="text/css" href="/css/webbase.css" />
	<link rel="stylesheet" type="text/css" href="/css/pages-login.css" />
</head>

<body>
	<div class="login-box">
		<!--head-->
		<div class="py-container logoArea">
			<a href="#" class="logo"></a>
		</div>
		<!--loginArea-->
		<div class="loginArea">
			<div class="py-container login">
				<div class="loginform">
					<ul class="sui-nav nav-tabs tab-wraped">
						<li>
							<a href="#index" data-toggle="tab">
								<h3>扫描登录</h3>
							</a>
						</li>
						<li class="active">
							<a href="#profile" data-toggle="tab">
								<h3>账户登录</h3>
							</a>
						</li>
					</ul>
					<div class="tab-content tab-wraped">
						<div id="index" class="tab-pane">
							<p>二维码登录，暂为官网二维码</p>
							<img src="img/wx_cz.jpg" />
						</div>
						<div id="profile" class="tab-pane  active">
							<form class="sui-form" action="{{route('doLogin')}}" method="post">
								@csrf
								<div class="input-prepend"><span class="add-on loginname"></span>
									<input id="prependedInput" name="username" type="text" placeholder="邮箱/用户名/手机号" class="span2 input-xfat">
							
								</div>
								@if($errors->has('username'))
				  					<span style='color:red'>{{$errors->first('username')}}</span>
			  					@endif
								<div class="input-prepend"><span class="add-on loginpwd"></span>
									<input id="prependedInput" name="password" type="password" placeholder="请输入密码" class="span2 input-xfat">
								</div>
								@if($errors->has('password'))
				  					<span style='color:red'>{{$errors->first('password')}}</span>
			  					@endif
								<div class="setting">
									<label class="checkbox inline">
										<input name="m1" type="checkbox" value="2" checked="">
										自动登录
									</label>
									<span class="forget">忘记密码？</span>
								</div>
								<div class="logined">
									<button type="submit" class="sui-btn btn-block btn-xlarge btn-danger">登&nbsp;&nbsp;录</button>
								</div>
							</form>
							<div class="otherlogin">
								<div class="types">
									<ul>
										<li><img src="img/qq.png" width="35px" height="35px" /></li>
										<li><img src="img/sina.png" /></li>
										<li><img src="img/ali.png" /></li>
										<li><img src="img/weixin.png" /></li>
									</ul>
								</div>
								<span class="register"><a href="register.html" target="_blank">立即注册</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--foot-->
		<div class="py-container copyright">
			<ul>
				<li>关于我们</li>
				<li>联系我们</li>
				<li>联系客服</li>
				<li>商家入驻</li>
				<li>营销中心</li>
				<li>手机品优购</li>
				<li>销售联盟</li>
				<li>品优购社区</li>
			</ul>
			<div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
			<div class="beian">京ICP备08001421号京公网安备110108007702
			</div>
		</div>
	</div>

	<script type="text/javascript" src="/js/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="/js/plugins/jquery.easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="/js/plugins/sui/sui.min.js"></script>
	<script type="text/javascript" src="/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
	<script type="text/javascript" src="/js/pages/login.js"></script>
</body>

</html>