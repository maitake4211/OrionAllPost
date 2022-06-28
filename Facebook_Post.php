<?php
// Facebook SDK for PHPを利用するためComposerのautoload.phpを読み込み
require_once __DIR__ . '/vendor/autoload.php';

// グラフAPIの呼び出しで利用する認証情報。xxxxxxxxの箇所にそれぞれの情報をセット
const FB_APP_ID = '347852470789457'; // アプリID
const FB_APP_SECRET = '091d08e10da38cbd77b296222f004a52'; // app secret
const FB_ACCESS_TOKEN = 'EAAE8Xrb0pVEBAAnzMrbfrxHSkIZCnKXhYXFxkMthXzarZBsTZAcPPmiEYBkY4YNHeV791IjnHjCPBzaKI1EFQHe2jFZAgmQWnANcoVuKfTMybIbmIl3NWa2rd3tjqn0nvlQuHcNvYwR4dA2ZA0LKf2J0mqWZATVlG5Hrs8Q4dKAyK3pm5tJ5TPNQpfVD3gYq8ZD'; // ページアクセストークン

// Facebookクラスのインスタンスを作成
$fb = new \Facebook\Facebook([
    'app_id' => FB_APP_ID,
    'app_secret' => FB_APP_SECRET,
]);

try {
    // Facebookページへ投稿
    $message = 'テスト投稿'; // 投稿内容
    $url = 'example.com'; // 投稿に含めるリンク
    $response = $fb->post('/me/feed', [
        'message' => $message,
        'link' => $url,
    ], FB_ACCESS_TOKEN);

} catch(\Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;

} catch(\Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
 