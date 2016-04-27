<?php
/* Start a session so that other files can access these variables */
  session_start();
  $_SESSION['selectedAppID'] = 0;
  $_SESSION['currentUserName'] = NULL;
  $_SESSION['appList'] = NULL;

  /* Connect to database */
    $conn = new mysqli("localhost","root","","cs192upsms");
  /* Checks Connection */
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

$getName = "select S.firstName, S.middleName, S.lastName from student S where S.studentID = '".$_SESSION['currentUserID']."'";

$nameResult = mysqli_query($conn,$getName);
// Get every row of the table formed from the query
while($rows9=mysqli_fetch_row($nameResult))
{
foreach ($rows9 as $key => $value)
	{
	 	if($key == 0)
		{
			$_SESSION['currentUserName'] = $value;
		}

		
		if($key == 1)
		{
			$_SESSION['currentUserName'] = $_SESSION['currentUserName'] . " " . $value;
		}

		
	    if($key == 2)
	    {                                	
			$_SESSION['currentUserName'] = $_SESSION['currentUserName'] . ". " . $value;
		}
	}
}
?>

                                

<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
      <title>Home</title>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="">
      <meta name="author" content="">

  
      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom CSS -->
      <link href="css/main.css" rel="stylesheet">

  </head>

  <body class = "no-sidebar">
    <div id = "page-wrapper">

      <!-- Header -->
        <header id = "header">
          <h1 id = "logo"><a href = "tempUserHome.php"><span>UP</span>SMS</a></h1>
          <nav id = "nav">
            <ul>
              <li><a href = "tempUserHome.php">Home</a></li>
              <li><a href = "tempUserProfile.php">User Profile</a></li>
              <li class = "current"><a href = "#">Apply for Application</a></li>
              <li><a href = "tempUserView.php">View Application Status</a></li>
              <li><?php echo $_SESSION['currentUserName']. " (ID:" . $_SESSION['currentUserID'] . ")"?></li>
              <li><a href = "backend/logout.php" class = "button special">Logout</a></li>
            </ul>
          </nav>
        </header>


			<!-- Main -->
				<article id="main">

					<header class="special container">
						<span class="icon fa-mobile"></span>
					</header>

					<!-- One -->
						<section class="wrapper style4 container">

							<!-- Content -->
								<div class="content">
									<section>	<!-- start -->

                  <h1>Apply for Scholarship</h1>
                          <p>Please choose the scholarship you want to apply for from the dropdown menu. Read the description of the scholarship. Download the form and follow all instructions given. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>
                            <div class = "col-md-4">
                              <form style="width:500px" method="POST" action="backend/apply.php">
                                <div class = "form-group">
                                  <select name = "schlist" id = "schlist" class = "form-control">
                                    <?php
                                      $to_query = "SELECT * FROM scholarship ORDER by name";
                                      $sql_result = mysqli_query($conn, $to_query);
                                      while($row=mysqli_fetch_row($sql_result)){
                                        ?>
                                        <option value = "<?php echo $row[0]; ?>">
                                          <a href = "#" data-toggle="modal" data-target="#<?php echo $row[0]; ?>" class="btn btn-lg btn-success">
                                            <?php echo $row[1]; ?>
                  
                                          </a>

                                        </option>

                                        </form>
                               
                                        <?php
                                      }
                                    ?>

                                  </select>
                                </div>
                                <br>
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Scholarship Name</th>
                                      <th>Description</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    <?php
                                      $to_query = "SELECT * FROM scholarship ORDER by name";
                                      $sql_result = mysqli_query($conn, $to_query);
                                      while($row=mysqli_fetch_row($sql_result)){
                                        ?>
                                        <tr>
                                          <td><?php echo $row[1]; ?></td>
                                          <td><?php echo $row[6]; ?></td>
                                        </tr>
                                        <?php
                                      }?>
                                  </tbody>
                                </table>

                                <div>
                                  <script src="js/jquery.min.js"></script>
                                  <script src="js/bootstrap.min.js"></script>
                                  <!-- Trigger the modal with a button -->
                                  <button type="button" class="btn btn-default btn-lg" id="applyBtn">Apply</button>
                              
                                  <script type="text/javascript">
                                      $(document).ready(function(){
                                        $("#applyBtn").click(function(){
                                          $("#applyModal").modal();
                                          });
                                      });
                                      </script>

                                  <!-- Modal -->
                                  <div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="useInfModal">Verify User Info</h4>
                                        </div>
                                        <div class="modal-body form-horizontal" role="document" >
                                          <form id="userInfoForm" method="post" style="display: none;" action="backend/userdata.php">
                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Last Name</label>
                                              <div class="col-xs-5">
                                                
                                                <input align="left" type="text" class="form-control" name="lastName" 
                                                <?php 
                                                  $queryInfo = "SELECT lastName FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>"

                                                      />
                                                      <?php
                                                    }
                                                  }

                                                ?>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">First Name</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="firstName" 
                                                <?php 
                                                  $queryInfo = "SELECT firstName FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>  

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">M.I</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="mi" 
                                                <?php 
                                                  $queryInfo = "SELECT middleName FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>       

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Nationality</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="nationality" 
                                                <?php 
                                                  $queryInfo = "SELECT nationality FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>    

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Gender</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="gender"
                                                <?php 
                                                  $queryInfo = "SELECT gender FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>   

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Birthdate</label>
                                              <div class="col-xs-5">
                                                <input type="date" class="form-control" name="birthdate" 
                                                <?php 
                                                  $queryInfo = "SELECT birthDate FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>  

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Birthplace</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="birthplace"
                                                <?php 
                                                  $queryInfo = "SELECT birthPlace FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>     

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Present Street Address</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="prStrAdd"
                                                <?php 
                                                  $queryInfo = "SELECT presStreetAddr FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>     

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Present Municipality</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="prMun"
                                                <?php 
                                                  $queryInfo = "SELECT presMunBrgy FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>     

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Present Province/City</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="prProvCity"
                                                <?php 
                                                  $queryInfo = "SELECT presProvCity FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>   

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Present Region</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="prReg"
                                                <?php 
                                                  $queryInfo = "SELECT presRegion FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>   

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Permanent Street Address</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="peStrAdd"
                                                <?php 
                                                  $queryInfo = "SELECT permStreetAddr FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>   

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Permanent Municipality</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="peMun"
                                                <?php 
                                                  $queryInfo = "SELECT permMunBrgy FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>       

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Permanent Province/City</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="peProvCity"
                                                <?php 
                                                  $queryInfo = "SELECT permProvCity FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>     

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Permanent Region</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="peReg"
                                                <?php 
                                                  $queryInfo = "SELECT permRegion FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>     

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Contact</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="contact"
                                                <?php 
                                                  $queryInfo = "SELECT contactNo FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>         

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">Department</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="department"
                                                <?php 
                                                  $queryInfo = "SELECT dept FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>     

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">College</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="college" 
                                                <?php 
                                                  $queryInfo = "SELECT college FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                                
                                              </div>
                                            </div>    

                                            <div class="form-group">
                                              <label class="col-xs-3 control-label">UP Mail</label>
                                              <div class="col-xs-5">
                                                <input type="text" class="form-control" name="upmail" 
                                                <?php 
                                                  $queryInfo = "SELECT upMail FROM student where studentID = $_SESSION[currentUserID]";
                                                  $qInfoResult = mysqli_query($conn, $queryInfo);
                                                  while($rows=mysqli_fetch_row($qInfoResult)){
                                                    foreach($rows as $key => $value){
                                                      $value = trim($value);
                                                      ?>
                                                      value="<?php
                                                      echo trim($value);?>" />
                                                      <?php
                                                    }
                                                  }
                                                ?>                                              
                                              </div>
                                            </div> 
                                          </form>


                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                              </form>
                            </div>

									</section> <!-- end -->
								</div>

						</section>

					<!-- Two -->
						<section class="wrapper style1 container special">
							<div class="row">
								<div class="4u 12u(narrower)">

									<section>
										<header>
											<h3>This is Something</h3>
										</header>
										<p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu commodo suscipit dolor nec nibh. Proin a ullamcorper elit, et sagittis turpis. Integer ut fermentum.</p>
										<footer>
											<ul class="buttons">
												<li><a href="#" class="button small">Learn More</a></li>
											</ul>
										</footer>
									</section>

								</div>
								<div class="4u 12u(narrower)">

									<section>
										<header>
											<h3>Also Something</h3>
										</header>
										<p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu commodo suscipit dolor nec nibh. Proin a ullamcorper elit, et sagittis turpis. Integer ut fermentum.</p>
										<footer>
											<ul class="buttons">
												<li><a href="#" class="button small">Learn More</a></li>
											</ul>
										</footer>
									</section>

								</div>
								<div class="4u 12u(narrower)">

									<section>
										<header>
											<h3>Probably Something</h3>
										</header>
										<p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu commodo suscipit dolor nec nibh. Proin a ullamcorper elit, et sagittis turpis. Integer ut fermentum.</p>
										<footer>
											<ul class="buttons">
												<li><a href="#" class="button small">Learn More</a></li>
											</ul>
										</footer>
									</section>

								</div>
							</div>
						</section>

				</article>

			<!-- Footer -->
				<footer id="footer">

					<ul class="icons">
						<li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
						<li><a href="#" class="icon circle fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon circle fa-dribbble"><span class="label">Dribbble</span></a></li>
					</ul>

					<ul class="copyright">
						<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

				</footer>

		</div>

		<!-- Scripts -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery.dropotron.min.js"></script>
      <script src="js/jquery.scrolly.min.js"></script>
      <script src="js/jquery.scrollgress.min.js"></script>
      <script src="js/skel.min.js"></script>
      <script src="js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="js/main.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function(){
      $("#applyBtn").click(function(){
        $("#applyModal").modal();
        });
    });
    </script>

	</body>
</html>