<?php

/**
 * this file will be use to hold to code for registration
 * @author Mr. Essam 14/04/2022
 * @description: first we check if the user is loggin.if no we procede. if yes he is redirected back
 */

session_start();
include '../db.php'; // we include this file because we want to use our PDO instance

unset($_SESSION['register_err']);
//first we check, if the submit button has been pressed
if (isset($_POST['register'])) {
    //we check if the username and pass field exist
  if (isset($_POST['uName']) && isset($_POST['pass']) && isset($_POST['pass_c'])) { 
    //we check if the username and pass field are'nt empty
    if (!empty($_POST['uName']) && !empty($_POST['pass']) && !empty($_POST['pass_c'])) {
      $uname = htmlspecialchars($_POST['uName']); //! to avoide SQL injections never trust user inputs NEVER!
      $pass = htmlspecialchars($_POST['pass']); //! to avoide SQL injections never trust user inputs NEVER!
      $pass_c = htmlspecialchars($_POST['pass_c']); //! to avoide SQL injections never trust user inputs NEVER!

      $query = 'SELECT * FROM users WHERE uName = :uName';
      $statement = $pdo->prepare($query); //! to avoide SQL injections never trust user inputs NEVER!
      $statement->execute(['uName' => $uname]); // execute() throw an exception when there is SQL errors
      $data = $statement->fetch(); // note: fetch when we need on row and fetchAll() for many rows
      //fetch returns true or and object (or array depending on fetch mode) when the query is ok
      //and return false when the results of the query is empty.

      //check if the password and the confirmation match
      if ($pass_c != $pass) {
        $_SESSION['register_err'] = 'le mot de passe et la confirmation ne sont pas identiques'; //we warm the user.
        header('location:' . $_SERVER['HTTP_REFERER']);
      } elseif ($data) { // if fetch return true and is not empty => i user with username existe. 
        $_SESSION['register_err'] = 'nom d\'utilisateur non disponible'; //we warm the user.
        header('location:' . $_SERVER['HTTP_REFERER']);
      } else {
         //we create a new user
        $query = "INSERT INTO users (uName, pass)  values (:u, :p) ";
        $sql = $pdo->prepare($query);
        //if the query is ok and the user added
        if ($sql->execute(['u' => $uname, 'p' => $pass])) {
          $query = 'SELECT * FROM users WHERE uName = :uName';
          $statement = $pdo->prepare($query);
          $statement->execute(['uName' => $uname]);
          $data = $statement->fetch();
          $_SESSION['user'] = $data;
          header('location: ../views/dashbord.php');
        }
      }

    }
  }
}