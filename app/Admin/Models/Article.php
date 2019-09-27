<?php
namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
   
    protected $table = 'cbj_article';
    protected $guarded = [];//忽略那些字段被插入
    protected $primaryKey = 'id';//定义主键
    public $timestamps = false;
    
}