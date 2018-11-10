@extends('admin.layouts.main')

@section('content')

        <div class="box-header with-border">
          <h3 class="box-title">Bordered Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
              <div class="col-sm-6">
                <a href="{{route('addCate')}}">
                  <i class="fa fa-plus"></i>
                  新建</a>
              </div>
              <div class="col-sm-2 col-sm-offset-4">


              </div>
          </div>
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">#</th>
              <th>分类名称</th>
              <th>上级ID</th>
              <th style="width: 40px">Label</th>
            </tr>
            @foreach($data as $v)
            <tr>
              <td>{{$v['id']}}</td>
              <td>{{str_repeat('-',8*$v['level']) . $v['name']}}</td>
              <td>
                {{$v['pid']}}
              </td>
              <td><a href="{{route('editCate',['id'=>$v['id']])}}"> <i class="fa fa-edit"></i></a> &nbsp; 
              <a href="{{route('delCategory',['id'=>$v['id']])}}"><i class="fa fa-close"></i></a></td>
            </tr>
            @endforeach
           
          </table>
        </div>
        <!-- /.box-body -->
        
@endsection
