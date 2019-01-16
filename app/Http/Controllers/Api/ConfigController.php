<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ConfigRequest;
use App\Models\RecordChannelUser;
use App\Models\RecordLegalPerson;
use App\Models\BondSubmitPerson;
use App\Models\ProjectManager;
use App\Models\BusinessChannel;
use App\Models\Partner;

class ConfigController extends Controller
{
    public function configs()
    {
        return config('params');
    }

    public function store(ConfigRequest $request)
    {
//        dump(RecordChannelUser,RecordLegalPerson,BondSubmitPerson,ProjectManager,BusinessChannel,Partner);
        switch($request->type){
            case 'record_channel_users':
                RecordChannelUser::create(['name'=>$request->name]);
                break;
            case 'record_legal_people':
                RecordLegalPerson::create(['name'=>$request->name]);
                break;
            case 'bond_submit_people':
                BondSubmitPerson::create(['name'=>$request->name]);
                break;
            case 'project_managers':
                ProjectManager::create(['name'=>$request->name]);
                break;
            case 'business_channels':
                BusinessChannel::create(['name'=>$request->name]);
                break;
            case 'partners':
                Partner::create(['name'=>$request->name]);
                break;
        }
        return formSuccess('保存成功！');
    }
}
