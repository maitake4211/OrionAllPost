<?php
define('FILENAME', './message.txt');

date_default_timezone_set('Asia/Tokyo');
$curret_date = null;
$data = null;
$file_handle = null;
$split_data = null;
$message = array();
$message_array = array();

if (!empty($_POST['usercomment'])) {
	//var_dump($_POST);

	if($file_handle = fopen(FILENAME, "a")) {
		$current_date = date("Y-m-d H:i:s");

		$data = "'オリオンビール広報部'".$_POST['usercomment']."'".$current_date."'\n";
		fwrite($file_handle, $data);
		
		fclose($file_handle);
	}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>投稿フォーム</title>
<link rel="stylesheet" href="style2.css">

<!--[if lt IE 9]>
<script src="html5shiv-printshiv.js"></script>
<![endif]-->
</head>
<body id="contact">


<header>
<h1><a href="index.html"><img src="logo.png" alt="">75 Beer</a></h1>

<nav>
<ul>
<li><a href="index.php">board</a></li>
</ul>
</nav>
</header>

<center>
<section>

<h1>投稿フォーム</h1>
<form method="sns">
    <fieldset>
        <legend>投稿先を選択</legend>

        <div>
            <input type="checkbox" id="twitter" name="twitter">
            <label for="twitter">Twitter</label>
        </div>

        <div>
            <input type="checkbox" id="instagram" name="instagram">
            <label for="instagram">Instagram</label>
        </div>

        <div>
            <input type="checkbox" id="tiktok" name="tiktok">
            <label for="tiktok">Tiktok</label>
        </div>

        <div>
            <input type="checkbox" id="web" name="web">
            <label for="web">Web</label>
        </div>
    </fieldset>
</form>



<form method="post">
<!--
<input type="hidden" name="_uid" value="XXXXXXXXXXXXXXXX">
<input type="hidden" name="_done" value="http://localhost/board/index.php">
<input type="hidden" name="_subject" value="お問い合わせ">
-->

<p>
<label>文章：　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
<textarea name="usercomment"></textarea>
</label>
</p>

<p>
    <table>
        <tr>
            <th>
                <label>
                    写真・動画:
                </label>
            </th>
        
            <td>
                <input type="file" accept='image/*' onchange="previewImage(this);">
            </td>
        </tr>
    </table>
</p>

<p>
   <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
</p>
        
<script>
    function previewImage(obj)
    {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById('preview').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
</script>

<p><input type="submit" name="btn_submit" value="送信"></p>

<small>Powered by <a href="http://www.rescue.ne.jp/" target="_blank">CGI RESCUE</a><sup>&reg;　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　</sup></small>
</form>

</section>
</center>

<footer>
<small>Copyright &copy; FOREST STUDIO, all rights reserved.</small>
</footer>

</body>
</html>
