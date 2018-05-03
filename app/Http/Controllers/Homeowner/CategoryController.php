<?php

namespace App\Http\Controllers\Homeowner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Homeowner\Category;

class CategoryController extends Controller
{
    //获取首页报修分类
    public function get(){
        $categorys = Category::where('sfsyxs','=','1')->get();
//        $categorys = DB::select("select * from t_baoxiufenlei");
//        $re = ['code'=>1,'data'=>$categorys];
        return response() -> json( $categorys );
    }

    //根据一级分类 获取二级分类
    public function getSecond(Request $request){
        $first_ca = $request->first;
        $categorys = Category::where('sjflbh','=',$first_ca)->get();
        return response() -> json( $categorys );
    }
}
