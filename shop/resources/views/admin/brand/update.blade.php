@extends('admin.layouts.main')
@section('content')

<section class="content-header">
  <h1>
    Simple Tables
    <small>preview of simple tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Simple</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-9">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">修改表单</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('brand.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">品牌名称</label>
                  <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="name" value="{{$data->name}}">
                </div>
                <div class="form-group">
                    <label for="logo">LOGO</label>
                    <div class="img_preview"><img src="{{asset('uploads/'.$data->logo)}}" width="120"></div>
                    <input type="file" name="logo" id="logo" class="preview">
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">确定</button>
              </div>
            </form>
        </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

@endsection

@section('js')
<script src="/js/img_preview.js"></script>
@endsection