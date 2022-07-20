<?php
define('FILENAME', './message.txt');

date_default_timezone_set('Asia/Tokyo');
$curret_date = null;
$data = null;
$file_handle = null;
$split_data = null;
$message = array();
$message_array = array();

if (!empty($_POST['message'])) {
	//var_dump($_POST);

	if($file_handle = fopen(FILENAME, "a")) {
		$current_date = date("Y-m-d H:i:s");

		$data = "'".$_POST['view_name']."'".$_POST['message']."'".$current_date."'\n";
		fwrite($file_handle, $data);

		fclose($file_handle);
	}
}

if($file_handle = fopen(FILENAME, "r")) {
	while ($data = fgets($file_handle)) {
		//echo $data. "<br>";

		$split_data = preg_split('/\'/', $data);
		/*
		foreach ($split_data as $a){
			echo $a. "<br>";
		}
		*/

		$message = array(
			'view_name' => $split_data[1],
			'message' => $split_data[2],
			'post_date' => $split_data[3]
		);
		array_unshift($message_array, $message);
	}
	fclose($file_handle);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ひと言掲示板</title>
<link rel="stylesheet" href="styleBoard.css">
</head>

<body>
<h1>ひと言掲示板</h1>
<form method="post">
	<div>
		<label for="view_name">表示名</label>
		<input id="view_name" type="text" name="view_name" value="">
	</div>
	<div>
		<label for="message">ひと言メッセージ</label>
		<textarea id="message" name="message"></textarea>
	</div>
	<input type="submit" name="btn_submit" value="書き込む">
</form>
<hr>
<section>
	<!-- ここに投稿されたメッセージを表示 -->
	<?php if(!empty($message_array)): ?>
		<?php foreach($message_array as $value): ?>
			<article>
				<div class = "info">
					<h2><?php echo $value['view_name']; ?></h2>
					<time><?php echo date('Y年m月d日 H:i', strtotime($value['post_date'])); ?></time>
				</div>
				<p><?php echo $value['message']; ?></p>
			</article>
		<?php endforeach; ?>
	<?php endif; ?>
</section>
</body>
</html>
