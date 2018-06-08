
<!-- including the nesessary files  the database connection and the page header  -->
<?php session_start();  ?>
<?php include('connect.php'); ?>
<?php include('includes/header.php');?>

<?php


     //checking if a staff id exist
	  if(isset($_GET['staff_id']))
	  {        
	  	 $staff_id = $_GET['staff_id'];
      // echo $staff_id;
	  }	
	  else
	  {
	  	  header('Location: index.php');
	  }
    


      //this block of code proccess the form
      if(isset($_POST['unit']) && isset($_POST['deptsec']) && isset($_POST['desc_of_duty']))
      {
      	  if(!empty($_POST['unit']) || !empty($_POST['deptsec']) || !empty($_POST['desc_of_duty']))
      	  {
               //proses
      	  	  //echo 'working challo';

      	  	  $unit = $_POST['unit'];
      	  	  $deptsec = $_POST['deptsec'];
      	  	  $desc_of_duty = $_POST['desc_of_duty'];


      	  	  //making tfhe query to insert data
              /* $q = "UPDATE users SET title='$title', fname='$fn', lname='$ln', email='$e', addr1='$ad1',
          addr2='$ad2', city='$cty', county='$cnty', pcode='$pcode', phone='$ph' WHERE user_id=$id LIMIT 1";  */

      	  	  $q = "UPDATE history SET unit='$unit', dept_sec='$deptsec', desc_duty='$desc_of_duty' WHERE staff_id='$staff_id'";
      	  	  $result = mysqli_query($dbcon, $q);
      	  	  if($result)
      	  	  {
      	  	  	  
                         $_SESSION['succes_add'] = 1;
                        
                        //redirecting the user after succesfully adding a staff
                   	    header('Location: index.php');
                        exit();


      	  	  }
      	  	  else
      	  	  {
      	  	  	  //displaying an error message if any
                   	  echo 'error '.mysqli_error($dbcon);
      	  	  }

      	  }
      	  else
      	  {
      	  	 $msg = '<div class="alert alert-danger" role="alert">All fields are required</div>';
      	  }
      }
      else
      {
      	 //echo 'sorry jemila , dere is a problem';
      }

      

  




?>



<!-- present posting form -->

     <section id="p_posting">
     	<div class="container">
     		<div class="row">
     			

              <div class="col-md-3"></div>

               <div class="col-md-6">

                     <div id="p_posting_form">
               	       <div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Present Posting</h3>
						  </div>
						  <div class="panel-body">
						    
                            
                              <?php if(!empty($msg)) :?> 
                               <?php echo $msg; ?>
                              <?php endif; ?>

                          <form action="p_posting.php?staff_id=<?php echo $staff_id; ?>" method="post">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Unit</label>
						    <input type="text" class="form-control" name="unit" id="unit" placeholder="Enter Unit">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Department / Section</label>
						    <input type="text" class="form-control" name="deptsec" id="deptsec" placeholder="Department / Section">
						  </div>


						  <div class="form-group">
						  	 <label for="desc_of_duty">Description of duty</label>
						  	 <textarea class="form-control" name="desc_of_duty" id="desc_of_duty" placeholder="Description of duty"></textarea>
						  </div>
						 
						  <button type="submit" class="btn btn-primary btn-block">Submit</button>
						</form>

						  </div>
						</div>
               	
                   
                    	
                    </div>
                  

               </div>

               <div class="col-md-3"></div>



     		</div>
     	</div>
     </section>

<!-- present posting form --> 