<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(UpdateRequest $request, User $user)
    {
        $data=$request->validated();
        $user->update($data);
        return view('user.show',compact('user'));
    }
}
