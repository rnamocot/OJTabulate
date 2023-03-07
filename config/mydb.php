<?php

function connectionDBlocal(){  
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
function connectionDBlocalnew(){  
$host="localhost";
$username="root";
$password="";
$database="ojt_management_system_db";
$con =new mysqli($host, $username,$password, $database );
if($con->connect_error){
    echo $con->connect_error;
}else{
     return $con;
 }
} 

?>