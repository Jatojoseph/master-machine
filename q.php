
<!-- including the nesessary files  the database connection and the page header  -->
<?php include('connect.php'); ?>
<?php include('includes/header.php');?>



<?php
 
   
	   //checking if a staff id exist
	  if(isset($_GET['staff_id']))
	  {        
	  	 $staff_id = $_GET['staff_id'];
	  }	
	  else
	  {
	  	  header('Location: index.php');
	  }

	  
      if(isset($_POST['q_date']) && isset($_POST['q_detail']))
      {
      	   if(empty($_POST['q_date']) || empty($_POST['q_detail']))
		   {
		      	   $msg = '<div class="alert alert-danger" role="alert">All fields are required</div>';
		   }
		   else
		   {
		   	       //get the user input into the variable
		   	       $q_date   = $_POST['q_date'];
                   $q_detail = $_POST['q_detail'];

                   //making the query
                   $q = "INSERT INTO qualification(q_detail, q_date, staff_id)VALUES('$q_detail', '$q_date', '$staff_id')";
                   $result = mysqli_query($dbcon, $q);
                   if($result)
                   {
                   	    header('Location: h.php?staff_id='.$staff_id);
                        exit();
                   } 
                   else
                   {
                   	  echo 'error '.mysqli_error($dbcon);
                   }
		   }
      }
  	 







?>





   <!-- section body -->
    
       <section id="into-body">
       	   <div class="container">
       	   	  <div class="row">

                

                   
                   <!-- form  to  add  staff -->
                   <div class="col-md-3"></div>
                     <div class="col-md-6">


                          <div class="panel panel-primary">
                            <div class="panel-heading">
                              <h2 class="panel-title">Add Staff Qualification</h2>
                            </div>
                          <div class="panel-body">


                          	  <?php if(!empty($msg)) :?> 
                               <?php echo $msg; ?>
                              <?php endif; ?>
                            
                            <form action="q.php?staff_id=<?php echo $staff_id; ?>" method="POST" class="form-group">  



                             <div class="row">
                              <div class="col-md-12">
                                 <label>Date Of Qualification</label>
                                <input class="form-control" type="text" name="q_date" placeholder="Qualification Date">
                              </div>
                             
                            </div>	

                             <br> 

                             <div class="row">
                             
                              <div class="col-md-12">
                                 <label>Qualification Details</label>
                                <textarea class="form-control" name="q_detail" placeholder="Qualification Details"></textarea>
                              </div>
                              
                            </div>

                            <br>

                             <div class="row">
                              <div class="col-md-4"></div>
                              <div class="col-md-4"></div>

                              <div class="col-md-4">
                                 <input type="submit" class="btn btn-success pull-right" value="+ Save Data" />
                              </div>

                            </div>

                            
                       </form><!-- end of form -->
 
                            

                          </div><!-- end of panel body -->
                        </div><!-- end of panel default -->
                          
                        

                     </div>
                     <div class="col-md-3"></div>
                   <!-- form to add  staff -->           
                   

                  

       	   	  </div>
       	   </div>
       </section>

    <!--/ section body -->