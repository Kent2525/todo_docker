@extends('layouts.layout')
@section('title','Todo一覧')

@section('content')
<div class="main">
  <!-- {{-- 左側のタイトルエリアテスト --}} -->
  <div class="left-col">
    <div class="left-title-box my-4">
      <div class=text-center>
        <p><a href="{{ route('todo.addTitle') }}" class="add-title-btn"><i class="fas fa-plus-circle plusAwesome"></i> タイトル追加</a></p>
      </div>
      <ul class="list-group">
        @foreach($titles as $title)
          <div class="title-loop">
            <a href="{{ route('todo.show', ['id' => $title->id]) }}" class="list-group-item border-0">
              {{ $title->title }}</a>           
            <div class="title-icon-section">
              <img class="delete-icon image-sizing" src="{{ asset('image/deleteIcon.jpeg') }}" alt="delete" data-toggle="modal" data-target="#deleteModal{{$title->id}}">
              
                <!-- {{-- タイトル削除のモーダル --}} -->
                @include('components.DeleteTitleModal')

              <a href="{{ route('todo.editTitle', ['id' => $title->id]) }}"><img class="edit-title image-sizing" src="{{ asset('image/editIcon.jpeg') }}" alt="edit" data-title="{{$title->title}}" data-id_title="{{ $title->id }}"></a>
            </div>
          </div>  
        @endforeach
      </ul>
    </div>
  </div>
  <!-- {{-- 右側の見出しエリア --}} -->
  <div class="right-col bg-white">
    <div class="right-content-box my-4">
        <h5>Todoタイトルを選択してください。</h5>
    </div>
  </div>
</div>
<script>
// 学習して結局実装する必要のなかったjQuery. コメントアウトは通常のコメントアウトを使用。
// heading-modal（ループしているデータ）をクリックした時に
// $('.heading_modal').on('click', function() {
      // このdata('heading')（data-title="ドルcontent->heading"）をheadingに代入
      // var heading = $(this).data('heading');
      // このdata('body')（data-body="ドルcontent->body"）をtitleに代入
      // var body = $(this).data('body');

      // '#inputHeading_modal'に対してtitleを埋める
      // $('#inputHeading_modal').val(heading);
      // '#inputBody_modal'のvalueにbodyを設定する。
      // $('#inputBody_modal').val(body);
      // hidden用
    //   var id = $(this).data('id');
    //   $('#modal_id').val(id);
    // });

// $('.edit-title').on('click', function() {
//       var title = $(this).data('title');
//       $('#inputModal').val(title);

//       var id_title = $(this).data('id_title');
//       $('#inputIdTitle').val(id_title);
// });

//  旧式のアラートが出たらもう1度モーダル開くjQuery 
// $(document).ready(function () {
//   console.log('edit', $('.editTitleAlert').length);
//   console.log('add', $('.addTitleAlert').length);
//   if ($('.addTitleAlert').length) {
//     $('#titleModal').modal('show');
//   } 
// }); 

// $(document).ready(function () {
//   if ($('.editTitleAlert').length) {
//     $('#editTitleModal').modal('show');
//   } 
// }); 
</script>
@endsection