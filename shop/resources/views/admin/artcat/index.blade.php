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
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Bordered Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
              <div class="col-sm-6">
                <a href="{{route('artcat.create')}}">
                  <i class="fa fa-plus"></i>
                  新建</a>
              </div>
              <div class="col-sm-2 col-sm-offset-4">


              </div>
          </div>
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">#</th>
              <th>文章分类</th>
              <th>上一级</th>
              <th style="width: 40px">Label</th>
            </tr>
            @foreach($data as $v)
            <tr>
              <td>{{$v['id']}}</td>
              <td>{{str_repeat('-',8*$v['level']) . $v['name']}}</td>
              <td>
                {{$v['pid']}}
              </td>
              <td><a href="{{route('artcat.edit',['id'=>$v['id']])}}"> <i class="fa fa-edit"></i></a> &nbsp; 
              <a href="javascript:;" class="fa fa-close" onclick="del({{$v['id']}},'artcat')"></a>                       </td>
            </tr>
            @endforeach
           
          </table>
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</section>
@endsection
