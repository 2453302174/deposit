<?php

use Illuminate\Http\Request;
use App\Libs\FormatResult;
use App\Models\InterfaceConfig;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::any('/gclients', function (Request $request) {

    $dataOri = $request->input('data', '');
    $sign = $request->input('sign', '');
    $data = json_decode($dataOri, true);
    $mch_md5_token = $request->get('mch_md5_token');

    $ret = new FormatResult($data);

    if(!empty($data['out_trant_no'])){

        $transaction = \App\Models\DepositTransaction::where('mch_no',$data['mch_no'])
            ->where('out_trant_no',$data['out_trant_no'])
            ->first();

        if(!$transaction){
            if(isset($data['biz_type'])){
                $biz_type = $data['biz_type'];
                if(!empty(InterfaceConfig::BIZ_TYPES[$biz_type])){
                    $bizRet = app('gclient')->doNormal(InterfaceConfig::BIZ_TYPES[$biz_type], json_encode([
                        'data' => $dataOri,
                        'sign' => $sign,
                        'mch_md5_token' => $mch_md5_token,
                        'ga_traceno' => app('ga_traceno')
                    ]));

                    return $bizRet;
                }
            }
        }
    }

    $ret->setError('OUT_TRANT_NO.INVALID');

    return json_encode(array(
            'data' => $ret->getData(),
            'sign' => ''
        ), JSON_UNESCAPED_UNICODE);


});
