<?php

namespace App\Homeowner;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //业主表
    protected $table = 't_kehu';

    public $timestamps = false;

    protected $primaryKey = 'ID';

    public $incrementing=false;//主键为非自增

    public function house(){
        return $this->hasMany('App\Homeowner\House','kehubianhao','ID');
    }
}
