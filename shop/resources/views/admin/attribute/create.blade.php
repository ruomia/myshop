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
    <li class="active">添加记录</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>
   
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <form action="{{route('doAddAttr')}}" method="post">
          @csrf
          <div class="box-body">
            <div class="row">
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Minimal</label>
                  <select class="form-control" name="cat_id" style="width: 100%;">
                  <option value="">请选择</option>
                  @foreach($data as $v)
                    <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Disabled</label>
                  <input type="text" name="name" class="form-control" style="width: 100%;">
                </div>

                
                <div class="form-gorup">
                  <input type="hidden" name="pid" value="0">
                  <button type="button" id="add" class="btn btn-info">添加属性值</button>
  
                  <button type="submit" class="btn btn-success" style="float:right">确定</button>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6" id="attributeValue">
                
                <div class="form-group">
                  <label>属性值</label>
                  <input type="text" name="value[]" class="form-control" style="width: 100%;">
                </div>
        

                
                <!-- /.form-group -->
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
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection
