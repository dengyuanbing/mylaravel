<?php

namespace App\Homeowner;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //任务单
    protected $table = 't_renwudan';

    public $timestamps = false;

    protected $primaryKey = 'ID';

    public $incrementing=false;//主键为非自增
}
