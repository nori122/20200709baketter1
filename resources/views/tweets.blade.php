@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの表示に使用するエラーファイル-->
  @include('common.errors')
  <!-- タスク登録フォーム -->
  <form action="{{ route('tweets.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      
        <label class="col-sm-3 control-label">なりきる相手</label><br>
        <input type="radio" name="fake_user" id="user_1" value="1">
        <label for="user_1"><img src="images/01.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_2" value="2">
        <label for="user_2"><img src="images/02.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_3" value="3">
        <label for="user_3"><img src="images/03.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_4" value="4">
        <label for="user_4"><img src="images/04.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_5" value="コナ">
        <label for="user_5"><img src="images/05.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_6" value="のり">
        <label for="user_6"><img src="images/06.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_7" value="しげ">
        <label for="user_7"><img src="images/07.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_8" value="いくや">
        <label for="user_8"><img src="images/08.png" style="width:100px"></img></label>
        <!--<br>-->
        <input type="radio" name="fake_user" id="user_9" value="隊長">
        <label for="user_9"><img src="images/09.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_10" value="内藤">
        <label for="user_10"><img src="images/10.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_11" value="にい">
        <label for="user_11"><img src="images/11.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_12" value="ひろ">
        <label for="user_12"><img src="images/12.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_13" value="テュグ">
        <label for="user_13"><img src="images/13.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_14" value="黒木">
        <label for="user_14"><img src="images/14.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_15" value="トミー">
        <label for="user_15"><img src="images/15.png" style="width:100px"></img></label>
        <input type="radio" name="fake_user" id="user_16" value="空">
        <label for="user_16"><img src="images/16.png" style="width:100px"></img></label>
        
   
      <!-- タスク名 -->
      <div class="col-sm-6">
        <label for="tweet" class="col-sm-3 control-label">ツイート内容</label>
        <input type="textarea" name="tweet" id="tweet" class="form-control">
      </div>
      <!-- ファイルupload -->
      <div class="col-sm-6">
        <label for="file" class="col-sm-3 control-label">添付画像</label>
        <input type="file" id="file" name="file" class="form-control">
      </div>
      <!-- fake_user_テキストでインプットする場合 -->
      <!--<div>-->
      <!--  <input type="integer" id="fake_user" name="fake_user" class="form-control">-->
      <!--</div>-->
    <!-- fake_user_ラジオボタンでインプットする場合 -->
     
  
      
    </div>
    
    
      <!-- なりきり履歴 -->
      <!--<div class="col-sm-6">-->
      <!--  <div class="d-flex flex-row fake_user">-->
      <!--    @foreach($tweets as $tweet)-->
      <!--    <div>-->
      <!--      <strong class="fake">{{ $tweet->fake_user }}</strong>-->
      <!--    </div>-->
      <!--    @endforeach-->
      <!--  </div>-->
      <!--</div>-->
    
    <!-- タスク登録ボタン -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-primary" id="save">Save</button>
      </div>
    </div>
  </form>
  <!-- この下に登録済みタスクリストを表示 -->
  <!-- 表示領域 -->
@if (count($tweets) > 0)
          @foreach ($tweets as $tweet)
<div class="col-md-8 col-md-2 mx-auto">
  <div class="card-wrap">
    <div class="card" style="margin-bottom:15px;">
        <div class="card-header align-items-center d-flex justify-content-between">
          <!--<a class="black-color no-text-decoration" title="" href="/users/">-->
          <div class="user">
            <div class="fake_user">
              <img src="images/{{ $tweet->profile_photo }}"></img>
              </div>
            <div class="real_user"></div>
          </div>
          <!--</a>-->
          <!-- 削除ボタン -->
          <form action="{{ route('tweets.destroy',$tweet->id) }}" method="POST">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-light">×</button>
          </form>
        </div>
        <div class="card-body">
          <p>{{ $tweet->tweet }}</p>
          <!--<img src="{{ $tweet->image }}" class="card-img-top">失敗-->
          <!--<p>{{ $tweet->image }}</p>失敗-->
          
          @if ($tweet->image === "")
         <p></p>
          @else
         <img src="/storage/tweets/{{ $tweet->image }}" style="width:100%;">
          @endif
          
          
        </div>
        <!--<div class="card-footer d-flex justify-content-around">-->
        <!--  <a href="#"style="font-size:1.4rem;">♡</a>-->
        <!--  <a href="#"style="font-size:1.4rem;">↩️</a>-->
        <!--  </a>-->
        <!--</div>-->
    </div>
  </div>
</div>
@endforeach
@endif
<!-- ここまでタスクリスト -->
</div>
@endsection