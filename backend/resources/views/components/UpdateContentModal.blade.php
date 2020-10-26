{{-- 右側の見出しクリックModal --}}
<div id="contentModal{{$content->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    {{-- Modal content--}}
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <h4 class="title-content-modal">{{$currentTitle->title}}</h4>
          <a class="btn btn-danger btn-content-delete text-right" href="{{ action('ContentController@delete', ['id' => $content->id]) }}">削除</a>
        </div>
        @if (count($errors) > 0)
          <p class="text-alert">{{$errors->first('heading')}}</p>
        @endif
        <form action="{{ action('ContentController@edit') }}" method="post">
          <div class="form-group">
            <label for="inputHeading_modal">見出し</label>
            <input id="inputHeading_modal" type="text" name="heading" value="{{$content->heading}}" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="inputBody_modal">メモ</label>
            <textarea id="inputBody_modal" type="text" name="body" class="form-control" row="5">{{$content->body}}</textarea>
          </div>
          @csrf
          <input type="hidden" id="modal_id" name="id" value="{{$content->id}}">
          <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block mt-4">更新</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
      </div>
    </div>             
  </div>
</div>