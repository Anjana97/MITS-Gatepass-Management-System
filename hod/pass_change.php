
<?php
$no1=0;
session_start();
if (empty($_SESSION['regno'])) {
    header("location:../index.html");
    exit();
} 
include_once '../db/dboperations.php';
include_once '../sendmail.php';
 $objUser = new User();
  $res=$objUser->user_data($_SESSION['regno'],"HOD");
 $details=mysqli_fetch_assoc($res);



 if(isset($_POST['submit']))
 {
	 $tmp1=$objUser->get_pass($_SESSION['regno']);
	 $pass_details=mysqli_fetch_assoc($tmp1);
	 $current_pass=$pass_details['password'];
	//  echo "<script>alert($current_pass); </script>";
	 if(strcmp($_POST['current_pass'],$current_pass)!=0)
	 {
		 
		  echo '<script>alert("Invalid Current Password!!!!"); </script>';
	 }
	else 
	 {
		$det=$objUser->update_pass($_SESSION['regno'],$_POST['new_pass']);
$subject="PASSWORD CHANGED";
$ToName=$details['name'];
$ToEmail=$details['email'];
$message='<html> <body><br/>Hello '.$ToName.'<br/>
         Your Password has been Changed.
		Login to : <a href="https://iamaswin.me/mitsekurav2">MITSEKURA</a><br/> <br/>
		
		<br/><br/>
		
		</body></html>';
sendmail_welcome($subject,$ToName,$ToEmail,$message);
 echo '<script>alert("Password Changed "); </script>';
		 
	 }
	

 }
?>

	

<!DOCTYPE html>
<html class=" ">
    <head>
        
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>MITSEKURA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

    




        <!-- CORE CSS FRAMEWORK - START -->
        <link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
	 <link href="../assets/plugins/jquery-ui/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen"/>
	 <link href="../assets/plugins/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" media="screen"/>
<!--	 <link href="../assets/plugins/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen"/> -->
	 <link href="../assets/plugins/timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" media="screen"/>
	 <link href="../assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen"/>
<!--	 <link href="../assets/plugins/tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" media="screen"/> -->
	 <link href="../assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<!--	 <link href="../assets/plugins/typeahead/css/typeahead.css" rel="stylesheet" type="text/css" media="screen"/> -->
      <link href="../assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>      


		<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
         <link href="../assets/plugins/responsive-tables/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" "><!-- START TOPBAR -->
        <div class='page-topbar '>
            <div class='logo-area'>

            </div>
            <div class='quick-area'>
                <div class='pull-left'>
                    <ul class="info-menu left-links list-inline list-unstyled">
                        <li class="sidebar-toggle-wrap">
                            <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                        <li class="message-toggle-wrapper">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <i class="fa fa-envelope"></i>
                                <span class="badge badge-primary">7</span>
                            </a>
                            <ul class="dropdown-menu messages animated fadeIn">

                                <li class="list">

                                    <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                        <li class="unread status-available">
                                            <a href="javascript:;">
                                                <div class="user-img">
                                                    <img src="imglink" alt="" class="img-circle img-inline">
                                                </div>
                                                <div>
                                                    <span class="name">
                                                        <strong>Faculty Name</strong>
                                                    
                                                    </span>
                                                    <span class="desc small">
                                                        message content
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                   

                                    </ul>

                                </li>

                               
                            </ul>

                        </li>
                        <li class="notify-toggle-wrapper">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <i class="fa fa-bell"></i>
                                <span class="badge badge-orange">3</span>
                            </a>
                            
                        </li>
                        <li class="hidden-sm hidden-xs searchform">
                            
                        </li>
                    </ul>
                </div>		
                <div class='pull-right'>
                    <ul class="info-menu right-links list-inline list-unstyled">
                        <li class="profile">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <img src="../images/hod/<?php echo $details['photo']; ?>" alt="" class="img-circle img-inline">
                                <span><?php echo $details['name']; ?><i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul class="dropdown-menu profile animated fadeIn">
                              
                                <li>
                                    <a href="#profile">
                                        <i class="fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>
                                
                                <li class="last">
                                    <a href="../logout.php">
                                        <i class="fa fa-lock"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                    </ul>			
                </div>		
            </div>

        </div>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <div class="page-sidebar ">

                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-5 col-sm-5 col-xs-5">
                            <a href="">
                                <img src="../images/hod/<?php echo $details['photo']; ?>" alt="" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-7 col-sm-7 col-xs-7">

                            <h2>
                                <a href=""><?php echo $details['name']; ?></a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h2>

                            <p class="profile-title"><?php echo "HOD ".$details['branch']; ?></p>

                        </div>

                    </div>
                    <!-- USER INFO - END -->



                    <ul class='wraplist'>	


                        <li class=""> 
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Gate Pass Requests</span>
                            </a>
                        </li>
						
                      <li class=""> 
                            <a href="activity.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Activity Log</span>
                            </a>
                        </li>
						
						<li class=""> 
                            <a href="gatepass_log.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Gate Pass History</span>
                            </a>
                        </li>
						
						
						<li class=""> 
                            <a href="pass_change.php">
                                <i class="fa fa-dashboard"></i>
                                <span style="font-size:1.5em;" class="title">Change Password</span>
                            </a>
                        </li>
             
             

                    </ul>

                </div>
                <!-- MAIN MENU - END -->



               



            </div>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            

                          

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">CHANGE PASSWORD</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">  
							
                             
					         <div class="row">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
								 <div class="row">
                                    <form action ="pass_change.php" method="post" enctype="multipart/form-data">
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">

										<div class="form-group">
                                                <label class="form-label" for="field-1">Current Password</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="password" value="" name="current_pass" class="form-control" id="field-1" required>
                                                </div>
                                            </div>
										
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">New Password</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="password" name="new_pass" value="" class="form-control" id="new_pass" required>
                                                </div>
                                            </div>
											
											 <div class="form-group">
                                                <label class="form-label" for="field-1">Confirm Password</label>
                                                <span id="message" class="desc"></span>
                                                <div class="controls">
                                                    <input type="password" name="conf_pass" value="" class="form-control" id="conf_pass" required>
                                                </div>
                                            </div>


                                            

                                          
                     
                                            

                                        </div>

                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                            <div class="text-left">
                                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                             <!--   <button type="button" class="btn">Cancel</button> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
								 
								
									
									</div>	
									</div>
									
							
                            </div>
                        </section></div>



                </section>
            </section>
            <!-- END CONTENT -->
     
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="../assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="../assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="../assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
		        <script src="../assets/plugins/autosize/autosize.min.js" type="text/javascript"></script><script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
                <script src="../assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> 
				<script src="../assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script>
				<script src="../assets/plugins/daterangepicker/js/moment.min.js" type="text/javascript"></script> 
				<script src="../assets/plugins/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>
				<script src="../assets/plugins/timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script> 
				<script src="../assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
				<script src="../assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" type="text/javascript"></script>
			<!--	<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
				<script src="assets/plugins/tagsinput/js/bootstrap-tagsinput.min.js" type="text/javascript"></script>
				<script src="../assets/plugins/select2/select2.min.js" type="text/javascript"></script>  -->
			<!--	<script src="assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script> -->
			<!--	<script src="assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script> -->
			<!--	<script src="assets/plugins/multi-select/js/jquery.multi-select.js" type="text/javascript"></script> -->
		<!--		<script src="assets/plugins/multi-select/js/jquery.quicksearch.js" type="text/javascript"></script> --><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
                <script src="../assets/plugins/responsive-tables/js/rwd-table.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="../assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 




  
         <script>
		 
		 $('#conf_pass').on('keyup', function () {
  if ($('#new_pass').val() == $('#conf_pass').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
		 
		 
		 
		 </script>










        <!-- General section box modal start -->
        <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Section Settings</h4>
                    </div>
                    <div class="modal-body">

                        Body goes here...

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="button">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    </body>
</html>



