<?php

namespace App\Http\Controllers\Tag;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit(Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }
}
