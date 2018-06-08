<?php 
    
    //starting the session
    session_start();


     //including the databse connection file
     include('connect.php'); 

    //checking if a staff id exist
	  if(isset($_GET['staff_id']))
	  {        
	  	 $staff_id = $_GET['staff_id'];
	  }	
	  else
	  {
	  	  header('Location: index.php');
	  }




     //make the query to delete a staff from the database
	  $q = "DELETE staffs.* FROM staffs WHERE (staff_id='$staff_id') ";
	  $result = mysqli_query($dbcon, $q);
	  if($result)
	  {   
	  	  $_SESSION['succes_delete'] = 2;
	  	  header('Location: index.php');
	  }
      else
      {
      	  echo 'error deleting ' . mysqli_error($dbcon) ;
      	  exit;
      }










?>