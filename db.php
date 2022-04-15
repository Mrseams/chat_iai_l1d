<?php


/**
 * in this file, we created a new pdo instance to link our code base with our database
 * @author Mr. Essam 14/04/2022
 */


//lets create some variables first

$hosturl = 'localhost'; //this is the url of our database, since we work in local our url is localhost with
//ftp it might be different like http://url_of_my_database.com


// this is the crédentials to connect to our database management system like phpMyAdmin by default on wampServer
// user name is "root" and password is "" (empty)
$user = 'root';
$pass = "";
$dbname = 'blog_l1D'; //our database name
$port = '3306'; //! 3306 for mariaDB and 3308 for mysql, don't forget. by defult is this 3306


/*
OPTIONS

PDO::ATTR_ERRMODE -> because we want to be able to catch mysql errors
PDO::ERRMODE_EXCEPTION -> because we want to throw and exception if an error occure
PDO::ATTR_DEFAULT_FETCH_MODE -> because we want to set how fetch database data will be formated: {
  ->FETCH_OBJ : to get data as object.EX: $row->name
  ->FETCH_ASSOC : to get data as associative array. EX: $row['name']
}
 */
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];

//now let create our PDO instance
/*for this little app we will use mysql database */


try {
  $pdo = new PDO("mysql:host=$hosturl;dbname=$dbname;port=$port", $user, $pass, $options); //! no spaces
} catch (PDOException $e) {
  echo 'connection a la base de donnée impossible: ' . $e->getMessage();
}
?>