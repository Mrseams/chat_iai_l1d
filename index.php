<?php 
/**
 * this file will be use as a router for our application
 * and it is also our entry point
 * @author Mr. Essam 14/04/2022
 */

if (isset($_GET['action'])) {
  if ($_GET['action'] == 'login') {
    header('location:views/login.php');
    die;
  }
  if ($_GET['action'] == 'register') {
    header('location:views/register.php');
    die;
  }
} else {
  if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('location:views/welcome.php');
    die;
  }
}



