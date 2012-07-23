<?php

session_start();

$whoami = $_SESSION['username'];

$whoami2 = $_SESSION['password'];

echo $whoami;

if($whoami2 == null){

echo "session not set";

}else{

echo "session set";
}

?>