<?php

namespace App\Http\Controllers\Homeowner;

use App\Homeowner\House;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Homeowner\Owner;

class HouseController extends Controller
{
    //获取业主房屋信息
    public function get(Request $request,Response $response){
//        DB::connection()->enableQueryLog(); //打开sql 日志

        $owner_id = $request->owner;
        $owner = Owner::find($owner_id);

        $house = $owner->house;
//        $house = DB::select('select * from t_fangchan where kehubianhao=?',['KH2018-010014']);
//        print_r(DB::getQueryLog()); //查看sql 日志

        $response->house = $house;

        return response()->json($response);
    }

    //创建业主房屋信息
    public function create(Request $request){
        $validator = Validator::make( $request->all(), $this->rules(), $this->messages() );

        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'message' => '字段规则不符合',
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }

        $house = new House;

        $house-> sheng = $request->sheng;
        $house-> shi = $request->shi;
        $house-> qu = $request->qu;
        $house-> lpmc = $request->lpmc;
        $house-> xxdz = $request->xxdz;

        $house-> kehubianhao = session('longin_info','KH2018-010014');
        $house->save();
    }

    //房屋信息验证
    public function rules(Request $request){
        return [
            'sheng' => 'required|max:10',
            'shi' => 'required|max:10',
            'qu' => 'required|max:10',
            'loupan' => 'required|max:20',
            'xxdz' => 'required|max:200',
            'fjh' => 'required|max:20'
        ];
    }

    /**
     * 错误信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sheng.required'       => '省必填',
            'shi.required'         => '市必填',
            'qu.required'            => '区必填',
            'loupan.required'   => '楼盘必填',
            'xxdz.required'            => '详细地址必填',
            'fjh.required'            => '房间号必填',

            'sheng.max'       => '省长度不符合',
            'shi.max'         => '市长度不符合',
            'qu.max'            => '区长度不符合',
            'loupan.max'   => '楼盘长度不符合',
            'xxdz.max'            => '详细地址长度不符合',
            'fjh.max'            => '房间号必填',
        ];
    }
}
