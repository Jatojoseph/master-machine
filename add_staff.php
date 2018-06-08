


<!-- including the nesessary files  the database connection and the page header  -->
<?php include('connect.php'); ?>
<?php include('includes/header.php');?>


<?php 


/** 
 *@ this blocks of code process the staff register form
 *
 *
 **/
    

   //checking if the inputs are set 
  if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['gender']) && isset($_POST['dob']) && isset($_POST['state']) && isset($_POST['lga']) && isset($_POST['addr']) && isset($_POST['nxt_kin']) && isset($_POST['nxt_kin_addr']) && isset($_POST['area_of_special']) && isset($_POST['member_pro_body']))
  {    

      //checking if the inputs  are empty 
       if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) ||empty($_POST['gender']) || empty($_POST['dob']) || empty($_POST['state']) || empty($_POST['lga']) || empty($_POST['addr'])|| empty($_POST['nxt_kin']) || empty($_POST['nxt_kin_addr']))
       {
        
        //setting error message
        $msg = '<div class="alert alert-danger" role="alert">All fields are required</div>';
       }
       else
       {



             //get the inputs into there respective variablles
             $name             = $_POST['name'];
             $email            = $_POST['email'];
             $phone            = $_POST['phone'];
             $gender           = $_POST['gender'];
             $dob              = $_POST['dob'];
             $state            = $_POST['state'];
             $lga              = $_POST['lga'];
             $addr             = $_POST['addr'];
             $nxt_kin          = $_POST['nxt_kin'];
             $nxt_kin_addr     = $_POST['nxt_kin_addr'];
             $area_of_special  = $_POST['area_of_special'];
             $member_pro_body  = $_POST['member_pro_body'];


             //make the query to insert the data into databse
             $q = "INSERT INTO staffs(name,dob,gender,home_addr,lga,state,phone,email,nxt_of_kin,nxt_of_kin_addr,area_of_special, member_of_pro_body)VALUES('$name', '$dob', '$gender', '$addr', '$lga', '$state', '$phone', '$email', '$nxt_kin', '$nxt_kin_addr', '$area_of_special', '$member_pro_body')";

             $result = mysqli_query($dbcon, $q);
             if($result)
             {
                 //if succesfull inserting the the record, redirect the user to qualification page
                  $last_id = mysqli_insert_id($dbcon);
                  header('Location: q.php?staff_id='.$last_id);
                  exit();
             }
             else
             {   
                //setting error display message
                echo 'error inserting data ' . mysqli_error($dbcon);
             }
       }

  }
 













?>







    <!-- section body -->
    
       <section id="into-body">
       	   <div class="container">
       	   	  <div class="row">

                

                   
                   <!-- form  to  add  staff -->
                     <div class="col-md-12">


                          <div class="panel panel-primary">
                            <div class="panel-heading">
                              <h2 class="panel-title">Add Staff Bio Data</h2>
                            </div>
                          <div class="panel-body">
                            
                              <?php if(!empty($msg)) :?> 
                               <?php echo $msg; ?>
                              <?php endif; ?>

                            <form action="add_staff.php" method="POST" class="form-group">  

                            <div class="row">
                              <div class="col-md-4">
                                 <label>Staff Name</label>
                                 <input class="form-control" type="text" name="name" placeholder="Name">
                              </div>
                              <div class="col-md-4">
                                 <label>Email</label>
                                 <input class="form-control" type="email" name="email" placeholder="Email">
                              </div>
                              <div class="col-md-4">
                                 <label>Phone</label>
                                 <input class="form-control" type="text" name="phone" placeholder="Phone Number">
                              </div>
                            </div>
                                
                              <br>  

                             <div class="row">
                              <div class="col-md-4">
                                 <label>Gender</label>
                                 <select class="form-control" name="gender">
                                     <option value=" ">Select Gender</option>
                                     <option value="Male">Male</option>
                                     <option value="Female">Female</option>
                                 </select>
                              </div>
                              <div class="col-md-4">
                                 <label>Date Of Birth</label>
                                 <input class="form-control" type="text" name="dob" placeholder="dd-mm-yyyy">
                              </div>
                              <div class="col-md-4">
                                 <label>State</label>
                                 <input class="form-control" type="text" name="state" placeholder="State">
                              </div>
                            </div>

                            
                            <br>

                            <div class="row">
                              <div class="col-md-3">
                                 <label>L.G.A</label>
                                 <input class="form-control" type="text" name="lga" placeholder="L.G.A">
                              </div>
                              <div class="col-md-3">
                                 <label>Home Address</label>
                                 <input class="form-control" type="text" name="addr" placeholder="Home Address">
                              </div>
                              <div class="col-md-3">
                                 <label>Next Of Kin</label>
                                 <input class="form-control" type="text" name="nxt_kin" placeholder="Next Of Kin">
                              </div>
                              <div class="col-md-3">
                                 <label>Next Of Kin Address</label>
                                 <input class="form-control" type="text" name="nxt_kin_addr" placeholder="Next Of Kin Address">
                              </div>
                            </div>

                            <br>

                             <div class="row">
                              <div class="col-md-6">
                                 <label>Area Of Specialisation</label>
                                 <textarea class="form-control" name="area_of_special" placeholder="This field is optional"></textarea>
                              </div>
                              <div class="col-md-6">
                                 <label>Member Of A Professional Body</label>
                                <textarea class="form-control" name="member_pro_body" placeholder="This field is optional"></textarea>
                              </div>
                              
                            </div>

                            <br>

                             <div class="row">
                              <div class="col-md-4"></div>
                              <div class="col-md-4"></div>

                              <div class="col-md-4">
                                 <input type="submit" class="btn btn-success pull-right" value="+ Save Data" /><
                              </div>

                            </div>

                            
                       </form><!-- end of form -->
 
                            

                          </div><!-- end of panel body -->
                        </div><!-- end of panel default -->
                          
                        

                     </div>
                   <!-- form to add  staff -->           
                   

                  

       	   	  </div>
       	   </div>
       </section>

    <!--/ section body -->















<?php include('includes/footer.php'); ?>

