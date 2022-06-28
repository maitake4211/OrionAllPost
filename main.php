<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>メイン画面</title>
</head>
<body>
    <form enctype="multipart/form-data" action="register.php" method="POST">
        <table border=0>
            <tr>
                <td>名前：</td>
                <td><input type="text" name="input_name"></td>
            </tr>
            <tr>
                <td>コメント：</td>
                <td><textarea class="textbox_comment", name="input_comment", cols="30", rows="5"></textarea></td>
            </tr>
            <tr>
                <td>パスワード：</td>
                <td><input type="password" name="input_pass"></td>
            </tr>
            <tr>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <td>このファイルをアップロード:</td>
                <td><input name="userfile" type="file" /></td>
            </tr>
        </table>
        <br>
        <button name="action" value="click_user_regisration">確定</button>
</body>
</html>

<?php
# 確認用です
$fname = $_FILES['userfile']['name'];
echo $fname."<br>";

# DBから投稿内容を表示
try {
    $pdo = new PDO('mysql:host='ホスト名'; dbname='データベース名'; charset=utf8','ユーザー名','パスワード', array(PDO::ATTR_EMULATE_PREPARES => true));
    echo "成功.<br>";
} catch (PDOException $e) {
    echo "失敗.<br>";
    exit('データベース接続失敗。'.$e->getMessage());
}

$sql = 'SELECT * FROM test';
$result = $pdo->query($sql);
foreach($result as $row) {
    echo $row['id'].', ';
    echo $row['name'].', ';
    echo $row['comment'].', ';
    echo $row['image'].', ';     # このままではバイナリで出力されてしまう
    echo $row['created_time'].', ';
    echo $row['password'].'<br>';
 }
?>