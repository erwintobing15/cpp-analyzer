<?php
  if (!isset($_GET['content'])) {
    $title = "C++ Compiler";
  } else {
    switch($_GET['content']) {
      case 'scanner'  : $title = "C++ Analyzer"; break;
      case 'tokens'   : $title = "C++ Tokens List"; break;
      default: $title = "C++ Compiler";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <!-- navigation  -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
          <li><a href="index.php?content=scanner">Scanner</a></li>
          <li><a href="index.php?content=tokens">Tokens</a></li>
          <!-- <li><a href="index.php?content=parser">Parser</a></li>
          <li><a href="index.php?content=semantik">Semantik</a></li> -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- website content -->
    <?php
      $content = '';
      if (!isset($_GET['content'])) {
        include 'page/scanner.php';
      } else {
        switch($_GET['content']) {
          case 'scanner'  : include 'page/scanner.php'; break;
          case 'tokens'   : include 'page/tokens.php'; break;
          // case 'parser'   : include 'page/parser.php'; break;
          // case 'semantik' : include 'page/semantik.php'; break;
          default: include 'page/scanner.php';
        }
      } 
    ?>

  </body>
  <script src="js/scanner.js"></script>
</html>
