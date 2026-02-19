<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class DeleteController extends Controller
{
    public function delete(Color $color)
    {
        $color->delete();
        return redirect()->route('color.index');
    }
}
