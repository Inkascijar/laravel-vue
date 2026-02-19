<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data=$request->validated();
        User::firstOrCreate([
            'email'=>$data['email']
        ], $data);

        return redirect()->route('user.index');
    }
}
