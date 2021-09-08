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
if(!isset($_GET["post"])){ // Bütün içerikler listelenir
$posts->getPostList();
}else{ // Post parametresindeki id degerine göre işlem yapılır veya içerik görüntülenir.
$posts->getSelectPostList();
}
?>
</body>
</html>