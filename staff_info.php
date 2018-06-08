
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

?>



    






    <!-- section body -->
    
       <section id="into-body">
       	   <div class="container">
       	   	  <div class="row">

                
                  
                  <?php 

                         
                         //this query gets all the staff information
                         $q = "SELECT staffs.*, history.*, qualification.*  FROM staffs LEFT JOIN history ON history.staff_id=staffs.staff_id LEFT JOIN qualification ON qualification.staff_id=staffs.staff_id WHERE staffs.staff_id='$staff_id'";
                         $result = mysqli_query($dbcon, $q);
                         if($result)
                         {
                        
                            // var_dump(mysqli_fetch_row($result));
                              $row = mysqli_fetch_array($result);
                         

                  ?>



                     <h3 class="text-center">KANO STATE POLYTECHNIC </h3>
                     <h4 class="text-center">CENTRAL ADMINISTRATION</h4>
                     <h4 class="text-center">ACADEMIC PLANINING DEPARTMENT</h4>
                    

                 
                  <!-- table display of staff info -->
                       
                       <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h3 class="panel-title">STAFF RECORD</h3>
                        </div>
                        <div class="panel-body">
                           
                            <div class="col-md-6">
                               <h3> STAFF BIO DATA</h3>
                               <table class="table table-striped table-bordered">
                                  
                                  <tr class="success">
                                    <th>Staff Name</th>
                                    <td><?php echo $row['name']; ?></td>
                                  </tr>
                                  <tr class="success">
                                    <th>Email</th>
                                    <td><?php echo $row['email']; ?></td>
                                  </tr>
                                  <tr class="success">
                                    <th>Phone</th>
                                    <td><?php echo $row['phone']; ?></td>
                                  </tr>
                                  <tr class="success">
                                    <th>Gender</th>
                                    <td><?php echo $row['gender']; ?></td>
                                  </tr>
                                  <tr class="success">
                                    <th>Date Of Birth</th>
                                    <td><?php echo $row['dob']; ?></td>
                                  </tr>
                                  <tr class="success">
                                    <th>State</th>
                                    <td><?php echo $row['state']; ?></td>
                                  </tr>
                                  <tr class="success">
                                    <th>L.G.A</th>
                                    <td><?php echo $row['lga']; ?></td>
                                  </tr>
                                  <tr class="success">
                                    <th>Home Address</th>
                                    <td><?php echo $row['home_addr']; ?></td>
                                  </tr>
                                  <tr class="success">
                                    <th>Next Of Kin</th>
                                    <td><?php echo $row['nxt_of_kin']; ?></td>
                                  </tr>
                                  <tr class="success">
                                    <th>Next Of Kin Address</th>
                                    <td><?php echo $row['nxt_of_kin_addr']; ?></td>
                                  </tr>

                               </table>
                            </div>


                            <div class="col-md-6">

                                <!-- table display of staff qualification -->
                                <h3>QUALIFICATION</h3>
                                <table class="table table-bordered table-striped">
                                   <tr class="info">
                                     <th>Qualification Details</th>
                                     <td><?php echo $row['q_detail']; ?></td>
                                   </tr>
                                   <tr class="info">
                                     <th>Qualification Date</th>
                                     <td><?php echo $row['q_date']; ?></td>
                                   </tr>
                                </table>
                                 
                                   <hr>
                                 
                                 <!-- table display of service history -->
                                 <h3>HISTORY OF SERVICE</h3>
                                <table class="table table-bordered table-striped">
                                   <tr class="danger">
                                     <th>Appointment Details</th>
                                     <td><?php echo $row['ap_detail']; ?></td>
                                   </tr>
                                   <tr class="danger">
                                     <th>Type Of Appointment</th>
                                     <td><?php echo $row['type_of_ap']; ?></td>
                                   </tr>
                                   <tr class="danger">
                                     <th>Appointment Date</th>
                                     <td><?php echo $row['date_of_ap']; ?></td>
                                   </tr>
                                </table>

                                 <hr>
                                
                                <!-- table display of area of specialisation -->
                                <h3>AREA OF SPECIALISATION</h3>
                                <table class="table table-bordered table-striped">
                                   <tr class="active">
                                     <th>Area Of Specialisation</th>
                                     <td><?php echo $row['area_of_special']; ?></td>
                                   </tr>
                                   <tr class="active">
                                     <th>Member of A Profesional Body</th>
                                     <td><?php echo $row['member_of_pro_body']; ?></td>
                                   </tr>
                                </table>


                            </div>

                        </div>
                      </div>

                  <!-- display of staff info -->         

                  <?php } ?>
                   

                  

       	   	  </div>
       	   </div>
       </section>

    <!--/ section body -->















<?php include('includes/footer.php'); ?>

