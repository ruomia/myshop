@extends('admin.layouts.main')

@section('content')

  

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">添加记录</h3>

          <div class="box-tools pull-right">
            <button type="button" id="addAtribute" class="btn" title="添加属性值"><i class="fa fa-plus"></i></button>

          </div>
        </div>
        <!-- /.box-header -->
        <form action="{{route('goods.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>商品分类</label>
                  <select class="form-control" name="cat_id" style="width: 100%;">
                    <option>请选择</option>
                    @foreach($cate as $v)
                    <option value="{{$v->id}}">{{str_repeat('-',8*$v['level']) . $v['name']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>商品名称</label>
                  <input type="text" name="name" class="form-control" placeholder="名称">
                </div>
                <div class="form-group">
                <label>商品品牌</label>
                <select class="form-control" name="brand_id" style="width: 100%;">
                    <option>请选择</option>
                    @foreach($brand as $v)
                    <option value="{{$v->id}}">{{$v['name']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>副标题</label>
                  <input type="text" name="subtitle" class="form-control" placeholder="名称">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                      <label for="logo">LOGO</label>
                      <input type="file" name="logo" id="logo" class="preview">
                  </div>

                   
              </div>
              <!-- /.col -->
              <div class="col-md-6" id="attribute">
                <div class="form-inline"><br>
                  <div class="form-group">
                    <label for="">属性名</label>
                    <input type="text" name="attributeName[]" class="form-control"  id="exampleInputName2" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">属性值</label>
                    <input type="text" name="attributeValue[]" class="form-control" id="exampleInputEmail2" placeholder="">
                  </div>
                  <a href="javascript:;" onclick="delAttribute(this)"><i class="fa fa-remove"></i></a>
                </div>
              </div>
              <!-- /.col -->

              <div class="col-md-12">
                <div class="form-group">
                  <label>商品描述</label>
                  <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group">
                  <label>售后服务</label>
                  <textarea class="form-control" name="after_service" rows="3" placeholder="Enter ..."></textarea>
                </div>
              </div>
            </div>
          
            <!-- /.row -->
          </div>
          <div class="box-footer">
            <div class="form-group">
              <button class="btn btn-success" type="submit">确定</button>
            </div>
        </div>
        </form>
        <!-- /.box-body -->
        
      </div>
          <!-- /.box -->
<link rel="stylesheet" type="text/css" href="/simditor-2.3.6/styles/simditor.css" />

<script type="text/javascript" src="/simditor-2.3.6/scripts/jquery.min.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/module.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/hotkeys.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/uploader.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/simditor.js"></script>
<script>
  var editor = new Simditor({
    textarea: $('#description'),
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

@section('js')
<script src="/js/img_preview.js"></script>
@endsection