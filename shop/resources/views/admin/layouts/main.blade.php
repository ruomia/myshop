<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>后台</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/adminlte/AdminLTE.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/adminlte/skins/_all-skins.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="background-color:#ecf0f5;">

  @yield('content');

    
</body>
@yield('js')
<script>
function del(id,url)
{
  if(confirm('确定要删除吗？'))
  {
    var url = "/admin/"+url+"/"+id;
    var form = $(` <form action="${url}" method="POST">
                @csrf @method('DELETE')
                </form> `);
    form.appendTo('body').submit().remove();
    return;
  }
}
function delAttribute(o)
  {
    var div = $(o).parent().remove();
  }
$(function(){
  $("#add").click(function(){
    var str = `<div class="form-group">
                  <label>属性值</label><a href="javascript:;" onclick="delAttribute(this)" style="float:right"><i class="fa fa-close"></i></a>
                  <input type="text" name="value[]" class="form-control" style="width: 100%;">
                </div>`;
    $("#attributeValue").append(str);
  
  })
  $("#addAtribute").click(function(){
    var str = `<div class="form-inline"><br>
                <div class="form-group">
                  <label for="exampleInputName2">属性名</label>
                  <input type="text" name="attributeName[]" class="form-control" id="exampleInputName2" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">属性值</label>
                  <input type="text" name="attributeValue[]" class="form-control" id="exampleInputEmail2" placeholder="">
                </div>
                <a href="javascript:;" onclick="delAttribute(this)"><i class="fa fa-remove"></i></a>
              </div>`;
    $("#attribute").append(str);
  
  })
  
})
</script>
</html>
