<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChannelRecord extends Model
{
    protected $fillable = [
        'record_area',
//        'record_user',
        'record_at',
        'record_unit',
        'record_aptitude',
        'record_channel',
        'url',
        'record_channel_user',
        'record_legal_person',
        'bond_type_money',
        'bond_submit_person',
        'enter_type_result',
        'is_set_filiale',
        'remark'
    ];
}
