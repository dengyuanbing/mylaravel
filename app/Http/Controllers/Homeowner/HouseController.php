<?php

namespace App\Http\Controllers\Homeowner;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Homeowner\Owner;

class HouseController extends Controller
{
    //
    public function get(Request $request,Response $response){
//        DB::connection()->enableQueryLog(); //打开sql 日志

        $owner_id = $request->owner;
        $owner = Owner::find($owner_id);

        $house = $owner->house;
        //$house = DB::select('select * from t_fangchan where kehubianhao=?',['KH2018-010014']);
//        print_r(DB::getQueryLog()); //查看sql 日志

        $response->house = $house;

        return response()->json($response);
    }
}
