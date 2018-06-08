<?php

 /*
  * @this file make the database possible
  *
  *
  */


  //making the variables
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $db_name = 'kanopoly';


  //making the database connection
  $dbcon = mysqli_connect($host, $username, $password, $kanopoly);

   //i commented the below code because i used it to confirm that the databse is connected and i dont need it again . BUT DONT DELETE !!!
  /**
 
  if($dbcon)
  {
  	 echo 'Database connected';
  }
  else
  {
  	 echo 'Connection Fail ' . mysqli_error($dbcon);
  }
     */












?>