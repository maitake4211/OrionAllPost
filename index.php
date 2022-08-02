<!--webに投稿するためのphp　message.txtに書き込んでそれをboard.phpが読み込んで表示している -->
<?php
define('FILENAME', './message.txt');

date_default_timezone_set('Asia/Tokyo');
$curret_date = null;
$data = null;
$file_handle = null;
$split_data = null;
$message = array();
$message_array = array();

if (!empty($_POST['usercomment']) && isset($_POST['web'])) {
	if($file_handle = fopen(FILENAME, "a")) {
		$current_date = date("Y-m-d H:i:s");
		$data = "'オリオンビール広報部'".$_POST['usercomment']."'".$current_date."'\n";
		fwrite($file_handle, $data);

		fclose($file_handle);
	}
}
?>





<!--投稿用サイトのhtml -->
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>投稿フォーム</title>
		<link rel="stylesheet" href="styleIndex.css">
		<script src="link.js"></script>
	</head>

	<body id="contact">
		<header>
			<h1><a href="index.<?php  ?>"><img src="logo.png" alt="">75 Beer</a></h1>

			<nav>
				<ul>
					<li><a href="board.php">board</a></li>
				</ul>
			</nav>
		</header>

		<center>
			<section>

				<h1>投稿フォーム</h1>
					<form method="post">
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
							<input type="checkbox" id="facebook" name="tiktok">
							<label for="tiktok">FaceBook_Post</label>
						</div>

						<div>
							<input type="checkbox" id="web" name="web">
							<label for="web">Web</label>
						</div>
					</fieldset>

					<p>
						<label>文章：　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
							<textarea id="usercomment" name="usercomment"></textarea>
						</label>
					</p>
					<p>
						<input type="submit" name="submit" value="送信">
					</p>

					<small>Powered by <a href="http://www.rescue.ne.jp/" target="_blank">CGI RESCUE</a><sup>&reg;　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　</sup></small>
				</form>

			</section>
		</center>

		<footer>
			<small>
				Copyright &copy; FOREST STUDIO, all rights reserved.
			</small>
		</footer>
	</body>
</html>
