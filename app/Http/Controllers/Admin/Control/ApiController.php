<?php

namespace App\Http\Controllers\Admin\Control;

use App\Http\Requests\Admin\SaveApiRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function render(Request $request)
    {
        $data = [
            'currentServer' => $request->get('currentServer'),
            'enabled' => (bool)s_get('api.enabled'),
            'key' => s_get('api.key'),
            'algos' => config('l-shop.api.available_algos'),
            'algo' => s_get('api.algo'),
            'signinEnabeld' => (bool)s_get('api.signin.enabled'),
            'signinRemember' => (bool)s_get('api.signin.remember_user')
        ];

        return view('admin.control.api', $data);
    }

    public function save(SaveApiRequest $request)
    {
        s_set([
            'api.enabled' => (bool)$request->get('enabled'),
            'api.key' => $request->get('key'),
            'api.algo' => $request->get('algo'),
            'api.signin.enabled' => (bool)$request->get('signin_enabled'),
            'api.signin.remember_user' => (bool)$request->get('signin_remember')
        ]);
        s_save();

        \Message::success('Изменения успешно сохранены!');

        return back();
    }
}
