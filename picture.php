<?php
require_once('config.php');

$images = array();

$imageDir = opendir(IMAGES_DIR);

while ($file = readdir($imageDir)) {
    if ($file == '.' || $file == '..') {
        continue;
    }

    if (file_exists(THUMBNAIL_DIR.'/'.$file)) {
        $images[] = 'thumbnails/'.$file;
    } else {
        $images[] = 'images/'.$file;
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>画像掲示板</title>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>">
<input type="file" name="image">
<input type="submit" value="アップロード">
</form>
<hr>
<?php foreach ($images as $image) : ?>
<?php if (strpos($image, 'thumbnails/') === 0) : ?>
<a href="images/<?php echo basename($image); ?>"><img src="<?php echo $image; ?>"></a>
<?php else : ?>
<img src="<?php echo $image; ?>">
<?php endif; ?>
<?php endforeach; ?>
</body>
</html>