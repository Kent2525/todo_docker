// heading-modal（ループしているデータ）をクリックした時に
    $('.heading_modal').on('click', function() {
      // このdata('title')（data-title="{{$content->heading}}"）をtitleに代入
      var title = $(this).data('title');
      // このdata('body')（data-body="{{$content->body}}"）をtitleに代入
      var body = $(this).data('body');

      // '#inputHeading_modal'に対してtitleを埋める
      $('#inputHeading_modal').val(title);
      // '#inputBody_modal'に対してbodyを埋める
      $('#inputBody_modal').val(body);


      var id = $(this).data('id');
      $('#modal_id').val(id);
    });

    <div class="col-9 mx-auto bg-white">
          <div class="right-title-box my-4 mx-5">
            <p class="test">見出し</p>
            <ul class="list-group" >
               @foreach($contents as $content)
                  <li><a class="list-group-item task_index heading_modal" data-toggle="modal" data-target="#myModal" data-title="{{$content->heading}}" data-body="{{$content->body}}" data-id="{{ $content->id }}" >{{$content->heading}}
                  </a></li>
               @endforeach
            </ul>