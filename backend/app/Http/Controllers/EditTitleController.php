<?php

namespace App\Http\Controllers;

use App\Title;
use App\Content;
use Illuminate\Http\Request;

class EditTitleController extends Controller
{
    public function edit(Request $request)
    {   
        $this ->validate($request, ['title' =>'required|max:150']);
        $title = Title::find($request->id); //index→TodoC@editTitle→editTitle.blade→id
        $form = $request->all();
        unset($form['_token']);
        $title->fill($form)->save();
        
        return redirect('/todo');
    }
}
