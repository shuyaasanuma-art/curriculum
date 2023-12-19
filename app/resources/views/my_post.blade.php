@extends('layouts.layout')
<div class="container container-m">
    <div>
        <div class="">
            <div>
                <div >
                    <div>アイコン画像</div>
                    <h4>フォロー</h4>
                    <h4>フォロワー</h4>
                </div>
                <div>
                    <div>ユーザー名</div>
                    <div>プロフィール</div>
                </div>
            </div>
            <div>
                <div>新規投稿</div>
                <div>ユーザー情報編集</div>
            </div>
        </div>
        <div>
            <div>自分の投稿一覧</div>
            <div>いいねした投稿一覧</div>
        </div>
    </div>
    @extends('layouts.layout_post')
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#!" aria-label="Previous">
        <span aria-hidden="true">«</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#!">1</a></li>
    <li class="page-item"><a class="page-link" href="#!">2</a></li>
    <li class="page-item"><a class="page-link" href="#!">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#!" aria-label="Next">
        <span aria-hidden="true">»</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
</div>