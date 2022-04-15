<?php

/**
 * this file will be use to hold to code for authentication
 * @author Mr. Essam 14/04/2022
 * @description: first we check if the user is loggin.if no we procede. if yes he is redirected back
 * when the form is submit, we first check the data received and then if there is an user
 * whin the uName and the pass provided we can login the user. else we redirect his back.
 */

session_start();
include '../db.php'; // we include this file because we want to use our PDO instance

unset($_SESSION['login_err']);
if (isset($_POST['login'])) {//first we check, if the submit button has been pressed
  if (isset($_POST['uName']) && isset($_POST['pass'])) { //we check if the username and pass field exist
    if (!empty($_POST['uName']) && !empty($_POST['pass'])) { //we check if the username and pass field are'nt empty
      $uname = htmlspecialchars($_POST['uName']); //! to avoide SQL injections never trust user inputs NEVER!
      $pass = htmlspecialchars($_POST['pass']); //! to avoide SQL injections never trust user inputs NEVER!

      $query = 'SELECT * FROM users WHERE uName = :uName AND pass = :pass';
      $statement = $pdo->prepare($query); //! to avoide SQL injections never trust user inputs NEVER!
      $statement->execute(['uName' => $uname, 'pass' => $pass]); // execute() throw an exception when there is SQL errors
      $data = $statement->fetch(); // note: fetch when we need on row and fetchAll() for many rows
      //fetch returns true or and object (or array depending on fetch mode) when the query is ok
      //and return false when the results of the query is empty

      if ($data) { // if fetch return true and is not empty.
        $_SESSION['user'] = $data;
        header('location: ../views/dashbord.php'); //Http redirection. remember it.
      } else {
        $_SESSION['login_err'] = 'aucun utilisateur trouvé !!!'; //we warm the user.
        header('location:' . $_SERVER['HTTP_REFERER']); //back to the previous page

      }

    }
  }
}