<!-- databse file -->
<?php
// by PDO connect php file with mysql database 
// PDO : Represents a connection between PHP and a database server.

$dsn = "mysql:host=localhost;dbname=xteam"; #declare databse and host name 
$username = "root"; #default by mysql
$password = ""; #password for your database
$option = array(
    // for allow writig in arabic language
    // MYSQL_ATTR_INIT_COMMAND==> Command to execute when connecting to the MySQL server. Will automatically be re-executed when reconnecting.
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

// to avoid any error we use catch and error
try {
    // create object from PDO class 
    $connect = new PDO($dsn, $username, $password, $option);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    #setAttribute-> Sets an attribute on the database handle.
    #ATTR_ERRMODE->Errors and error handling
    #ERRMODE_EXCEPTION->Throw a PDOException if an error occurs.


    // if not connect
} catch (PDOException $e) {
    #PDOException==>Represents an error raised by PDO. You should no t throw a PDOException from your own code.
    echo "failed to connect" . $e->getMessage(); #getMessage==> Gets the Exception message


}

?>