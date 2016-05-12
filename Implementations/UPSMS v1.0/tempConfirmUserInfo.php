<!--
 The MIT License (MIT)
 Copyright (c) 2016 UPSMS
 Authors:
   Prototype Front-End Developer: Patricia Regarde
   Front-End and Back-End Developer: Cyan Villarin

 Permission is hereby granted, free of charge, to any person obtaining a copy
 of this software and associated documentation files (the "Software"), to deal
 in the Software without restriction, including without limitation the rights
 to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the Software is
 furnished to do so, subject to the following conditions:
 The above copyright notice and this permission notice shall be included in all
 copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 SOFTWARE.

 This is a course requirement for CS 192 Software Engineering II under the
 supervision of Asst. Prof. Ma. Rowena C. Solamo of the Department of Computer
 Science, College of Engineering, University of the Philippines, Diliman for
 the AY 2015-2016

 Code History:
  May 6, 2016: Marbille Juntado updated Apply for Scholarship functionality .
-->
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
              <li class = "current"><a href = "#">Apply</a></li>
              <li><a href = "tempUserView.php">View Scholarship Status</a></li>
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
              <div>
                <?php
                  $sql = "SELECT * FROM student WHERE studenID = $_SESSION[currentUserID]";
                  $result = mysqli_query($conn, $sql);
                ?>
                <form id="userInfoForm" class="form-horizontal" method="POST" action="backend/apply.php">
                  <header><h3><strong>Edit User Info</strong></h3></header>
                  <div class="form-group">
                    <label class="col-xs-3 control-label">Last Name</label>
                    <div class="col-xs-5">
                      
                      <input align="left" type="text" class="form-control" id="lastName" name="lastName" 
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
                      <input type="text" class="form-control" name="middleName" 
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
                      <input type="date" class="form-control" name="birthDate" 
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
                      <input type="text" class="form-control" name="birthPlace"
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
                      <input type="text" class="form-control" name="presStreetAddr"
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
                      <input type="text" class="form-control" name="presMunBrgy"
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
                      <input type="text" class="form-control" name="presProvCity"
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
                      <input type="text" class="form-control" name="presRegion"
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
                      <input type="text" class="form-control" name="permStreetAddr"
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
                      <input type="text" class="form-control" name="permMunBrgy"
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
                      <input type="text" class="form-control" name="permProvCity"
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
                      <input type="text" class="form-control" name="permRegion"
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
                      <input type="text" class="form-control" name="contactNo"
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
                      <input type="text" class="form-control" name="dept"
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
                      <input type="text" class="form-control" name="upMail" 
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
                  <div class="form-group">
                    <label class="col-xs-3 control-label">Applied for Scholarship</label>
                    <div name="schList" id="schList">
                      <?php 
                        $_SESSION["schoID"] = $_POST["schlist"]; 
                      ?>
                    </div>
                    <div class="col-xs-5">
                      <input type="text" class="form-control" name="schoName"
                      <?php
                        $schoID = $_POST["schlist"];              
                        $to_query = "SELECT name FROM scholarship WHERE scholarshipID = $schoID";
                        $sql_result = mysqli_query($conn, $to_query);
                        $row=mysqli_fetch_row($sql_result);
                        ?>value="<?php echo $row[0]; ?>"
                      />
                    </div>
                  </div>
                  <input type="submit" value="Submit"/>                                    
                </form>
                <?php
                  if(isset($_POST['Submit'])){
                    $upMail = $_POST['upMail'];
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $middleName = $_POST['middleName'];
                    $nationality = $_POST['nationality'];
                    $gender = $_POST['gender'];
                    $birthDate = $_POST['birthDate'];
                    $birthPlace = $_POST['birthPlace'];
                    $presStreetAddr = $_POST['presStreetAddr'];
                    $presMunBrgy = $_POST['presMunBrgy'];
                    $presProvCity = $_POST['presProvCity'];
                    $presRegion = $_POST['presRegion'];
                    $permStreetAddr = $_POST['permStreetAddr'];
                    $permMunBrgy = $_POST['permMunBrgy'];
                    $permProvCity = $_POST['permProvCity'];
                    $permRegion = $_POST['permRegion'];
                    $contactNo = $_POST['contactNo'];
                    $dept = $_POST['dept'];
                    $college = $_POST['college'];
                    $sql_update = "UPDATE upMail, firstName, lastName, middleName, nationality, gender, birthDate, birthPlace, presStreetAddr, presMunBrgy, presProvCity, presRegion, permStreetAddr, permMunBrgy, permProvCity, permRegion, contactNo, dept, college FROM student WHERE studentID = $_SESSION[currentUserID]";
                    mysqli_query($conn, $sql_update);
                    mysqli_close($conn);
                  }

                ?>
                
              </div>

              
              <?php 
               /*
                $schoID = $_POST["schlist"];              
                $to_query = "SELECT name FROM scholarship WHERE scholarshipID = $schoID";
                $sql_result = mysqli_query($conn, $to_query);
                $row=mysqli_fetch_row($sql_result);
                echo $row[0];
              */
              ?>
        
            </section>
        </article>

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