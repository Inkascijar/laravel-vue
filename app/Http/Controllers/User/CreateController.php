<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CreateController extends Controller
{
    public function create()
    {
        return view(('user.create'));
    }
}
