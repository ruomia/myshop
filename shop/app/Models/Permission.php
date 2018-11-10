<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name','url_path','pid'];
    public $timestamps = false;
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','role_permission');
    }
    public function getTop()
    {
        $data = Permission::get();
        return $this->_tree($data);
    }
    protected function _tree($data, $pid=0, $level=0)
    {
        // 定义一个数组保存排序好之后的数据
        static $_ret = [];
        foreach($data as $v)
        {
            if($v['pid'] == $pid)
            {
                // 标志它的级别
                $v['level'] = $level;
                // 挪到排序之后的数组中
                $_ret[] = $v;
                // 找 $v 的子分类
                $this->_tree($data, $v['id'], $level+1);
            }
        }
        // 返回排序好的数组
        return $_ret;
    }
}
