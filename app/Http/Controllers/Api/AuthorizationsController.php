<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthorizationRequest;
use Auth;

class AuthorizationsController extends Controller
{
    public function login(AuthorizationRequest $request)
    {
        $name = $request->name;
        $password = $request->password;
        if (!$token = Auth::attempt(['name' => $name, 'password' => $password])) {
            return formError('密码错误！');
        }
        $data = ['user_id' => Auth::user()->id,'name' => $name];
        return response()->json(formSuccess('登陆成功！',$data))->header('Authorization','Bearer '.Auth::fromUser(Auth::user()));
    }
}
