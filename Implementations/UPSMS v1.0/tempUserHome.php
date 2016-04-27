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
  Decemeber 10, 2015: Patricia Regarde finished Front End of Protoype for sig.php
  February 10, 2016: Cyan Villarin added the feature of the sig.php being able to read from cs192upsms.sql database.
                     The system is also able to display the contents of the application table from the UI.
  February 11, 2016: Cyan Villarin added the feature of the system that allows the signatory account to accept/reject an
                     application. If accepted, the system will write 1 to status field of the sigstatus table. If rejected,
                     write 0 instead.
  February 18, 2016: Cyan Villarin implemented the filtering of applications. The UI will now display the only applications
                      that has the sigID included in the scholarship's sigOrder. Order restriction not yet implemented.
  February 28, 2016: Cyan Villarin started working on the forwarding of application. Order of signatories has been
                     considered.
  March 2, 2016: Cyan Villarin finally implemented Signatory Order, returning pending.
  March 31, 2016: Cyan Villarin started working on returning and rejection of application on signatory account's side.
  April 26, 2016: Cyan Villarin updated the Front-End of the signatory account page.

  File Creation Date: December 11, 2015
  Development Group: UPSMS (Marbille Juntado, Patricia Regarde, Cyan Villarin)
  Client Group: Mrs. Rowena Solamo, Dr. Jaime Caro
  Purpose of this software: Our main goal is to implement a system that allows the monitoring of scholarship system within UP System.
-->


<?php
/* Start a session so that other files can access these variables */
  session_start();
  $_SESSION['selectedAppID'] = 0;

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

<!DOCTYPE html>

<html lang="en">

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

  <body class = "index">
    <div id = "page-wrapper">

      <!-- Header -->
        <header id = "header" class = "alt">
          <h1 id = "logo"><a href = "#"><span>UP</span>SMS</a></h1>
          <nav id = "nav">
            <ul>
              <li class = "current"><a href = "#">Home</a></li>
              <li><a href = "tempUserProfile.php">User Profile</a></li>
              <li><a href = "tempUserApply.php">Apply for Application</a></li>
              <li><a href = "tempUserView.php">View Application Status</a></li>
              <li><?php echo $_SESSION['currentUserName']. " (ID:" . $_SESSION['currentUserID'] . ")"?></li>
              <li><a href = "backend/logout.php" class = "button special">Logout</a></li>
            </ul>
          </nav>
        </header>

      <!-- Banner -->
        <section id = "banner">
          <div class = "inner">
            <header>
              <h2>UPSMS</h2>
            </header>
            <p>Scholarship Management System<p>
            <footer>
              <ul class = "buttons vertical">
                <li><a href = "#main" class = "button fit scrolly">About</a></li>
              </ul>
            </footer>
          </div>
        </section>

        <article id = "main">
          <header class = "special container">
            <span class = "icon fa-bar-chart-o"></span>
            <h2>Some text here</h2>
            <p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu comteger ut <br>
            fermentum lorem. Lorem ipsum dolor sit amet. Sed tristique purus vitae volutpat ultrices. <br>
            eu elit eget commodo. Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget <br>
            arcu commodo. </p>

          </header>

          <section class="wrapper style2 container special-alt">
            <div class="row 50%">
              <div class="8u 12u(narrower)">

                <header>
                  <h2>TEXT TEXT TEXT</h2>
                </header>
                <p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu comteger ut fermentum lorem. Lorem ipsum dolor sit amet. Sed tristique purus vitae volutpat ultrices. eu elit eget commodo. Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu commodo.</p>
                <footer>
                  <ul class="buttons">
                    <li><a href="#" class="button">Find Out More</a></li>
                  </ul>
                </footer>

              </div>
            </div>
          </section>

          <section class="wrapper style3 container special">

            <header class="major">
              <h2>Next look at this <strong>cool stuff</strong></h2>
            </header>

            <div class="row">
              <div class="6u 12u(narrower)">

                <section>
                  <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
                  <header>
                    <h3>A Really Fast Train</h3>
                  </header>
                  <p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
                </section>

              </div>

              <div class="6u 12u(narrower)">

                <section>
                  <a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
                  <header>
                    <h3>An Airport Terminal</h3>
                  </header>
                  <p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
                </section>

              </div>
            </div>
                
            <div class="row">
              <div class="6u 12u(narrower)">

                <section>
                  <a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
                  <header>
                    <h3>Hyperspace Travel</h3>
                  </header>
                  <p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
                </section>

              </div>
              
              <div class="6u 12u(narrower)">

                <section>
                  <a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
                  <header>
                    <h3>And Another Train</h3>
                  </header>
                  <p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
                </section>

              </div>
            </div>

            <footer class="major">
              <ul class="buttons">
                <li><a href="#" class="button">See More</a></li>
              </ul>
            </footer>

          </section>


        </article>

        <section id="cta">

          <header>
            <h2>Ready to do <strong>something</strong>?</h2>
            <p>Proin a ullamcorper elit, et sagittis turpis integer ut fermentum.</p>
          </header>
          <footer>
            <ul class="buttons">
              <li><a href="#" class="button special">TEXT</a></li>
              <li><a href="#" class="button">TEXT</a></li>
            </ul>
          </footer>

        </section>

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
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery.dropotron.min.js"></script>
      <script src="js/jquery.scrolly.min.js"></script>
      <script src="js/jquery.scrollgress.min.js"></script>
      <script src="js/skel.min.js"></script>
      <script src="js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="js/main.js"></script>

  </body>
</html>