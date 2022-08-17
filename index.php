<?php
  require "header.php";
  require "includes/functions.inc.php";
 ?>

    <main>
<p>This is the first file in my new Git Repo.</p>
<p>This line is here to show how merging works.</p>
<div class="newBranch"></div>
<p>kldnvslkvndklsn another text tessting</p>
<div class="commit"></div>
      <div class="card" style="width:600px;">
        <h1 align="center">Григорій Рицький</h1>
        <h3 align="center">drupal developer, trainee</h3>
        <div class="card_content">
          <p>Доброго дня, кілька тижнів назад відправляв вам своє резюме.
            За ці кілька тижнів я вивчив основи <b>HTML</b> i <b>CSS</b>, оформлення сайту
            зроблене тільки за допомогою цих технологій. Серверна частина побудована
            на <strong>PHP</strong>. Реалізував кілька речей - можна зареєструватися на сайті, залогінитися,
            причому тоді з'явиться меню вашого профілю, в мені профілю можна змінити свій аватар і фоновий бекграунд,
            можна як просто оновлювати картинки, так і просто видалити. Також на сайті добавлений калькулятор реалізований на <strong>PHP</strong>.
            Для створення баз данних використовував <strong>MySQLi</strong>.
            Всі файли додаю за посиланням.
          </p>
        </div>
        <a class="download" href="uploads/mysite.zip" target="_self" >Завантажити архів</a><br/>
      <?php
        if (isset($_SESSION['userId'])) {
          echo "<p class='success'>You are logged in!</p>";
          echo "<h2 class='success'>Hello, dear ".$_SESSION['userName']."</h2>";

        }
        else {
          echo "<p class='error'>You are logged out!</p>";
        }
       ?>

      </div>
    </main>

  <?php
    require "footer.php"
   ?>
