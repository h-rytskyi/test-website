<?php
  require "header.php";
  require "includes/functions.inc.php";
 ?>

 <div class="card" style="width:600px;">
   <h1 align="center">Basic Calculator</h1>
   <form action="calculator.php" method="get">
     <fieldset>
       <legend>Basic Calculator</legend>
       <label for="num1">Enter first number: </label>
       <input type="number" name="num1" title="Enter first number" placeholder="Enter first number"> <br />
       <label for="operator">Choose operation: </label>
       <select name="operator">
         <option value="+">+</option>
         <option value="-">-</option>
         <option value="*">*</option>
         <option value="/">/</option>
       </select> <br />
       <label for="num2">Enter second number: </label>
       <input type="number" name="num2" title="Enter second number" placeholder="Enter second number"> <br />
       <input type="submit" name="calc_submit" value="   =   ">

       <p class="result"> Result:
       <?php
       if (isset($_GET['calc_submit'])) {
         $num1 = $_GET["num1"];
         $num2 = $_GET["num2"];
         $operator = $_GET["operator"];
         $sum;

         echo calculator($num1, $num2, $operator);
       } 
       ?> </p>
     </fieldset>
   </form>



 <?php
   require "footer.php"
  ?>
