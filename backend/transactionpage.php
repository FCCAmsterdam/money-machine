<?php

require 'db.php';
session_start();

if (isset($_POST['transaction'])) {
    require 'transaction.php';
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Transaction Page</title>

</head>
<body>
  <div class="form">

      <!-- <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul> -->

      <div class="tab-content">

         <div id="transaction">
          <h1>Welcome! Happy budgeting</h1>

          <form action="transaction.php" method="post" autocomplete="off">


            <div class="field-wrap">
              <label>
                Description<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="description"/>
            </div>

            <div class="field-wrap">
              <label>
                transaction <span class="req">*</span>
              </label>
              <input type="number" required autocomplete="off" name="transaction_amnt"/>
            </div>
          </div>


          <div class="field-wrap">
            <label>
              date <span class="req">*</span>
            </label>
            <input type="date" required autocomplete="off" name="dateT"/>
          </div>
            <button type="submit" class="button button-block" name="transaction" />Submit</button>
        </div>

      </div>
    </div>
  </body>
</html>
