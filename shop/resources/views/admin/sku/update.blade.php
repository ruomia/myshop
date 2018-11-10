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
          <h3 class="box-title">{{$goods}}</h3>

          <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div> -->
        </div>
        <!-- /.box-header -->
        <form action="{{route('sku.update',['id'=>$sku->id])}}" method="POST" enctype="multipart/form-data">
          @csrf @method('PUT')
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
              @foreach($data as $v)
                <div class="form-group">
                  <label>{{$v->name}}</label>
                  <select class="form-control" name="attribute[]" style="width: 100%;">
                    <option value="">请选择</option>
                    @foreach($v->values as $v2)
                    <option value="{{$v2->id}}" @if(in_array($v2->id, $sku->valuer)) selected @endif >{{$v2->value}}</option>
                    @endforeach
                  </select>
                  
                </div>
                @endforeach
           
            
                <!-- /.form-group -->
             
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              <div class="form-group">
                <label>sku名称</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-bars"></i>
                    </div>
                    <input type="text" class="form-control" name="name" value="{{$sku->name}}">
                  </div> 
                </div>
                <div class="form-group">
                <label>库存</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-bars"></i>
                    </div>
                    <input type="text" class="form-control" name="stock" value="{{$sku->stock}}">
                  </div> 
                </div>
                <div class="form-group">
                  <label>价格</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-yen"></i>
                    </div>
                    <input type="text" class="form-control" name="price" value="{{$sku->price}}">
                  </div> 
                </div>
  
                <!-- /.form-group -->
              <div class="form-group">
           
                <button type="submit" class="btn btn-success">确定</button>
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