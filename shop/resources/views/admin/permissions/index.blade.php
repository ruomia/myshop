@extends('admin.layouts.main')

@section('content')
 <!-- Default box -->
 <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Title</h3>

    <div class="box-tools pull-right">
      <a href="{{route('permissions.create')}}"><i class="fa fa-plus"></i>新建</a>
    </div>
  </div>
  <div class="box-body">
  <table class="table table-bordered">
      <tr>
        <th style="width: 10px">#</th>
        <th>权限名称</th>
        <th>对应的URL地址，多个地址用,隔开</th>
        <th>上级权限的ID</th>
  
        <th style="width: 40px">Label</th>
      </tr>
      @foreach($data as $v)
      <tr>
        <td>{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->url_path}}</td>
        <td>{{$v->pid}}</td>
    
        <td><a href="{{route('permissions.edit',['id'=>$v->id])}}"> <i class="fa fa-edit"></i></a> &nbsp; 
        <a href="javascript:;" class="fa fa-close" onclick="del({{$v->id}},'permissions')"></a>                       </td>
      </tr>
      @endforeach
      
    </table>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Footer
  </div>
  <!-- /.box-footer-->
</div>
      <!-- /.box -->
@endsection
