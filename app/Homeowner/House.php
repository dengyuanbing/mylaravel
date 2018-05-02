<?php

namespace App\Homeowner;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    //房产表
    protected $table = 't_fangchan';

    public $timestamps = false;

    protected $primaryKey = 'ID';
}
