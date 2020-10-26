<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddTitleController extends Controller
{ 
    public function create(Request $request)
    {   
        $this ->validate($request, ['title' =>'required|max:150']); // 文字数制限
        $title = new Title;     
        $form = $request->all();
        unset($form['_token']);
        $title->user_id = Auth::id(); // ログインしたIDをタイトルテーブルのuser_idに代入
        $title->fill($form)->save();
        
        return redirect('/todo');
    }
}
