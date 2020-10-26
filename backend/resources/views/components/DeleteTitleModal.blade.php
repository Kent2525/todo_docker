<!-- タイトル削除のモーダル -->
<div id="deleteModal{{$title->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">          
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <h4 class="text-center">{{$title->title}}</h4>
        <p class="text-center my-4" style="font-size: 15px;">このTodoを削除しますか？</p>
        <div class="text-center">
          <a href="{{ action('TodoController@delete', ['id' => $title->id]) }}"  class="btn btn-danger">削除</a>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
      </div>
    </div>             
  </div>
</div>