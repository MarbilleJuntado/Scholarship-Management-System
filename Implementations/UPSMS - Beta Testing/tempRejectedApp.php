
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
          <h1 id = "logo"><a href = "#"><span>UP</span>SMS</a></h1>
          <nav id = "nav">
            <ul>
              <li class = "current"><a href = "#">Home</a></li>
              <li class = "submenu">
                <a href = "#">Applications</a>
                <ul>
                  <li><a href = "tempSigRelease.php">Signatory Release</a></li>
                  <li><a href = "tempAcceptedApp.php">Accepted Students</a></li>
                  <li><a href = "tempRejectedApp.php">Rejected Students</a></li>
                </ul>
              </li>
              <li><a href = "tempScholarship.php">Scholarships</a></li>
              <li class = "submenu">
                <a href = "#">Users</a>
                <ul>
                  <li><a href = "tempAdStudent.php">Student</a></li>
                  <li><a href = "tempAdSig.php">Signatory</a></li>
                  <li><a href = "tempAdAdmin.php">Admin</a></li>
                </ul>
              </li>
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
									<section>
										
										<header>
											<h3><strong>Release for Rejected Students</h3></strong>
										</header>
                         
				                        <table class = "table table-hover table-condensed">
				                              <thead>
				                                <tr>

				                                  <th class = "col-md-1"><strong>Application Number</strong></th>
				                                  <th class = "col-md-1"><strong>Applicant</strong></th>
				                                  <th class = "col-md-1 text-center"><strong>Scholarship</strong></th>
				                                  <th class = "col-md-1 text-center"><strong>Status</strong></th>
				                                  
				                                </tr>
				                              </thead>
				                              <tbody>


				                            <?php
				                              /* Connect to database */
				                              $conn = new mysqli("localhost","root","","cs192upsms");
				                              /* Checks Connection */
				                              if ($conn->connect_error) {
				                                die("Connection failed: " . $conn->connect_error);
				                              }

				                              $to_query = "select A.appID, S.lastName, S.firstName, S.middleName, R.name from rejectedapps A join application P on A.appID = P.applicationID join student S on S.studentID = P.studentID join scholarship R on R.scholarshipID = P.scholarshipID";
				                              $sql_result = mysqli_query($conn,$to_query);
				                              while($rows=mysqli_fetch_row($sql_result))
				                              {
				                                $appID = 0;
				                                foreach ($rows as $key => $value)
				                                    {
				                                      if ($key == 0)
				                                      {
				                                        $appID = $value;
				                                        ?><tr><td><?php echo $appID;?></td><?php
				                                      }
				                                      // Last Name
				                                          if($key == 1)
				                                          {
				                                            $name = $value;
				                                          }

				                                          // First Name
				                                          if($key == 2)
				                                          {
				                                             $name = $name . ", " . $value;
				                                          }

				                                          // Middle Name and then display to UI
				                                          if($key == 3)
				                                          {
				                                              $name = $name . " " . $value;
				                            ?>
				                                            <td><?php echo $name;?></td>
				                            <?php
				                                          }
				                                      if ($key == 4)
				                                      {
				                                        ?><td class = 'text-center'><?php echo $value;?></td><?php
				                                      }
				                                    }


				                                    $to_query2 = "select R.appID, R.status from released R where R.appID = '".$appID."'";
				                                    $sql_result2 = mysqli_query($conn,$to_query2);
				                                    if (mysqli_num_rows($sql_result2) == 0)
				                                    {?>
				                                        <td class = 'text-center'>
				                                        <form action="backend/release.php" method="get">
				                                          <input type="hidden" name="status" value="0">
				                                            <button type="submit" name="notify" value="<?php echo $appID?>" onclick=saveAppID() class="btn btn-info">Notify</button>
				                                          </form>
				                                          </td>
				                                    <?php
				                                    }
				                                    else{
				                                      ?> <td class = 'text-center'><button type="submit" class="btn btn-success" disabled>Notified</button></td>
				                                      <?php
				                                    }
				                                    

				                              }
				                              mysqli_close($conn);
				                              ?>

				                              </tbody>
				                          </table>






									</section>
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

