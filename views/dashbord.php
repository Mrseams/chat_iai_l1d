<?php
session_start(); //start a new session
//check if the user is loggin
if (!isset($_SESSION['user'])) {
  header('location: ../views/login');
  die;
}
include '../backend/loadMessages.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../app.css">
  <title>L1D ma famille</title>
</head>
<body>
  <div class="container">
    <div class="messages_container">
      <div class="messages_container_header">
        <div class="messages_container_header_title">
          L1d ma famille
        </div>
        <div class="messages_container_header_uName"><?= $_SESSION['user']->uName ?></div>
      </div>
     <div class="messages">
      <?php foreach ($messages as $msg) { ?>
        <div class="item"  
          <?php if ($msg->user_id == $_SESSION['user']->id) {
            echo "style='align-self:flex-end; color:black; background:white' ";
          } ?>  
        >
         <?= $msg->message; ?>
         <hr>
         <?= $msg->uName . ' le ' . $msg->date ?>
        </div>
      <?php 
    } ?>
     </div> 
     <div class="input">
       <form action="../backend/insertMessages" method="post">
        <textarea name="message" cols="30" rows="3" placeholder="entrer du text"></textarea>
        <button type="submit" name="message_send">go</button>
      </form>
     </div>
    </div>
  </div>
</body>
</html>
