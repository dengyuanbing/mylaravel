<?php

namespace App\Homeowner;

use Illuminate\Database\Eloquent\Model;

class Repairorders extends Model
{
    //报修单
    protected $table = 't_baoxiudan';

    public $timestamps = false;

    protected $primaryKey = 'ID';

    public $incrementing=false;//主键为非自增

    public function task(){
        return $this->hasMany('App\Homeowner\Task','bxdbh','ID');
    }
}
