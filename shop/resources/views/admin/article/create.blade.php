@extends('admin.layouts.main')
@section('content')

            <div class="box-header with-border">
              <h3 class="box-title">添加表单</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('article.store')}}" method="post">
              @csrf
              <div class="box-body">
              <div class="form-group">
                <label>分类</label>
                <select class="form-control" name="cat_id" style="width: 100%;">
                  <option>请选择</option>
                  @foreach($data as $v)
                  <option value="{{$v['id']}}">{{str_repeat('-',8*$v['level']) . $v['name']}}</option>
                  @endforeach
                </select>
              </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">标题</label>
                  <input type="text" name="title" class="form-control" id="exampleInputPassword1" placeholder="name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">标题</label>
                  <textarea name="content" id="content" cols="30" rows="10"></textarea>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">确定</button>
              </div>
            </form>
          </div>


         

<link rel="stylesheet" type="text/css" href="/simditor-2.3.6/styles/simditor.css" />

<script type="text/javascript" src="/simditor-2.3.6/scripts/jquery.min.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/module.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/hotkeys.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/uploader.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/simditor.js"></script>
<script>
var editor = new Simditor({
  textarea: $('#content'),
  toolbar:[
    'title',
    'bold',
    'italic',
    'underline',
    'strikethrough',
    'fontScale',
    'color',
    'ol'    ,       
    'ul'         ,
    'blockquote',
    'code'       ,
    'table',
    'link',
    'image',
    'hr'          , 
    'indent',
    'outdent',
    'alignment'
    ],
    upload:{
        url:'/upload/upload',   // 服务器提交的地址
        params:'null',
        fileKey:'image',    // 服务器接收时的文件名
        connectionCount:3,
        leaveConfirm: '文件上传中，真要离开吗？'
    }
});
</script>
@endsection
