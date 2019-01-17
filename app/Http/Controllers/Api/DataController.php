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
    public function channelRecordsStore(ChannelRecordRequest $request)
    {
        if(ChannelRecord::create($request->all())){
            return formSuccess('添加成功！');
        }else{
            return formError('添加失败！');
        }
    }

    public function enterDepotsStore(EnterDepotRequest $request)
    {
        if(EnterDepot::create($request->all())){
            return formSuccess('添加成功！');
        }else{
            return formError('添加失败！');
        }
    }

    public function winBidsStore(WinBidRequest $request)
    {
        if(WinBid::create($request->all())){
            return formSuccess('添加成功！');
        }else{
            return formError('添加失败！');
        }
    }

    public function channelRecords()
    {
        return ChannelRecord::paginate(10);
    }

    public function enterDepots()
    {
        return EnterDepot::paginate(10);
    }

    public function winBids()
    {
        return WinBid::paginate(10);
    }
}
