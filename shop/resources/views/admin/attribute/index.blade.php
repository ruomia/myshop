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
    <li class="active">单品列表</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">详情列表</h3>
          <div class="box-tools pull-right">
            <a href="{{route('addAttr')}}">
                <i class="fa fa-plus"></i>
                新建</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>分类</th>
                <th>属性</th>
                <th>属性值</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>


              @foreach($data as $v)

              <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->category}}</td>
                <td>{{$v->name}}</td>
                <td>@foreach($v->values as $v1)
                  {{$v1->value}}<br>
                @endforeach
                </td>
          
                <td><a href="{{route('editAttr',['id'=>$v->id])}}" title="修改">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a href="javascript:;" class="fa fa-close" onclick="del({{$v->id}},'attribute')"></a>
                </td>
              </tr>
             @endforeach
              </tfoot>
          </table>
          {{$data->links()}}
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