<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2018/6/27
 * Time: 14:39
 */

namespace App\Console\Commands;


use Illuminate\Support\Facades\DB;

trait GearCommandGeneralTrait
{
    //验证签名
    public function workSignverify($dataOri, $sign, $data, $bizContent, $bizContentFormat, $depoTrans){
    $mch_no = $data['mch_no'];

    $interfaceConfig = DB::table('interface_config')->where('mch_no', $mch_no)->first();

    if(!empty($interfaceConfig)){
        $signCal = \App\Libs\SignMD5Helper::genSign($dataOri, $interfaceConfig->md5_token);

        if($signCal == $sign){
            $this->_formatResult->setSuccess([
                'mch_md5_token' => $interfaceConfig->md5_token
            ]);
            return $this->_signReturn($this->_formatResult->getData());
        }
    }

    $this->_formatResult->setError('SIGN.VERIFY.FAIL');
    return $this->_signReturn($this->_formatResult->getData());
}

    //验证外部追宗号
    public function workOuttransnoverify($dataOri, $sign, $data, $bizContent, $bizContentFormat, $depoTrans, $token){
        dump($token);
        if(!empty($data['out_trans_no'])){
            $transaction = \App\Models\DepositTransaction::where('mch_no',$data['mch_no'])
                ->where('out_trans_no',$data['out_trans_no'])
                ->first();

            if(!$transaction){
                $this->_formatResult->setSuccess([
                    'out_trans_no' => $data['out_trans_no']
                ]);
                return $this->_signReturn($this->_formatResult->getData(), $token);
            }
        }
        $this->_formatResult->setError('OUT_TRANT_NO.INVALID');
        return $this->_signReturn($this->_formatResult->getData(), $token);
    }
}