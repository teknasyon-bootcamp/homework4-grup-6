<?php
include_once "post.class.php";

$posts = new Post;

echo $posts->getPostList();
