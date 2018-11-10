<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广告分类管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/adminlte/AdminLTE.css">
    <link rel="stylesheet" href="/css/adminlte/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
	<script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    
</head>

<body class="hold-transition skin-red sidebar-mini"  >
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">广告分类管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#createModal" ><i class="fa fa-file-o"></i> 新建</button>
                                        <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                                        <button type="button" class="btn btn-default" title="开启" onclick='confirm("你确认要开启吗？")'><i class="fa fa-check"></i> 开启</button>
                                        <button type="button" class="btn btn-default" title="屏蔽" onclick='confirm("你确认要屏蔽吗？")'><i class="fa fa-ban"></i> 屏蔽</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
							        名称：<input >	<button class="btn btn-default" >查询</button>                                    
                                </div>
                            </div>
                            <!--工具栏/-->

			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th> 
										  <th class="sorting_asc">分类ID</th>
									      <th class="sorting">分类名称</th>
									      <th class="sorting">分组</th>
									      <th class="sorting">KEY</th>
									      <th class="sorting">状态</th>								      							
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
									  @foreach($data as $k=>$v)
			                          <tr>
			                              <td><input  type="checkbox" ></td>			                              
				                          <td>{{$v->id}}</td>
									      <td>{{$v->name}}</td>
									      <td>{{$v->group}}</td>
									      <td>{{$v->key}}</td>
		                                  <td>
			                                 <span>@if($v->state===0) 无效 @elseif($v->state===1) 有效 @endif</span>	
		                                  </td>
		                                  <td class="text-center">                                           
		                                 	  <button type="button" class="btn bg-olive btn-xs" onclick="edit({{$k}})" data-toggle="modal" data-target="#editModal" >修改</button>                                           
		                                 	  <button type="button" class="btn btn-warning btn-xs" onclick="del({{$v->id}},'advertCat')"  >删除</button>                                           
		                                  </td>
									  </tr>
									  @endforeach
			                      </tbody>
			                  </table>
			                  <!--数据列表/--> 
                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->
	            <!-- 分页 -->
				
				                
<!-- 编辑窗口 -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
	<form action="{{route('advertCat.store')}}" method="post">
		@csrf
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">广告分类编辑</h3>
		</div>
		<div class="modal-body">							
			
				<table class="table table-bordered table-striped"  width="800px">
					<tr>
						<td>分类名称</td>
						<td><input name="name" class="form-control" placeholder="分类名称">  </td>
					</tr>
					<tr>
						<td>分组</td>
						<td><input name="group" class="form-control" placeholder="分组">  </td>
					</tr>	
					<tr>
						<td>KEY</td>
						<td><input name="key" class="form-control" placeholder="KEY">  </td>
					</tr>		      
					<tr>
						<td>是否有效</td>
						<td>
						<input name="state" type="checkbox" value="1" class="icheckbox_square-blue" >
						</td>
					</tr>  	
				</table>				
	
		</div>
		<div class="modal-footer">						
			<button type="submit" class="btn btn-success"  aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
		</form>
	  </div>
	</div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content" id="edit-model">

	</div>
</div>

 <script>
    var str = "{{$data}}";
    var s1=str.replace(/&quot;/g,'"');
    var s2 = JSON.parse(s1);
    function edit(k){  
		var art1,art2;
		if(s2[k].state ===0)
		{	
			art1 = 'checked';
		}
		else if(s2[k].state ===1)
		{
			art2 = 'checked';
		}
		var form =`<form action="/admin/advertCat/${s2[k].id}" method="post">
		@csrf @method('PUT')
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">广告分类编辑</h3>
		</div>
		<div class="modal-body">							
				<table class="table table-bordered table-striped"  width="800px">
					<tr>
						<td>分类名称</td>
						<td><input name="name" class="form-control" placeholder="分类名称" value="${s2[k].name}">  </td>
					</tr>
					<tr>
						<td>分组</td>
						<td><input name="group" class="form-control" placeholder="分组" value="${s2[k].group}">  </td>
					</tr>	
					<tr>
						<td>KEY</td>
						<td><input name="key" class="form-control" placeholder="KEY" value="${s2[k].key}">  </td>
					</tr>		      
					<tr>
						<td>是否有效</td>
						<td>
						<input name="state" type="radio" value="0" class="icheckbox_square-blue" ${art1}>无效
						<input name="state" type="radio" value="1" class="icheckbox_square-blue" ${art2}>有效
						</td>
					</tr>  	
				</table>				
		</div>
		<div class="modal-footer">						
			<button type="submit" class="btn btn-success"  aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
		</form>`;	
		$("#edit-model").children().remove();
		$("#edit-model").append(form);	
	}
	function del(id,url)
	{
	var url = "/admin/"+url+"/"+id;
	var form = $(` <form action="${url}" method="POST">
				@csrf @method('DELETE')
				</form> `);
	form.appendTo('body').submit().remove();
	return;
	}
  </script>
</body>

</html>