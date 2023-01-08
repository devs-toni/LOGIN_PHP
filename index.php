<?php
session_start();

// If the user is logged, load the default user page
if (isset($_SESSION["USER"])) {
  header("Location: page.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login PHP</title>

  <!-- Bootstrap CDN styles and js -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- CSS File-->
  <link rel="stylesheet" href="./css/login.css">
</head>

<body>
  <?php
  // If the session time has expired
  if (isset($_GET['expire'])) {
  ?>
    <div class="container-fluid d-flex justify-content-center mt-3 col-10">
      <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
        <div>
          <strong>Session expired!</strong>. Please login again.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    </div>
  <?php  } ?>

  <!-- Login Form -->
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="./assets/draw2.svg" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="./validate.php" method="POST" id="form">
            <div class="form-outline mb-4">
              <input type="text" name="username" id="username" class="form-control form-control-lg" required />
              <label class="form-label" for="username">Username</label>
            </div>
            <div class="form-outline mb-4">
              <input type="password" name="password" id="pass" class="form-control form-control-lg" required />
              <label class="form-label" for="pass">Password</label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
          </form>
          <?php
          // If there is error in login, show error
          if (isset($_REQUEST["error"])) {
          ?>
            <p id="error-p" class="mt-5" style="color: red; font-weight: bolder">Error de inicio de sesión</p>
            <script>
              // Hide error in 5 seconds
              setTimeout(() => {
                document.querySelector('#error-p').textContent = '';
              }, 5000);
            </script>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </section>
</body>
</html>