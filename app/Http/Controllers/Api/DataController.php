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
use App\Models\RecordChannelUser;
use App\Models\RecordLegalPerson;
use App\Models\BondSubmitPerson;
use App\Models\ProjectManager;
use App\Models\BusinessChannel;
use App\Models\Partner;
use DB;

class DataController extends Controller
{
    public function channelRecordsStore(ChannelRecordRequest $request)
    {
        DB::beginTransaction();
        try{
            RecordChannelUser::firstOrCreate(['name'=>$request->record_channel_user]);
            RecordLegalPerson::firstOrCreate(['name'=>$request->record_legal_person]);
            BondSubmitPerson::firstOrCreate(['name'=>$request->bond_submit_person]);
            $data = ChannelRecord::create($request->all());
            DB::commit();
            return formSuccess('添加成功！',$data);
        }catch (\Exception $e){
            DB::rollBack();
            return formError('添加失败！');
        }
    }

    public function enterDepotsStore(EnterDepotRequest $request)
    {
        DB::beginTransaction();
        try{
            RecordChannelUser::firstOrCreate(['name'=>$request->record_channel_user]);
            BondSubmitPerson::firstOrCreate(['name'=>$request->bond_submit_person]);
            $data = ChannelRecord::create($request->all());
            DB::commit();
            return formSuccess('添加成功！',$data);
        }catch (\Exception $e){
            DB::rollBack();
            return formError('添加失败！');
        }
    }

    public function winBidsStore(WinBidRequest $request)
    {
        DB::beginTransaction();
        try{
            ProjectManager::create(['name'=>$request->project_managers]);
            BusinessChannel::create(['name'=>$request->business_channels]);
            Partner::create(['name'=>$request->partners]);
            $data = ChannelRecord::create($request->all());
            DB::commit();
            return formSuccess('添加成功！',$data);
        }catch (\Exception $e){
            DB::rollBack();
            return formError('添加失败！');
        }
    }

    public function channelRecordsUpdate(ChannelRecordRequest $request)
    {
        if($data = ChannelRecord::where('id',$request->id)->update($request->except('id'))){
            return formSuccess('修改成功！');
        }else{
            return formError('修改失败！');
        }
    }

    public function enterDepotsUpdate(EnterDepotRequest $request)
    {
        if($data = EnterDepot::where('id',$request->id)->update($request->except('id'))){
            return formSuccess('修改成功！');
        }else{
            return formError('修改失败！');
        }
    }

    public function winBidsUpdate(WinBidRequest $request)
    {
        if($data = WinBid::where('id',$request->id)->update($request->except('id'))){
            return formSuccess('修改成功！');
        }else{
            return formError('修改失败！');
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

    public function channelRecordsDestroy(Request $request)
    {
        if($data = ChannelRecord::find($request->id)){
            if($data->delete()){
                return formSuccess('删除成功！');
            }else{
                return formError('删除失败！');
            }
        }else{
            return formError('记录不存在！');
        }
    }

    public function enterDepotsDestroy(Request $request)
    {
        if($data = EnterDepot::find($request->id)){
            if($data->delete()){
                return formSuccess('删除成功！');
            }else{
                return formError('删除失败！');
            }
        }else{
            return formError('记录不存在！');
        }
    }

    public function winBidsDestroy(Request $request)
    {
        if($data = WinBid::find($request->id)){
            if($data->delete()){
                return formSuccess('删除成功！');
            }else{
                return formError('删除失败！');
            }
        }else{
            return formError('记录不存在！');
        }
    }
}