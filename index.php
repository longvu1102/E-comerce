<?php
spl_autoload_register('myModelClassLoader'); // nó đăng ký gọi phương thức, mà phương thức đó phải gọi những
function myModelClassLoader($className)
{
  $path = 'Model/';
  include_once $path . $className . '.php';
}
include_once "Model/class.phpmailer.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Content/Style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="NEW-INTEGRITY-VALUE" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="NEW-INTEGRITY-VALUE" crossorigin="anonymous">
  <title></title>
</head>
<style>

</style>

<body>
  <div class="snowflakes" aria-hidden="true">
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
    <div class="snowflake">
      <div class="inner">🌸</div>
    </div>
  </div>
  <?php
  include_once 'View/Header.php';

  echo '<div class="container-fluid">';

  $controller = isset($_GET['controller']) ? $_GET['controller'] : 'Home';
  $action = isset($_GET['action']) ? $_GET['action'] : 'index';

  $controllerFile = "Controller/{$controller}Controller.php";

  if (file_exists($controllerFile)) {
    include_once $controllerFile;
  } else {
    echo '404 - Not Found';
  }

  echo '</div>';

  include_once 'View/Footer.php';
  ?>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>