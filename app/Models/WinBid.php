<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WinBid extends Model
{
    protected $fillable = [
        'area',
        'project_name',
        'win_bid_unit',
        'win_bid_price',
        'contract_sign_at',
        'work_days',
        'begin_at',
        'end_at',
        'project_index',
        'project_type',
        'project_manager',
        'business_channel',
        'partner',
        'win_bid_publicity',
        'is_end',
        'is_up_to_par',
        'remark'
    ];
}
