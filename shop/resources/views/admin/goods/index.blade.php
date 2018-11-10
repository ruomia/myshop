@extends('admin.layouts.main')
@section('content')
      <div class="box">
        <div class="box-header  with-border">
          <h3 class="box-title">Data Table With Full Features</h3>
          <div class="box-tools pull-right">
            <a href="{{route('goods.create')}}"><i class="fa fa-plus"></i>新建</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>商品名称</th>
                <th>商品分类</th>
                <th>logo</th>
                <th>商品描述</th>
                <th>副标题</th>
                <th>状态</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
              <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->cat_id}}</td>
                <td><img src="{{URL::asset('uploads/'.$v->logo)}}" alt="" width="120"></td>
                <td>{{str_limit($v->description,20,'...')}}</td>
                <td>{{$v->subtitle}}</td>
                <td>{{$v->state}}</td>
                <td>
                <a href="{{route('goods.edit',['id'=>$v->id])}}" title="修改"><i class="fa fa-edit"></i></a>&nbsp;
                <a href="{{route('sku.create',['id'=>$v->id])}}" title="添加单品"><i class="fa fa-plus"></i></a>&nbsp;
                <a href="javascript:;" class="fa fa-close" onclick="del({{$v->id}},'goods')"></a>
                  </td>
              </tr>
            @endforeach
              </tfoot>
          </table>
        </div>
        <div class="footer">
          {{$data->links()}}
        </div>
      </div>
@endsection