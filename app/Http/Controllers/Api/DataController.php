<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChannelRecordRequest;
use App\Http\Requests\Api\EnterDepotRequest;
use App\Http\Requests\Api\WinBidRequest;
use App\Models\ChannelRecord;
use App\Models\EnterDepot;
use App\Models\WinBid;

class DataController extends Controller
{
    public function channel_records_store(ChannelRecordRequest $request)
    {
        if(ChannelRecord::create($request->all())){
            return formSuccess('添加成功！');
        }else{
            return formError('添加失败！');
        }
    }

    public function enter_depots_store(EnterDepotRequest $request)
    {
        if(EnterDepot::create($request->all())){
            return formSuccess('添加成功！');
        }else{
            return formError('添加失败！');
        }
    }

    public function win_bids_store(WinBidRequest $request)
    {
        if(WinBid::create($request->all())){
            return formSuccess('添加成功！');
        }else{
            return formError('添加失败！');
        }
    }
}
