<?php

namespace App\Http\Controllers;

use App\Title;
use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function edit(Request $request)
    {   
        $this ->validate($request, ['heading' =>'required|max:300']); // 文字制限
        $content = Content::find($request->id); // TodoC@show currentTitle→show.blade currentTitleからcontent→UpdateContentModal→now
        $form = $request->all();
        unset($form['_token']);
        $content->fill($form)->save();     
        return back();
    }

    public function delete(Request $request)
    {   
        $content = Content::find($request->id); // TodoC@show currentTitle→show.blade currentTitleからcontent→UpdateContentModal→now
        $content->delete();
        return back();
    }
}
