<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function sendsms(){
        $re = sendSMS('17521261251','你的验证码是123456');
        var_dump($re);
    }
}
