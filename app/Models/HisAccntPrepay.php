<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HisAccntPrepay extends ModelBase
{
    protected $table = 'his_accnt_prepay';
    protected $primaryKey = 'id_his_accnt_prepay';
    
    protected $fillable = [
        'mch_no', 'transaction_no', 'event', 'event_amt', 'event_time', 'accnt_amt_before', 'accnt_amt_after', 'create_time'
    ];
    
    
    
}
