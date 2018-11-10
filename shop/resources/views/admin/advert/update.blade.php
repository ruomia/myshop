<!DOCTYPE html>
<html>

<head>
  <!-- 页面meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>广告管理</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/adminlte/AdminLTE.css">
  <link rel="stylesheet" href="/css/adminlte/skins/_all-skins.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition  sidebar-mini">

  <form action="{{route('advert.update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
      <div class="box-header with-border">
        <h3 class="box-title">Select2</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <!-- /.box-header -->

      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>广告分类</label>
              <select class="form-control" name="cat_id" style="width: 100%;">
                <option>请选择</option>
                @foreach($cate as $v)
                <option value="{{$v->id}}" @if($data->cat_id == $v->id) selected @endif
                  >{{str_repeat('-',8*$v['level']) . $v['name']}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>标题</label>
              <input type="text" name="title" class="form-control" placeholder="名称" value="{{$v->name}}">
            </div>

            <!-- /.form-group -->
            <div class="form-group">
              <label for="logo">LOGO</label>
              <div class="img_preview"><img src="{{asset('uploads/'.$data->logo)}}" width="120"></div>
              <input type="file" name="logo" id="logo" class="preview">
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
              <label>网址</label>
              <input type="text" name="url" class="form-control" style="width: 100%;" value="{{$data->url}}">
            </div>
            <div class="form-group">
              <label>排序</label>
              <input type="text" name="sort" class="form-control" style="width: 100%;" value="{{$data->sort}}">
            </div>
            <div class="form-group">
              <label>状态</label>
              <div class="form-group">

                <input type="radio" name="state" value="0" id="" @if($data->state===0) checked @endif >无效


                <input type="radio" name="state" value="1" id="" @if($data->state===1) checked @endif >有效

              </div>

            </div>
            <!-- /.form-group -->

          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
 

    <!-- /.box-body -->
      <div class="box-footer">
        <div class="form-group">
          <button type="submit" class="btn btn-success">确定</button>
        </div>
      </div>

  </form>
  <script src="/js/img_preview.js"></script>

</body>

</html>