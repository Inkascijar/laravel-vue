<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class IndexController extends Controller
{
    public function index()
    {
        $tags=Tag::all();
        return view ('tag.index', compact('tags'));
    }
}
