<?php 
namespace App\Libs;

class FormatResultErrors
{
    const CODE_MAP = [
        'SUCCESS' => ['code' => '100', 'message' => 'success'],
        'SYS.ERR' => ['code' => '101', 'message' => '系统错误', ],
        'SMS.SEND.ERR' => ['code' => '102', 'message' => '发送手机验证码出错', ],
        'SMS.VERIFY.ERR' => ['code' => '103', 'message' => '验证码错误', ],
        'SIGN.VERIFY.FAIL' => ['code' => '104', 'message' => '签名验证失败', ],
        'SIGN.BIZ_TYPE.INVALID' => ['code' => '105', 'message' => 'biz_type无效', ],
        'OUT_TRANT_NO.INVALID' => ['code' => '106', 'message' => '外部追踪号无效', ],

        'MCHSUB.CREATE.MCHSUB.OUTMCHACCNTNO.REPEAT' => ['code' => '201', 'message' => '外部子商户号重复', ],
        'MCHSUB.CREATE.MCHSUB.OUTMCHACCNTNO.INVALID' => ['code' => '201', 'message' => '外部子商户号非法', ],
        'MCHSUB.CREATE.BANKCARD.EMPTY' => ['code' => '202', 'message' => '子商户银行卡信息不能为空', ],
        'MCHSUB.CREATE.BANKCARD.ERROR' => ['code' => '203', 'message' => '子商户银行卡信息有误', ],
        'MCHSUB.MCHACCNTNO.INVALID' => ['code' => '204', 'message' => '子商户号无效', ],
        'MCHSUB.CREATE.BANKCARD.REPEAT' =>  ['code' => '205', 'message' => '子商户绑定银行卡信息重复', ],
        'MCHSUB.BINKCARD.INVALID' =>  ['code' => '206', 'message' => '子商户银行卡信息不存在', ],
        'MCHSUB.BATCHCREATE.TOMANY' =>  ['code' => '207', 'message' => '单次子商户数超目', ],
        'MCHSUB.BATCHCREATE.ACCNT.INVALID' =>  ['code' => '207', 'message' => '单次子商户数目非法', ],
        'MCHSUB.BATCHCREATE.BANKCARD.INVALID' =>  ['code' => '207', 'message' => '银行卡数目非法', ],
        'MCHSUB.BATCHCREATE.FAIL' =>  ['code' => '208', 'message' => '批量开设子商户失败', ],
        'MCHSUB.BATCHCREATE.OUT_MCH_ACCNT_NO.REPEAT' =>  ['code' => '208', 'message' => '外部子商户号重复', ],

        'MCHNO.REQUIRED'=>['code' => '301', 'message' => '商户号不能为空',],
        'MCHACCNTNO.REQUIRED'=>['code' => '302', 'message' => '子商户号不能为空',],
        'MCHSUB.QUERY.NOTFOUND' =>  ['code' => '303', 'message' => '子商户不存在',],
        'MCHACCNT.MCHACCNTNO.INVALID' => ['code' => '304', 'message' => '账户号无效',],
    ];
}
