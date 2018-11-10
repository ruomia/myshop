@extends('admin.layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
          <!-- /.box -->

          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <form action="{{route('goods.update',['id'=>$goods->id])}}" method="POST" enctype="multipart/form-data">
          @csrf @method('PUT')
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>商品分类</label>
                  <select class="form-control" name="cat_id" style="width: 100%;">
                    <option>请选择</option>
                    @foreach($cate as $v)
                    <option value="{{$v->id}}" @if($goods->cat_id == $v->id) selected @endif >{{str_repeat('-',8*$v['level']) . $v['name']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>商品名称</label>
                  <input type="text" name="name" class="form-control" placeholder="名称" value="{{$v->name}}">
                </div>
                <div class="form-group">
                <label>商品品牌</label>
                <select class="form-control" name="brand_id" style="width: 100%;">
                    <option>请选择</option>
                    @foreach($brand as $v)
                    <option value="{{$v->id}}" @if($goods->brand_id == $v->id) selected @endif>{{$v['name']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>副标题</label>
                  <input type="text" name="subtitle" class="form-control" placeholder="名称" value="{{$goods->subtitle}}">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                      <label for="logo">LOGO</label>
                      <div class="img_preview"><img src="{{asset('uploads/'.$goods->logo)}}" width="120"></div>
                      <input type="file" name="logo" id="logo" class="preview">
                  </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Multiple</label>
                  <textarea name="description" id="" cols="80" rows="10" placeholder="商品描述">{{$goods->description}}</textarea>
                </div>
                <div class="form-group">
                  <label>Multiple</label>
                  <textarea name="after_service" id="" cols="80" rows="10" placeholder="售后服务">{{$goods->after_service}}</textarea>
                </div>
                <!-- /.form-group -->
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg">确定</button>
              </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </form>
        <!-- /.box-body -->
        <div class="box-footer">
          Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
          the plugin.
        </div>
      </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


      
      <!-- /.box -->
@endsection

@section('js')
<script src="/js/img_preview.js"></script>
@endsection

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
    <link rel="stylesheet" href="/css/adminlte/AdminLTE.css">
    <link rel="stylesheet" href="/css/adminlte/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
	<script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    
</head>

<body class="hold-transition skin-red sidebar-mini">
  <!-- .box-body -->
                
  <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <form action="{{route('goods.update',['id'=>$goods->id])}}" method="POST" enctype="multipart/form-data">
          @csrf @method('PUT')
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
               
                <div class="form-group">
                  <label>商品名称</label>
                  <input type="text" name="name" class="form-control" placeholder="名称" value="{{$data->name}}">
                </div>
                <div class="form-group">
               
                <div class="form-group">
                  <label>副标题</label>
                  <input type="text" name="subtitle" class="form-control" placeholder="名称" value="{{$data->group}}">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg">确定</button>
              </div>
              </div>
              <!-- /.col -->
            
              
                <!-- /.form-group -->
             

              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </form>
        <!-- /.box-body -->
</body>

</html>