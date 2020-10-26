@extends('layouts.layout')
@section('title','Todo一覧')

@section('content')
<div class="container">
  @if(! Auth::check())
    <div class="easy-login text-center mt-3 w-100">
      <p>採用ご担当者様はこちらの簡易テストログインをご利用下さい。</p>
      <a class="btn btn-primary" href="/easyLogin">簡易テストログイン</a>
    </div>
  @endif
  <h2 class="top-title text-center text-info">おかえりTodo</h2>
  <div class="text-center">
    <img src="{{ asset('image/topWelcome.jpg') }}" style="width: 85%;" alt="top image">
  </div>
  <h3 class="suggest-msg text-center">帰国時の予定を建てましょう</h3>
  <div class="main-tag-group">
    <button class="btn main-tag btn-primary btn-lg" onclick="clickTag1()">#家族と会う</button>
    <button class="btn main-tag btn-primary btn-lg" onclick="clickTag2()">#買い物に行く</button>
    <button class="btn main-tag btn-primary btn-lg" onclick="clickTag3()">#お土産を買う</button>
    <button class="btn main-tag btn-primary btn-lg" onclick="clickTag4()">#日本食を食べる</button>
  </div>
  <div class="form-container">
    <div class="input-box my-3">
      <div class="input-form-set mr-1">
        <input type="text" id="inputTodoText" placeholder="Todoを入力しましょう">
        <i class="fas fa-list-ul" aria-hidden="true"></i>
      </div>
      <button class="btn btn-outline-primary" onclick="clickTextTotal()">Todo追加</button>
    </div>
    <form action="{{ action('TopController@create') }}" method="post" name="form1">
      <div class="form-wrap">
        <div class="text-center mt-4">
          <div class="form-area" id="formArea" class="w-100" name="text2"></div>
        </div>
        @csrf
        @if (count($errors) > 0)
            <p class="top-form-alert">Todoタグを選択するか入力フォームでTodo追加をしてください</p>
        @endif
        {{-- レスポンシブ用に2つ用意 --}}  
        @if(Auth::check())
          <div class="d-none d-sm-block">
            <div class="text-right">
              <div class="btn-group">
                <div class="btn btn-secondary" onclick="clickClear()" >クリア</div>
                <button class="btn btn-success ml-2" id="output-for-listtodo " type="submit">リストを出力する</button>
              </div>
            </div>
          </div>
          <div class="d-block d-sm-none">
            <div class="button-group">
              <div class="btn-group-vertical">
                <div class="btn btn-secondary mt-2" onclick="clickClear()" >クリア</div>
                <button class="btn btn-success mt-2" id="output-for-listtodo " type="submit">リストを出力する</button>
              </div>
            </div>
          </div>
        @else
          <p class="recommend-login mt-2">Myページでリスト化するには<a href="/login">ログイン</a>が必要です。</p>
          <p class="recommend-login">採用ご担当者用<a href="/easyLogin">簡易テストログイン</a>はこちらです。</p>

        @endif
      </div>  
    </form>   
  </div>
  {{-- サイトの下部のクリックタグ --}}
  @include('components.ClickTag')

</div>
<footer>
  <div class=text-center>
    <p class="my-5">Copyright ©おかえりTodo All rights reserved.</p>
</footer>
<script src="{{ asset('/js/clickTag.js') }}"></script>
<script src="{{ asset('/js/generalTop.js') }}"></script>
@endsection
