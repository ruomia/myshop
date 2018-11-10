@extends('admin.layouts.main')
@section('content')

            <div class="box-header with-border">
              <h3 class="box-title">添加表单</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('roles.update',['id'=>$arr->id])}}" method="post">
              @csrf @method('PUT')
              <div class="box-body">
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="权限名称" value="{{$arr->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">URL</label><br>
                  @foreach($data as $v)
                  <input type="checkbox" name="permission_id[]" id="" value="{{$v['id']}}"  @if(in_array($v['id'], $ret)) checked @endif>{{str_repeat('-',8*$v['level']) . $v['name']}}<br>
                  @endforeach
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">确定</button>
              </div>
            </form>
          </div>


         
   

@endsection
