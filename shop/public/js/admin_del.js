function del(id,url)
{
  var url = "/admin/"+url+"/"+id;
  var form = $(` <form action="${url}" method="POST">
               @csrf @method('DELETE')
              </form> `);
  form.appendTo('body').submit().remove();
  return;
}