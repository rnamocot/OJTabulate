<?php

<<<<<<< HEAD
function connectionDBlocalnew(){  
=======
function connectionDBlocal(){  
>>>>>>> b995595ba33e5f394e21bfdafd7b8d71b6647488
    $host="localhost";
    $username="u254141837_chappie";
    $password="Tarsierjojo123!";
    $database="u254141837_ojtabulate";
    $con =new mysqli($host, $username,$password, $database );
    if($con->connect_error){
       echo $con->connect_error;
    }else{
        return $con;
    }
} 
<<<<<<< HEAD
function connectionDBlocal(){  
$host="localhost";
$username="root";
$password="";
$database="ojt_management_system";
=======
function connectionDBlocalnew(){  
$host="localhost";
$username="root";
$password="";
$database="ojt_management_system_db";
>>>>>>> b995595ba33e5f394e21bfdafd7b8d71b6647488
$con =new mysqli($host, $username,$password, $database );
if($con->connect_error){
    echo $con->connect_error;
}else{
     return $con;
 }
} 

?>