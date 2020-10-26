<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <!-- Laravel標準搭載のJavascript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- 下2行はbootstrapのJavascript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- bootstrapのcss -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="/css/app.css"> -->
    <!-- <link rel="stylesheet" href="/css/admin.css">        -->
  </head>

  <body>
    <nav class="navbar navbar-default bg-primary">
      <div class="container-fluid">
        <div class="navbar-header">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bootstrapサンプル</a>
        </div>
        <div class="collapse navbar-collapse" id="navigation">
          <p class="navbar-text navbar-right">ログイン中</p>
        </div>
      </div>
    </nav>

    <div class="main">
      <div class="row">
        <div class="col-3  mx-auto">
          <div class="left-tttle-box my-4 mx-5">
            <p><a class="" data-toggle="modal" data-target="#titleModal">タイトル追加</a></p>
            <!-- Modal -->
            <div id="titleModal" class="modal fade" role="dialog">
              <div class="modal-dialog">             
                <!-- Modal content-->
                <div class="modal-content">
                   <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                    <h4 class="text-center">タイトル追加</h4>
                    <form action="/" method="post">
                      <div class="form-group">
                        <input id="heading" type="text" name="heading" class="form-control">
                      </div>
                      {{ csrf_field() }}
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">追加</button>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                  </div>
                </div>             
              </div>
            </div>

            <ul class="list-group">
              @foreach($titles as $title)
              <a href="{{ route('admin.task', ['id' => $title->id]) }}" class="list-group-item">
                {{ $title->title }}
              </a>
              @endforeach
            </ul>
          </div>
        </div>
        
        <div class="col-9 mx-auto bg-white">
          <div class="right-title-box my-4 mx-5">
            <p class="test">右のスペース</p>
            <ul class="list-group" >
               @foreach($contents as $content)
                  <li><a class="list-group-item task_index" data-toggle="modal" data-target="#myModal" id="heading_modal">{{$content->heading}}
                  </a></li>
               @endforeach
            </ul>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">             
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                    <h4 class="text-center">タイトル</h4>
                    <form action="{{ route('admin.task', ['id' => $title->id]) }}" method="post">
                      <div class="form-group">
                        <label for="inputHeading_modal">見出し</label>
                        <input id="inputHeading_modal" type="text" name="heading" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="content">メモ</label>
                        <textarea id="content" type="text" name="body" class="form-control" row="5"></textarea>
                      </div>
                      {{ csrf_field() }}
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">更新</button>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                  </div>
                </div>             
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
    $('#myModal').on('show.bs.modal', function (e) {
      var heading_modal = $('#heading_modal').html();

      $('#inputHeading_modal').val(heading_modal);
    });

    $('#save').click(function() {
      var inputHeading_modal = $('#inputHeading_modal').val();

      $('#heading_modal').html(inputHeading_modal);
    });
    </script>
  </body>
</html>