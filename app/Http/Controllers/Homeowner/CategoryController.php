<?php

namespace App\Http\Controllers\Homeowner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Homeowner\Category;

class CategoryController extends Controller
{
    //获取报修分类
    public function get(){
        $categorys = Category::where('sfsyxs','=','1')->get();
//        $categorys = DB::select("select * from t_baoxiufenlei");
//        $re = ['code'=>1,'data'=>$categorys];
        return response() -> json( $categorys );
        dd($categorys);
    }
}
