@extends('home.layouts.home')
@section('title','地址管理')
@section('contentJs')
<script type="text/javascript" src="/js/plugins/citypicker/distpicker.data.js"></script>
<script type="text/javascript" src="/js/plugins/citypicker/distpicker.js"></script>
<!-- <script type="text/javascript" src="/js/pages/userInfo/distpicker.data.js"></script>
<script type="text/javascript" src="/js/pages/userInfo/distpicker.js"></script> -->
<script type="text/javascript" src="/js/pages/userInfo/main.js"></script>
@endsection

		@section('content')
		<div class="yui3-u-5-6">
			<div class="body userAddress">
				<div class="address-title">
					<span class="title">地址管理</span>
					<a data-toggle="modal" data-target=".edit" data-keyboard="false"   class="sui-btn  btn-info add-new">添加新地址</a>
					<span class="clearfix"></span>
				</div>
				<div class="address-detail">
					<table class="sui-table table-bordered">
						<thead>
							<tr>
								<th>姓名</th>
								<th>地址</th>
								<th>联系电话</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						@foreach($data as $v)
							<tr>
								<td>{{$v->name}}</td>
								<td>{{$v->province}} {{$v->city}} {{$v->district}} {{$v->detailed_address}}</td>
								<td>{{$v->mobile}}</td>
								<td>
									<a href="#">编辑</a>
									<a href="#">删除</a>
									@if($v->default==1)
									默认地址
									@else
									<a href="{{route('address.default',['id'=>$v->id])}}" onclick="confirm('确定要设置为默认地址吗？')">设为默认</a>
									@endif
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>                          
				</div>
				<!--新增地址弹出层-->
					<div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit" style="width:580px;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
								<h4 id="myModalLabel" class="modal-title">新增地址</h4>
							</div>
							<form action="{{route('address.store')}}" class="sui-form form-horizontal" method="post">
							<div class="modal-body">
							
								@csrf
									<div class="control-group">
									<label class="control-label">收货人：</label>
									<div class="controls">
										<input type="text" class="input-medium" name="name">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">所在地区：</label>
									<div class="controls">
										<div data-toggle="distpicker">
										<div class="form-group area">
											<select class="form-control" id="province1" name="province"></select>
										</div>
										<div class="form-group area">
											<select class="form-control" id="city1" name="city"></select>
										</div>
										<div class="form-group area">
											<select class="form-control" id="district1" name="district"></select>
										</div>
									</div>
									</div>									 
								</div>
								<div class="control-group">
									<label class="control-label">详细地址：</label>
									<div class="controls">
										<input type="text" class="input-large" name="detailed_address">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">联系电话：</label>
									<div class="controls">
										<input type="text" class="input-medium" name="mobile">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">邮箱：</label>
									<div class="controls">
										<input type="text" class="input-medium" name="email">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">地址别名：</label>
									<div class="controls">
										<input type="text" class="input-medium" name="alias">
									</div>
									<div class="othername">
										建议填写常用地址：<a href="#" class="sui-btn btn-default">家里</a>　<a href="#" class="sui-btn btn-default">父母家</a>　<a href="#" class="sui-btn btn-default">公司</a>
									</div>
								</div>
								
								
								
								
							</div>
							<div class="modal-footer">
								<button type="submit" class="sui-btn btn-primary btn-large">确定</button>
								<button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
							</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
		@endsection
           