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
    public function __construct()
    {
        $this->middleware('insurance');
    }

    public function channelRecordsStore(ChannelRecordRequest $request)
    {
        DB::beginTransaction();
        try{
            $request->record_channel_user and RecordChannelUser::firstOrCreate(['name'=>$request->record_channel_user]);
            $request->record_legal_person and RecordLegalPerson::firstOrCreate(['name'=>$request->record_legal_person]);
            $request->bond_submit_person and BondSubmitPerson::firstOrCreate(['name'=>$request->bond_submit_person]);
            $data = new ChannelRecord($request->all());
            $data->user()->associate($request->user());
            $data->save();
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
            $request->record_channel_user and RecordChannelUser::firstOrCreate(['name'=>$request->record_channel_user]);
            $request->bond_submit_person and BondSubmitPerson::firstOrCreate(['name'=>$request->bond_submit_person]);
            $data = new EnterDepot($request->all());
            $data->user()->associate($request->user());
            $data->save();
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
            $request->project_manager and ProjectManager::firstOrCreate(['name'=>$request->project_manager]);
            $request->business_channel and BusinessChannel::firstOrCreate(['name'=>$request->business_channel]);
            $request->partner and Partner::firstOrCreate(['name'=>$request->partner]);
            $data = new WinBid($request->all());
            $data->user()->associate($request->user());
            $data->save();
            DB::commit();
            return formSuccess('添加成功！',$data);
        }catch (\Exception $e){
            DB::rollBack();
            return formError('添加失败！');
        }
    }

    public function channelRecordsUpdate(ChannelRecordRequest $request)
    {
        $data = ChannelRecord::find($request->id);
        $this->authorize('own', $data);
        DB::beginTransaction();
        try{
            $request->record_channel_user and RecordChannelUser::firstOrCreate(['name'=>$request->record_channel_user]);
            $request->record_legal_person and RecordLegalPerson::firstOrCreate(['name'=>$request->record_legal_person]);
            $request->bond_submit_person and BondSubmitPerson::firstOrCreate(['name'=>$request->bond_submit_person]);
            $data->update($request->except('id'));
            DB::commit();
            return formSuccess('修改成功！',$data);
        }catch (\Exception $e){
            DB::rollBack();
            return formError('修改失败！');
        }
    }

    public function enterDepotsUpdate(EnterDepotRequest $request)
    {
        $data = EnterDepot::find($request->id);
        $this->authorize('own', $data);
        DB::beginTransaction();
        try{
            $request->record_channel_user and RecordChannelUser::firstOrCreate(['name'=>$request->record_channel_user]);
            $request->bond_submit_person and BondSubmitPerson::firstOrCreate(['name'=>$request->bond_submit_person]);
            $data->update($request->except('id'));
            DB::commit();
            return formSuccess('修改成功！',$data);
        }catch (\Exception $e){
            DB::rollBack();
            return formError('修改失败！');
        }
    }

    public function winBidsUpdate(WinBidRequest $request)
    {
        $data = WinBid::find($request->id);
        $this->authorize('own', $data);
        DB::beginTransaction();
        try{
            $request->project_manager and ProjectManager::firstOrCreate(['name'=>$request->project_manager]);
            $request->business_channel and BusinessChannel::firstOrCreate(['name'=>$request->business_channel]);
            $request->partner and Partner::firstOrCreate(['name'=>$request->partner]);
            $data->update($request->except('id'));
            DB::commit();
            return formSuccess('修改成功！',$data);
        }catch (\Exception $e){
            DB::rollBack();
            return formError('修改失败！');
        }
    }

    public function channelRecords()
    {
        return ChannelRecord::orderBy('id','desc')->where('is_del',0)->paginate(10);
    }

    public function enterDepots()
    {
        return EnterDepot::orderBy('id','desc')->where('is_del',0)->paginate(10);
    }

    public function winBids()
    {
        return WinBid::orderBy('id','desc')->where('is_del',0)->paginate(10);
    }

    public function channelRecordsDestroy(Request $request)
    {
        if($data = ChannelRecord::find($request->id)){
            $this->authorize('own', $data);
            if($data->update(['is_del' => 1,'del_user_id' => $request->user()->id])){
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
            $this->authorize('own', $data);
            if($data->update(['is_del' => 1,'del_user_id' => $request->user()->id])){
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
            $this->authorize('own', $data);
            if($data->update(['is_del' => 1,'del_user_id' => $request->user()->id])){
                return formSuccess('删除成功！');
            }else{
                return formError('删除失败！');
            }
        }else{
            return formError('记录不存在！');
        }
    }
}
