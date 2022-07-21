<?php
// Facebook SDK for PHPを利用するためComposerのautoload.phpを読み込み
require_once __DIR__ . '/vendor/autoload.php';

// グラフAPIの呼び出しで利用する認証情報。xxxxxxxxの箇所にそれぞれの情報をセット
const FB_APP_ID = ''; // アプリID
const FB_APP_SECRET = ''; // app secret
const FB_ACCESS_TOKEN = ''; // ページアクセストークン

// Facebookクラスのインスタンスを作成
$fb = new \Facebook\Facebook([
    'app_id' => FB_APP_ID,
    'app_secret' => FB_APP_SECRET,
]);

try {
    // Facebookページへ投稿
    $message = $_POST['usercomment']; // 投稿内容
    //$message = 'aaaaaaaa'.'xxxxxxxx';
    //$imgpath = 'C:/Users/ar460/Documents/OrionAllPost/'.$_POST['imgpath'];
    //$url = 'example.com'; // 投稿に含めるリンク
    $response = $fb->post('/me/feed', [
        'message' => $message,
        //'source' => $fb->fileToUpload($imgpath),
        //'link' => $url,
    ], FB_ACCESS_TOKEN);

} catch(\Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;

} catch(\Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
