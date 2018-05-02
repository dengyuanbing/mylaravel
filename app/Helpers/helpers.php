<?php

if(!function_exists('sendSMS')){
    /**
     * 助通发送短信
     * @param $mobile 手机号
     * @param $content 短信内容
     * @return bool
     */
    function sendSMS($mobile,$content){
        $username = env('SMS_USERNAME');
        $password = env('SMS_PASSWORD');
        $groupname = env('SMS_GROUPNAME');
//        echo $username.'--'.$password.'--'.$groupname;
        if($username==''|| $password=='' || $groupname=='') die("请先完善短信发送平台配置");
        $mobile	 = $mobile;
        $content = $content."【".$groupname."】";
        $content=iconv("UTF-8", "UTF-8", $content);
        $content = urlencode($content);
        $dstime = '';		
        $productid = 676767;		
        $xh = '';		
        $url='http://www.ztsms.cn:8800/sendXSms.do?username='.$username.'&password='.$password.'&mobile='.$mobile.'&content='.$content.'&dstime='.$dstime.'&productid='.$productid.'&xh='.$xh;
//        echo $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $result = curl_exec($ch);
//        $crul_info = curl_getinfo($ch);
//        curl_close($ch);
//        var_dump($result);
//        var_dump($crul_info);
        return true;
    }
}

















?>