<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit(Color $color)
    {
        return view('color.edit', compact('color'));
    }
}
