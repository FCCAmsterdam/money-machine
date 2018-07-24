<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>

</head>

<body>
    <div class="form">
          <h1> See you next time </h1>

          <h3><?= 'You have successfully logged out!'; ?></h3>

          <a href="index.php"><button class="button button-block"/>Home</button></a>

    </div>
</body>
</html>
