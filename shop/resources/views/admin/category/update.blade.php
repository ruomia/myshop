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
            <form role="form" action="{{route('doEditCate',['id'=>$cate->id])}}" method="post">
              @csrf
              <div class="box-body">
              <div class="form-group">
                <label>分类</label>
                <select class="form-control" name="pid" id="editSelect" style="width: 100%;">
                  <option value="0">请选择</option>
                  @foreach($data as $v)
                  <option value="{{$v['id']}}" @if($cate->pid==$v['id']) selected @endif>{{str_repeat('-',8*$v['level']) . $v['name']}}</option>
                  @endforeach
                </select>
              </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">分类名称</label>
                  <input type="text" name="name" class="form-control" id="example1" placeholder="name" value="{{$cate->name}}">
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
<script>
function del(o)
  {
    $(o).parent().remove();
  }
$(function(){
  $("#add").click(function(){
    var str = `<div class="form-group">
                  <label>Disabled Resul</label><button type="button" class="btn btn-warning btn-sm" onclick="del(this)" style="float:right"><i class="fa fa-close"></i></button>
                  <input type="text" name="value[]" class="form-control" style="width: 100%;">
                </div>`;
    $("#attributeValue").append(str);
  
  })
  
})
</script>
@endsection