<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['pid','name'];
    public $timestamps = false;


    public function names()
    {
        return $this->hasMany('App\Models\AttributeName','cat_id');
    }
    public function childCategory()
    {
        return $this->hasMany('App\Models\Category', 'pid', 'id');
    }
    public function allChildrenCategorys()
    {
        return $this->childCategory()->with('allChildrenCategorys');
    }
    public function getCate()
    {
        $data = Category::with('allChildrenCategorys')->get();
        return $this->_tree($data);
        $arr = [];
        array_walk_recursive($data,function ($v, $k) use(&$arr) {
            if($k == 'id')
                $arr[] = $v;
        });
        return $arr;
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
