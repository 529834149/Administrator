<?php
namespace App\Admin\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use ModelTree, AdminBuilder;
    
    protected $table = 'cbj_categories';
    protected $guarded = [];//忽略那些字段被插入
    protected $primaryKey = 'id';//定义主键
    public $timestamps = false;
    
}