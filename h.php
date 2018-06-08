

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


    
     
	     //checking if the user input is set
      if(isset($_POST['h_date']) && isset($_POST['confirm_id']) && isset($_POST['h_psn']) && isset($_POST['h_type']) && isset($_POST['h_salary']) && isset($_POST['h_rank']) && isset($_POST['h_other_service']) && isset($_POST['h_govt_service']) && isset($_POST['h_detail']))
      {

           //checking if the user input is empty
      	   if(empty($_POST['h_date']) && empty($_POST['h_date_con']) && empty($_POST['h_psn']) && empty($_POST['h_type']) && empty($_POST['h_salary']) && empty($_POST['h_rank']) && empty($_POST['h_other_service']) && empty($_POST['h_govt_service']) && empty($_POST['h_detail']))
		   {
               //displaying the error message if the form is empty
		      	  $msg = '<div class="alert alert-danger" role="alert">All fields are required</div>';
		   }
		   else
		   {
		   	          //get the user input into the variable
		   	           $h_date   = $_POST['h_date'];
                   $h_type   = $_POST['h_type'];
                   $h_detail = $_POST['h_detail'];
                   $confirm_id = $_POST['h_date_con'];
                   $h_salary  = $_POST['h_salary'];
                   $h_rank   = $_POST['h_rank'];
                   $h_other_service = $_POST['h_other_service'];
                   $h_govt_service = $_POST['h_govt_service'];
                   $h_psn   = $_POST['h_psn'];



                   
               
               
                  making the query
                   $q = "INSERT INTO history(staff_id, date_of_ap, type_of_ap, ap_detail, date_of_confirm, rank, salary_level, period_other_services, period_govt_services, psn)VALUES('$staff_id', '$h_date', '$h_type', '$h_detail', '$confirm_id', '$h_rank', '$h_salary', '$h_other_service', '$h_govt_service', '$h_psn')";
                   $result = mysqli_query($dbcon, $q);
                   if($result)
                   {
                        
                        $_SESSION['succes_add'] = 1;
                        
                        //redirecting the user after succesfully adding a staff
                   	    header('Location: index.php');
                        exit();



                        header('Location: p_posting.php?staff_id='.$staff_id);
                        exit();
                   } 
                   else
                   {
                      //displaying an error message if any
                   	  echo 'error '.mysqli_error($dbcon);
                   }
		   }
      }
  	 

     







?>





   <!-- section body -->
    
       <section id="into-body">
       	   <div class="container-fluid">
       	   	  <div class="row">

                

                   
                   <!-- form  to  add  staff -->
                   <div class="col-md-2"></div>
                     <div class="col-md-8">

                              
                          <div class="panel panel-primary">
                            <div class="panel-heading">
                              <h2 class="panel-title">Add Staff History Of Services</h2>
                            </div>
                          <div class="panel-body">
                            
                              <?php if(!empty($msg)) :?> 
                               <?php echo $msg; ?>
                              <?php endif; ?>

                            <form action="h.php?staff_id=<?php echo $staff_id; ?>" method="POST" class="form-group">  



                             <div class="row">
                              <div class="col-md-4">
                                 <label>Date Of Appointment</label>
                                <input class="form-control" type="text" name="h_date" placeholder="Appointment Date">
                              </div>
                              <div class="col-md-4">
                                 <label>Date Of Confirmation</label>
                                <input class="form-control" type="text" name="confirm_id" placeholder="Confirmation Date">
                              </div>

                               <div class="col-md-4">
                                 <label>Psn</label>
                                <input class="form-control" type="text" name="h_psn" placeholder="Psn">
                              </div>

                            </div>	
                             
                              <br>

                             <div class="row">
                              <div class="col-md-5">
                                 <label>Type Of Appointment</label>
                                <input class="form-control" type="text" name="h_type" placeholder="Type of Appointment">
                              </div>
                              <div class="col-md-5">
                                 <label>Salary Level</label>
                                <input class="form-control" type="text" name="h_salary" placeholder="Salary Level">
                              </div>
                               <div class="col-md-2">
                                 <label>Rank</label>
                                <input class="form-control" type="text" name="h_rank" placeholder="Rank">
                              </div>
                            </div>


                            <br>


                              <div class="row">
                              <div class="col-md-6">
                                 <label>Period Spent In Other Govt  Services</label>
                                <input class="form-control" type="text" name="h_other_service" placeholder="Other Govt Services">
                              </div>
                              <div class="col-md-6">
                                 <label>Period Spent out of Govt  Services</label>
                                <input class="form-control" type="text" name="h_govt_service" placeholder="Out of Govt services">
                              </div>

                            </div>  


                             <br> 

                             <div class="row">
                             
                              <div class="col-md-12">
                                 <label>Apointment Details</label>
                                <textarea class="form-control" name="h_detail" placeholder="Apointment Details"></textarea>
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
                     <div class="col-md-2"></div>
                   <!-- form to add  staff -->           
                   

                  

       	   	  </div>
       	   </div>
       </section>

    <!--/ section body -->