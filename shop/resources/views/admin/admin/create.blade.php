@extends('admin.layouts.main')
@section('content')
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">添加表单</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.store')}}" method="post">
              @csrf
              <div class="box-body">
              
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="">URL</label><br>
                  @foreach($data as $v)
                  <label>
                  <input type="checkbox" name="role_id[]" id="" value="{{$v->id}}">{{$v->name}}
                  </label><br>
                  @endforeach
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">确定</button>
              </div>
            </form>
          </div>
       </div>  
   

@endsection
