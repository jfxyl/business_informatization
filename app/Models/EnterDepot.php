<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnterDepot extends Model
{
    protected $fillable = [
        'company_name',
        'record_at',
        'record_unit',
        'record_aptitude',
        'url',
        'record_channel_user',
        'special_demand',
        'bond_type_money',
        'bond_submit_person',
        'enter_type_result',
        'is_annual_review',
        'remark',
        'is_del',
        'del_user_id'
    ];

    public function  user()
    {
        return $this->belongsTo(User::class);
    }

    public function setRecordAptitudeAttribute($value)
    {
        if(is_array($value)){
            $value =  implode(',',array_unique($value));
        }
        $this->attributes['record_aptitude'] = $value;
    }

    public function getRecordAptitudeAttribute($value)
    {
        return explode(',',$value);
    }
}
