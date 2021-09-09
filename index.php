<?php
include_once "post.class.php";
?>
<html lang="en">
  <head>
    <style>
      body {
    background-image: url('./images/0x0-03.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="css/odev.css">

      <title>Teknasyon Bootcamp!</title>
  </head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">THUNDER CODERS!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="">Yusuf USTA </a>
        <a class="nav-item nav-link" href="">Efe BUYUK</a>
        <a class="nav-item nav-link" href="">Samet Utku OLGUN</a>
        <a class="nav-item nav-link" href="">Cihad ALKIS</a>
      </div>
    </div>
  </nav>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./images/677281-1665030429.jpg" class="d-block w-100" height="600" alt="..." style="max-height: 600px;">
      </div>
      <div class="carousel-item">
        <img src="./images/e4bd76f627bcc9da8b85b844669a1c41.jpg" class="d-block w-100" height="600" alt="..."
        style="max-height: 600px;">
      </div>
      <div class="carousel-item">
        <img src="./images/movie-avengers-infinity-war-thor-wallpaper-preview.jpg" class="d-block w-100" height="600" alt="" style="max-height: 600px;"> 
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  
  <div class="container mt-5">
  <?php 
$posts = new Post;
if(!isset($_GET["post"])){ // Bütün içerikler listelenir
$posts->getPostList();
}else{ // Post parametresindeki id degerine göre işlem yapılır veya içerik görüntülenir.
$posts->getSelectPostList();
}
?>
  </div>
    <footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md" style="font-family:verdana;">
          <h5>THUNDER CODERS!</h5>
          <small class="d-block mb-3 text-dark">© 2020-2021</small>
        </div>
        <div class="col-6 col-md" style="font-family:verdana;">
          <h5>Yusuf USTA</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-dark" href="https://www.linkedin.com/in/yusuf-usta-/" target="_blank">Linkedin</a></li>
            <li><a class="text-dark" href="https://www.instagram.com/yusuf_ussta/" target="_blank">Instagram</a></li>
            <li><a class="text-dark" href="https://github.com/yusta33" target="_blank">Github</a></li>
          </ul>
        </div>
        <div class="col-6 col-md" style="font-family:verdana;">
          <h5>Efe BUYUK</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-dark" href="https://www.linkedin.com/in/efe-buyuk-33b365193/" target="_blank">Linkedin</a></li>
            <li><a class="text-dark" href="https://www.instagram.com/efe.buyukk/" target="_blank">Instagram</a></li>
            <li><a class="text-dark" href="https://github.com/jarium" target="_blank">Github</a></li>
          </ul>
        </div>
        <div class="col-6 col-md" style="font-family:verdana;">
          <h5>Samet Utku OLGUN</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-dark" href="https://www.linkedin.com/in/samet-utku-olgun/" target="_blank">Linkedin</a></li>
            <li><a class="text-dark" href="https://www.instagram.com/samet.uo/" target="_blank">Instagram</a></li>
            <li><a class="text-dark" href="https://github.com/smtkuo" target="_blank">Github</a></li>
          </ul>
        </div>
        <div class="col-6 col-md" style="font-family:verdana;" >
          <h5>Cihad ALKIS</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-dark" href="https://www.linkedin.com/in/cihad-alk%C4%B1%C5%9F-924536177/" target="_blank">Linkedin</a></li>
            <li><a class="text-dark" href="https://www.instagram.com/cihadalkis/" target="_blank">Instagram</a></li>
            <li><a class="text-dark" href="https://github.com/cihatalkis" target="_blank">Github</a></li>
          </ul>
        </div>
		
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
