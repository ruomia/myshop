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
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
         
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>商品名称</th>
                <th>商品属性</th>
                <th>库存</th>
                <th>价格</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
              <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->goods_name}}  {{$v->name}}</td>
                <td>{{$v->values}}</td>
                <td>{{$v->stock}}</td>
                <td>{{$v->price}}</td>
                <td><a href="{{route('sku.edit',['id'=>$v->id])}}" title="修改"><i class="fa fa-edit"></i></a> &nbsp;
                <a href="javascript:;" class="fa fa-close" onclick="del({{$v->id}},'sku')"></a>
                  </td>
              </tr>
            @endforeach
              </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

@endsection