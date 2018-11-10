@extends('admin.layouts.main')

@section('content')

        <div class="box-header with-border">
          <h3 class="box-title">Bordered Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
              <div class="col-sm-6">
                <a href="{{route('article.create')}}">
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
              <th>文章标题</th>
              <th style="width: 80px">Label</th>
            </tr>
            @foreach($data as $v)
            <tr>
              <td>{{$v->id}}</td>
              <td>{{$v->category}}</td>
              <td>
                {{$v->title}}
              </td>
              <td><a href="{{route('article.edit',['id'=>$v->id])}}"> <i class="fa fa-edit"></i></a> &nbsp; 
             <a href="javascript:;" class="fa fa-close" onclick="del({{$v->id}},'article')"></a>          

              </td>
            </tr>
            @endforeach
           
          </table>
        </div>
        <!-- /.box-body -->
        
    
@endsection
