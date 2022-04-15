<?php session_start(); //start a new session
//check if the user is loggin
if (isset($_SESSION['user'])) {
  header('location: ../views/dashbord');
  die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../app.css">
  <title>inscription</title>
</head>
<body>
  <div class="container">
    <form action="../backend/register.php" method="post">
      <div class="formulaire">
        <h2>S'inscrire</h2>

              <!-- if there errors this will be visible -->
              <?php if (isset($_SESSION['register_err'])) { ?>
                  <div class="alert-box">
                    <?= $_SESSION['register_err'] ?>
                  </div>
              <?php

            }
            ?>
          <div class="input">
            <label for="">votre nom d'utilisateur</label>
            <input type="text" name="uName" class="input_field">
          </div>
          <div class="input">
            <label for="">votre mot de passe</label>
            <input type="password" name="pass" class="input_field">
          </div>
          <div class="input">
            <label for="">confirmer mot de passe</label>
            <input type="password" name="pass_c" class="input_field">
          </div>
          <div class="input">
            <input type="submit" name="register" class="btn">
          </div>
        </div>
    </form>
  </div>
</body>
</html>