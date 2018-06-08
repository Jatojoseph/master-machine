


<!-- including the nesessary files  the database connection and the page header  -->

<?php session_start(); ?>
<?php include('connect.php'); ?>
<?php include('includes/header.php');?>









    <!-- section body -->
    
       <section id="into-body">
       	   <div class="container">
       	   	  <div class="row">

                

                 
               <!-- all staffs are display here -->


                    <div class="col-md-12">
                       <div id="all_staff">
                                 
                            

                        
                       <!-- btn add staff -->
                         <div id="button_staff">
                            <a href="add_staff.php" class="btn btn-primary btn-lg">+ Add New Staff</a>
                            <br><br>
                         </div>
                       <!-- btn add staff -->

                        <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h2 class="panel-title">All Staff</h2>
                        </div>
                        <div class="panel-body">

                             
                           <!--  displaying the success add staff message  -->

                           <?php  if(isset($_SESSION['succes_add'])){
                                      
                                     echo '<div class="alert alert-success" role="alert">Staff Succesfuly Added</div>'; 
                                     $_SESSION = array(); // Destroy the variable.
                                     session_destroy(); 

                                  }


                                  

                                //displaying the success delete message
                                  if(isset($_SESSION['succes_delete'])){
                                      
                                     echo '<div class="alert alert-info" role="alert">Staff Deleted Succesfuly</div>'; 
                                     $_SESSION = array(); // Destroy the variable.
                                     session_destroy(); 

                                  }


                            ?>



                          <!-- making query to get all staff -->
                               <?php


                                     //this query gets all the staff information
                                    $q = "SELECT staffs.*, history.*, qualification.*  FROM staffs LEFT JOIN history ON history.staff_id=staffs.staff_id LEFT JOIN qualification ON qualification.staff_id=staffs.staff_id";
                                     $result = mysqli_query($dbcon, $q);
                                     if($result)
                                     {
                                       
                                       
                                          

                                          //table displaying all the staff in the databaase
                                      ?>
                                          <table class="table table-bordered table-striped">
                                           <tr>
                                             <th>Staff Name</th>
                                             <th>Staff Email</th>
                                             <th>Phone Number</th>
                                             <th>View Info</th>
                                             <th>Delete</th>
                                            
                                           </tr>

                                      <?php   

                                           while ($row = mysqli_fetch_array($result)) {
                                                  
                                        ?>

                                              
                                               <tr>
                                               <td><?php echo $row['name']; ?></td>
                                              <td><?php echo $row['email']; ?></td>
                                              <td><?php echo $row['phone']; ?></td>
                                               <td><a href="staff_info.php?staff_id=<?php echo $row['staff_id']; ?>" class="btn btn-primary">View Info</a></td>
                                               <td><a class="btn btn-danger" href="delete.php?staff_id=<?php echo $row['staff_id']; ?>">Delete</a></td>
                                             
                                             </tr>
                                                   


                                           <?php } ?>

                                          </table>


                                          <?php 


                                     }
                                     else
                                     {
                                        echo 'error' . mysqli_error($dbcon);
                                     } 
                                     


                                ?>
                          <!-- making query to get all staff -->
                         
                          
                        </div>
                      </div>
                 

                         
                       </div>
                    </div>
                   
               <!-- all staffs are display here -->

                   

                  

       	   	  </div>
       	   </div>
       </section>

    <!--/ section body -->















<?php include('includes/footer.php'); ?>

