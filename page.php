<?php
require './utils.php';

// When Session expires
if (isset($_SESSION['lastActivity'])) Utils::checkCookieExpiration();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#">
              <?php
              echo $_SESSION['USER'];
              ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid text-center mt-5">
    <h3>Logged! <?php echo "<h1 class='mb-5'>", ucfirst($_SESSION['USER']), "</h1>" ?></h3>
    <form action="./logout.php" method="POST">
      <button type="submit" class="btn btn-danger btn-lg">Sign Out</button>
    </form>
  </div>
</body>

</html>