<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
  </head>
  <body>
  <?php session_start()?>
    <nav>
        <div class="main-header">
            <div class="main-header-logo"><a href=''>Donny Sp.</a></div>
              <div class="main-header-menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    
                    <?php
                    if(isset($_SESSION['username'])){
                    echo '
                    <li><a href="/UAS/DataSp/index.php">DataBase</a></li>
                    <li><a href="/UAS/Login/logout.php">Logout</a></li>';
                    } else {
                      echo
                      '<li><a href="/UAS/Login/index.php">Login</a></li>
                      <li><a href="/UAS/Login/register.php">Sign Up</a></li>';
                    }?>
                    <li><a href="/UAS/Tictac/index.html">Permainan 1</a></li>
                    <li><a href="/UAS/LemperDadu/dadu.html">Permainan 2</a></li>
                </ul>
            </div>
        </div>
    </nav>