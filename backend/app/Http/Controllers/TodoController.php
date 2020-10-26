<?php

namespace App\Http\Controllers;

use App\Title;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{

    public function index()
    {
        // ログイン中のユーザーのタイトルテーブルを取得
        $titles = Auth::user()->titles()->get();
        // $titles = Title::all();
        return view('mypage.index', [
            'titles' => $titles,
        ]);
    }

    public function show(int $id)
    {
        $titles = Auth::user()->titles()->get();
        $currentTitle = Title::find($id); // id流れ:Todo@index→index→TodoC@show→now
        
        return view('mypage.show', [
            'titles' => $titles,
            'currentTitle' => $currentTitle,
        ]); // show.bladeに遷移
    }
    
    public function addTitle()
    {
        $titles = Auth::user()->titles()->get();
        return view('mypage.addTitle', [
            'titles' => $titles,
        ]);
    }

    
    public function delete(Request $request)
    {   
        $content = Title::find($request->id); //TodoC@index→D-Modal→id
        $content->delete();
        
        return redirect('/todo');
    }

    public function editTitle(Request $request)
    {
        $titles = Auth::user()->titles()->get();
        $currentTitle = Title::find($request->id); //indexからクリックしたidを代入
        return view('mypage.editTitle', [
            'titles' => $titles,
            'currentTitle' => $currentTitle,
        ]); //editTitle.bladeに遷移
    }
    
    public function addContent(int $id, Request $request)
    {
        $titles = Auth::user()->titles()->get();
        $currentTitle = Title::find($request->id); //TodoC@show currentTitle→show.blade currentTitle→id→now
        return view('mypage.addContent', [
            'titles' => $titles,
            'currentTitle' => $currentTitle,
        ]); //addContent.bladeに遷移
    }
}

