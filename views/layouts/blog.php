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
      
        <?=$this->getMeta();?>
    </head>
    <body>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="/">PENKA</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="/">Home
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br><br>
      <?=$content?>
      <script src="/vendor/jquery/jquery.min.js"></script>
      <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <footer class="py-5 bg-dark">
          <div class="container">
              <button id="show" class="m-0 text-center text-white">Copyright &copy; PENKA 2020</button>
          </div>
      </footer>

      <dialog class="align-items-center justify-content-center container"  style="border-radius: 10px">
          <p>
          <form class="login100-form validate-form flex-sb flex-w" method="post" action="/admin/main/login">
                <span class="login100-form-title p-b-32"  style="margin: 20px">
                    Account Login
                </span>
              <?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'failed'): ?>
                  <div class="alert alert-danger" role="alert">
                      Username or Password were entered incorrectly. <br>
                      Try again...
                  </div>
                  <?php unset($_SESSION['error']); ?>
              <?php endif;?>
              <span class="txt1 p-b-11">
                    Username
                </span>
              <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                  <input class="input100" type="text" name="username" required>
                  <span class="focus-input100"></span>
              </div>

              <span class="txt1 p-b-11">
                    Password
                </span>
              <div class="wrap-input100 validate-input m-b-12"  data-validate = "Password is required">
                  <input class="input100" type="password" name="password" required>
                  <span class="focus-input100"></span>
              </div>
              <div class="container-login100-form-btn">
                  <button class="login100-form-btn">
                      Login
                  </button>
              </div>
          </form>

          </p>
          <button class="btn btn-danger"  style="margin: 20px" id="close">Закрыть</button>
      </dialog>
    </body>
</html>
