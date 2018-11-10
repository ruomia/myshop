<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广告管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/adminlte/AdminLTE.css">
    <link rel="stylesheet" href="/css/adminlte/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
	<script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    
</head>

<body class="hold-transition skin-red sidebar-mini">
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">广告管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button>
                                        <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                                        <button type="button" class="btn btn-default" title="开启" onclick='confirm("你确认要开启吗？")'><i class="fa fa-check"></i> 开启</button>
                                        <button type="button" class="btn btn-default" title="屏蔽" onclick='confirm("你确认要屏蔽吗？")'><i class="fa fa-ban"></i> 屏蔽</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
							                                  
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
										  <th class="sorting_asc">广告ID</th>
									      <th class="sorting">分类ID</th>
									      <th class="sorting">标题</th>
									      <th class="sorting">URL</th>		
									      <th class="sorting">图片</th>	
									      <th class="sorting">排序</th>		
									      <th class="sorting">是否有效</th>											     						      							
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
									  @foreach($data as $v)
			                          <tr>
			                              <td><input  type="checkbox"></td>			                              
				                          <td>{{$v->id}}</td>
									      <td>{{$v->cat_id}}</td>
									      <td>{{$v->title}}</td>
									      <td>{{$v->url}}</td>
									      <td>
									      	<img alt="" src="{{asset('uploads/'.$v->logo)}}" width="100px" height="50px">
									      </td>
									      <td>{{$v->sort}}</td>
									      <td>{{$v->state}}</td>									     								     
		                                  <td class="text-center">                                           
										  <a href="{{route('advert.edit',['id'=>$v->id])}}"> <i class="fa fa-edit"></i></a> &nbsp; 
             								<a href="javascript:;" class="fa fa-close" onclick="del({{$v->id}},'advert')"></a>  
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

		
<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<form action="{{route('advert.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">广告编辑</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
				<tr>
		      		<td>广告分类</td>
		      		<td>
		      			<select class="form-control" name="cat_id">
							  <option value="">请选择</option>
							  @foreach($cat as $v)
							  <option value="{{$v->id}}">{{$v->name}}</option>
							  @endforeach
		                </select>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>标题</td>
		      		<td><input  class="form-control" placeholder="标题" name="title">  </td>
		      	</tr>
			    <tr>
		      		<td>URL</td>
		      		<td><input  class="form-control" placeholder="URL" name="url">  </td>
		      	</tr>	
		      	<tr>
		      		<td>排序</td>
		      		<td><input  class="form-control" placeholder="排序" name="sort">  </td>
		      	</tr>			      	
		      	<tr>
		      		<td>广告图片</td>
		      		<td>
						<table>
							<tr>
								<td>
								<input type="file" id="file" name="logo" class="preview"/>				                
					                
					            </td>
							</tr>						
						</table>
		      		</td>
		      	</tr>	      
		      	<tr>
		      		<td>是否有效</td>
		      		<td>
		      		   <input type="checkbox" name="state" value="1" class="icheckbox_square-blue" >
		      		</td>
		      	</tr>  	
			 </table>				
			
		</div>
		<div class="modal-footer">						
			<button class="btn btn-success"  aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
		</form>
	  </div>
	</div>
</div>
<script src="/js/img_preview.js"></script>
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
		      		<td>广告分类</td>
		      		<td>
		      			<select class="form-control" name="cat_id">
							  <option value="">请选择</option>
							  @foreach($cat as $v)
							  <option value="{{$v->id}}">{{$v->name}}</option>
							  @endforeach
		                </select>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>标题</td>
		      		<td><input  class="form-control" placeholder="标题" name="title" value="${s2[k].name}">  </td>
		      	</tr>
			    <tr>
		      		<td>URL</td>
		      		<td><input  class="form-control" placeholder="URL" name="url" value="${s2[k].name}">  </td>
		      	</tr>	
		      	<tr>
		      		<td>排序</td>
		      		<td><input  class="form-control" placeholder="排序" name="sort" value="${s2[k].name}">  </td>
		      	</tr>			      	
		      	<tr>
		      		<td>广告图片</td>
		      		<td>
						<table>
							<tr>
								<td>
								<div class="img_preview"><img src="" /></div>
								<input type="file" id="file" name="logo" class="preview"/>				                
					                
					            </td>
							</tr>						
						</table>
		      		</td>
		      	</tr>	      
		      	<tr>
		      		<td>是否有效</td>
		      		<td>
		      		   <input type="checkbox" name="state" value="1" class="icheckbox_square-blue" >
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