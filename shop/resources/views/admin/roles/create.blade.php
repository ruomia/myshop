@extends('admin.layouts.main')
@section('content')
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">添加表单</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('roles.store')}}" method="post">
              @csrf
              <div class="box-body">
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="权限名称">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">URL</label><br>
                  @foreach($data as $v)
                  <input type="checkbox" name="permission_id[]" id="" value="{{$v['id']}}">{{str_repeat('-',8*$v['level']) . $v['name']}}<br>
                  @endforeach
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">确定</button>
              </div>
            </form>
          </div>


         
   

@endsection
