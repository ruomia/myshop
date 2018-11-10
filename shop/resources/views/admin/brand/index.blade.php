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
          <div class="box-tools pull-right">
            <a href="{{route('brand.create')}}"><i class="fa fa-plus"></i> 新建</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">#</th>
              <th>品牌名称</th>
              <th>logo</th>
              <th style="width: 40px">Label</th>
            </tr>
            @foreach($data as $v)
            <tr>
              <td>{{$v->id}}</td>
              <td>{{$v->name}}</td>
              <td> 
                <img src=" {{asset('uploads/'.$v->logo)}}" alt="" width="70">
              </td>
              <td><a href="{{route('brand.edit',['id'=>$v->id])}}"> <i class="fa fa-edit"></i></a> &nbsp; 
              <a href="javascript:;" class="fa fa-close" onclick="del({{$v->id}},'brand')"></a>          
       </td>
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

