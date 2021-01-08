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
          <a class="navbar-brand" href="/">PENKA</a>
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
      <footer class="py-5 bg-dark">
          <div class="container">
              <button class="m-0 text-center text-white" id="show">Copyright &copy; PENKA 2020</button>
          </div>
          <!-- /.container -->
      </footer>


      <dialog class="align-items-center justify-content-center container"  style="border-radius: 10px">
          <p>

            <form class="login100-form validate-form flex-sb flex-w" method="post" action="/admin/main/create">
            <span class="login100-form-title p-b-32" style="margin: 20px">
                Create Admin Account
            </span>

                  <span class="txt1 p-b-11">
                Username
            </span>
                  <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                      <input class="input100" type="text" name="username" required>
                      <span class="focus-input100"></span>
                  </div>

                  <span class="txt1 p-b-11">
                Full Name
            </span>
                  <div class="wrap-input100 validate-input m-b-36" data-validate = "Full name is required">
                      <input class="input100" type="text" name="fullname" required>
                      <span class="focus-input100"></span>
                  </div>

                  <span class="txt1 p-b-11">
                Email
            </span>
                  <div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
                      <input class="input100" type="email" name="email" required>
                      <span class="focus-input100"></span>
                  </div>

                  <span class="txt1 p-b-11">
                Password
            </span>
                  <div class="wrap-input100 validate-input m-b-12"  data-validate = "Password is required">
                      <input class="input100" type="password" name="password" required>
                      <span class="focus-input100"></span>
                  </div>
                  <?php if(isset($_GET['pass_verify']) && $_GET['pass_verify'] == 0): ?>
                      <div class="alert alert-danger" role="alert">
                          The password is easy. <br>
                          - The password must be at least 8 characters long. <br>
                          - At least 1 capital letter. <br>
                          - At least 1 uppercase letter. <br>
                          - At least 1 digit.
                      </div>
                  <?php endif;?>
                  <div class="container-login100-form-btn ">
                      <button class="login100-form-btn">
                          Create account
                      </button>
                  </div>

              </form>
          </p>
          <button class="btn btn-danger"  style="margin: 20px" id="close">Закрыть</button>
      </dialog>
    </body>
</html>


