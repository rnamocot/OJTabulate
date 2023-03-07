<?php
function connectionDBlive(){  
    $host="localhost";
    $username="u992206180_chappie";
    $password="Tarsierjojo123!";
    $database="u992206180_internships";
    $con =new mysqli($host, $username,$password, $database );
    if($con->connect_error){
       echo $con->connect_error;
    }else{
        return $con;
    }
} 
function connectionDBlocal(){  
$host="localhost";
$username="root";
$password="";
$database="ojt_management_system";
$con =new mysqli($host, $username,$password, $database );
if($con->connect_error){
    echo $con->connect_error;
}else{
     return $con;
 }
} 
