<?php

/**
 * this file will be use to hold to code to insert messages
 * @author Mr. Essam 14/04/2022
 */
session_start();
include '../db.php';

if (isset($_POST['message_send'])) {
  if (isset($_POST['message']) && !empty($_POST['message'])) {
    $msg = htmlspecialchars($_POST['message']);
    $query = 'INSERT INTO  messages (user_id, message, date) VALUES (:userID, :mgs, :date)';
    $statement = $pdo->prepare($query);
    $statement->execute(['userID' => $_SESSION['user']->id, 'mgs' => $msg, ':date' => date("d/m/y")]);
    header('location:' . $_SERVER['HTTP_REFERER']);
    die;
  } else {
    header('location:' . $_SERVER['HTTP_REFERER']);
    die;
  }
} else {
  header('location:' . $_SERVER['HTTP_REFERER']);
  die;
}
