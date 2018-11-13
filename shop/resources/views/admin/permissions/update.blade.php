@extends('admin.layouts.main')
@section('content')
<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">修改表单</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('permissions.update',['id'=>$arr->id])}}" method="post">
              @csrf @method('PUT')
              <div class="box-body">
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="权限名称" value="{{$arr->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">URL</label>
                  <input type="text" name="url_path" value="{{$arr->url_path}}" class="form-control" id="exampleInputPassword1" placeholder="对应的URL地址，多个地址用,隔开" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">上级权限</label>
                  <select name="pid" id="" class="form-control">
                    <option value="0">请选择</option>
                    @foreach($data as $v)
                    <option value="{{$v['id']}}" @if($arr->pid == $v['id']) selected @endif>{{str_repeat('-',8*$v['level']) . $v['name']}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">确定</button>
              </div>
            </form>
          </div>


         
   

@endsection
