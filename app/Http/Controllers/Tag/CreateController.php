<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class CreateController extends Controller
{
    public function create()
    {
        return view(('tag.create'));
    }
}
