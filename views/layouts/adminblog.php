<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap core CSS -->
      <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="../../public/blog-home.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
      <link rel="stylesheet" type="text/css" href="/css/util.css">
      <link rel="stylesheet" type="text/css" href="/css/main.css">
      <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
        <?=$this->getMeta();?>
    </head>
    <body>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="/">News</a>
            <a type="text" class="btn btn-success" href="/admin/main/menu">Администратор</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="/">Home

                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br><br>
      <?=$content?>
      <!-- Bootstrap core JavaScript -->
      <script src="/vendor/jquery/jquery.min.js"></script>
      <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Footer -->
      <!--<footer class="py-5 bg-dark">
          <div class="container">
              <button class="m-0 text-center text-white" id="show">Copyright &copy; PENKA 2020</button>
          </div>
      </footer>-->
    </body>
</html>


