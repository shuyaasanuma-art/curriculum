$(function () {
    var follow = $('.follow');
    var followUserId;
    follow.on('click', function () {
        var $this = $(this);
        followUserId = $this.data('user-id');
        console.log('test2');
        //ajax処理スタート
        $.ajax({
            headers: {
                //HTTPヘッダ情報をヘッダ名と値のマップで記述
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
            url: '/users/$user/follow',
            //バリデーション時に変更する   通信先アドレスで、このURLをあとでルートで設定します
            method: 'POST',
            //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
            data: {
                //サーバーに送信するデータ
                'user_id': followUserId //いいねされた投稿のidを送る
            }
        })
            .done(function (data) {
                $this.toggleClass('follow');
            })
            .fail(function () {
                console.log('fail');
            })
    })
});