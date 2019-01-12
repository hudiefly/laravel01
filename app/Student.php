<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //指定表名
    protected $table='students';

    // 指定主键
    protected $primaryKey='id';
}
