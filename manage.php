<?php
include_once "post.class.php";
?>
<html>
<head>
<title>Yıldırım Coders</title>
<style>
body{background:#000;color:#fff;}
</style>
</head>
<body>
<?php 
$posts = new Post;
if(!isset($_GET["id"])){
$posts->getPostList(1);
}else{
$posts->getSelectPostList(1);
}
?>
</body>
</html>