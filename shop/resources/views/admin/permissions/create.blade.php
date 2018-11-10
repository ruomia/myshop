@extends('admin.layouts.main')
@section('content')

            <div class="box-header with-border">
              <h3 class="box-title">添加表单</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('permissions.store')}}" method="post">
              @csrf
              <div class="box-body">
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="权限名称">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">URL</label>
                  <input type="text" name="url_path" value="" class="form-control" id="exampleInputPassword1" placeholder="对应的URL地址，多个地址用,隔开">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">上级权限</label>
                  <select name="pid" id="" class="form-control">
                    <option value="0">请选择</option>
                    @foreach($data as $v)
                    <option value="{{$v['id']}}">{{str_repeat('-',8*$v['level']) . $v['name']}}</option>
                    @endforeach
                  </select>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">确定</button>
              </div>
            </form>
          </div>


         
   

@endsection
