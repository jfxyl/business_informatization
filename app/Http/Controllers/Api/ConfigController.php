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
    public function invariableConfigs()
    {
        return config('params');
    }

    public function variableConfigs()
    {
        $params = [];
        $params['record_channel_user'] = RecordChannelUser::where('status',1)->get()->pluck('name');
        $params['record_legal_person'] = RecordLegalPerson::where('status',1)->get()->pluck('name');
        $params['bond_submit_person'] = BondSubmitPerson::where('status',1)->get()->pluck('name');
        $params['project_manager'] = ProjectManager::where('status',1)->get()->pluck('name');
        $params['business_channel'] = BusinessChannel::where('status',1)->get()->pluck('name');
        $params['partner'] = Partner::where('status',1)->get()->pluck('name');
        return $params;
    }

    public function variableConfigsStore(ConfigRequest $request)
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
