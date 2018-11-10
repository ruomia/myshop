@extends('admin.layouts.main')

@section('content')
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Bordered Table</h3>
          <div class="box-tools pull-right">
          <a href="{{route('admin.create')}}">
                  <i class="fa fa-plus"></i>
                  新建</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
      
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">#</th>
              <th>用户名</th>
              <th>角色名称</th>
      
              <th style="width: 40px">Label</th>
            </tr>
            @foreach($data as $v)
            <tr>
              <td>{{$v->id}}</td>
              <td>{{$v->username}}</td>
              <td>
              @foreach($v->roles as $v1)
              {{$v1->name}},
              @endforeach
              </td>
              <td><a href="{{route('admin.edit',['id'=>$v->id])}}"> <i class="fa fa-edit"></i></a> &nbsp; 
              <a href="javascript:;" class="fa fa-close" onclick="del({{$v->id}},'admin')"></a>                   
              </td>
            </tr>
            @endforeach
           
          </table>
        </div>
        <!-- /.box-body -->
      </div>
@endsection
