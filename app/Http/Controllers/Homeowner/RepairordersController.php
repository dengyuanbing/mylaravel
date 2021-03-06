<?php

namespace App\Http\Controllers\Homeowner;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Homeowner\Repairorders;
use App\Homeowner\House;
use App\Homeowner\Task;
use Illuminate\Support\Facades\DB;

class RepairordersController extends Controller
{
    //获取业主报修单
    public function get(Request $request){
        $owner_id = $request->ownerid;
        $repair_orders = Repairorders::where('yzbh','=',$owner_id)->select(['ID','ejfl','fcbh','createdate','zhuangtai'])->get();
        $repair_order = Repairorders::where('yzbh','=',$owner_id)->select(['ID','ejfl','fcbh','createdate','zhuangtai'])->first();
//        dd($repair_order->toarray());
//        session('order',$repair_order->toarray());
//        Session::put('order',$repair_order);
        dd(session('order'));
        
        $response = array();
        foreach ($repair_orders as $order) {
            $house = House::find($order->fcbh);
            $order->house = $house->sheng.$house->shi.$house->qu.$house->xxdz;
//            $tasks = $order->hasMany('App\Homeowner\Task','bxdbh','ID');
            $tasks = $order->task;
//            dd($tasks);
            if($tasks->count()){
                foreach($tasks as $task){
                    $worker = DB::table('t_weixiuyuan')->where('ID','=',$task->weixiuyuan)->first();
                    $order->worker_name = $worker->xingming;
                    $order->worker_phone = $worker->shouji;
                    unset($order->task);
                    $response[] = $order;
                }
            }else{
                $response[] = $order;
            }
        }
        return response()->json($response);
    }

    public function create(Request $request){
       header('Access-Control-Allow-origin:*');
        var_dump($_POST);
    }
}
