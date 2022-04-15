<?php

/**
 * this file will be use to hold to code to load the messages
 * @author Mr. Essam 14/04/2022
 */

include '../db.php';
$query = "SELECT *  from messages JOIN users on users.id = messages.user_id";
$sql = $pdo->prepare($query);
$sql->execute();
$messages = $sql->fetchAll();
//var_dump($_SESSION);
// session_destroy();