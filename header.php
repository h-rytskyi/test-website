<?php
session_start();
require 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width+device-width, initial-scale=1">
    <title>Login System</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style media="screen">
    .twitts {
      width: 70%;
      height: 100%;
      background: #ffffff;
      margin: auto;
      margin-top: 30px;
      margin-bottom: 30px;
      padding: 10px 30px;
      display: grid;
      grid-template-columns: auto auto;
      border-radius: 20px;
      box-shadow: 3px 3px 10px black;
    }
    .title, .content {
      grid-column-start: 1;
      grid-column-end: 3;
    }
    .date {
      text-align: right;
    }
    .author {

    }
    .twit_form {
      margin: auto;
      width: 70%;
      margin-top: 10px;
      text-align: right;
      font-family: inherit;
      font-size: inherit;
    }
    .twitt_container {
      display: block;
      width: 100%;
      height: 100px;
      padding: 10px 20px;
      margin: 5px;
      resize: none;
      border-radius: 20px;
      box-shadow: 3px 3px 10px black;
    }
    .title_container {
      width: 100%;
      padding: 10px 20px;
      margin: 5px;
      border-radius: 20px;
      box-shadow: 3px 3px 10px black;
    }
    .search_twitt {
      width: 70%;
      margin:auto;
      margin-top: 100px;
    }
    .download {
      width:  60%;
      margin: auto;
      text-align: center;
      vertical-align: middle;
      font-size: 20px;
      height: 50px;
      padding: 9px 20px;
      background-color: rgba(0, 136, 169, 1);
      border: none;
      border-radius: 50px;
      cursor: pointer;
      outline: none;
      transition: all 0.3s ease 0s;
    }
    .download:hover {
      background-color: rgba(0, 136, 169, 0.8);
    }
    .card_form {
    text-align: center;
    }
    .card_form label {
      cursor: pointer;
    }
    .card_form label:hover {
    color: rgba(0, 136, 169, 1);
  }
    .card_form input {
      display: none;
    }
    .card_form button {
      width:  80%;
      font-size: 16px;
      color: white;
      height: 40px;
      padding: 9px 20px;
      background-color: rgba(0, 136, 169, 1);
      border: none;
      border-radius: 50px;
      cursor: pointer;
      outline: none;
      transition: all 0.3s ease 0s;
      margin-bottom: 10px;
    }
      .card_form button:hover {
      background-color: rgba(0, 136, 169, 0.8);
    }
    </style>
  </head>
  <body>
    <header>
      <h1 class="logo">Rytskyi</h1>
      <input type="checkbox" id="nav-toggle" class="nav-toggle">
        <nav>
          <ul class="nav_links">
            <li><a href="index.php">Home</a></li>
            <li><a href="twitter.php">twitter</a></li>
            <li><a href="calculator.php">Calculator</a></li>
            <!--<li><a href="#">Contact</a></li>-->
              <?php
              if (isset($_SESSION['userId'])) {
                echo "<li><a href='profile.php'>".$_SESSION['userName']."</a></li>";
                echo "<li><a href='#'>
                        <form action='includes/logout.inc.php' method='post'>
                          <a href='#'><button class='logout-button' type='submit' name='logout-submit'>Logout</button></a>
                        </form>
                      </li>";
              }
              else {
                echo "<li><a href='login.php'>login</a></li>";
              }
               ?>
          </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-label">
          <span></span>
        </label>
    </header>
