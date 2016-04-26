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

$getName = "select S.firstName, S.middleName, S.lastName from signatory S where S.sigID = '".$_SESSION['currentUserID']."'";

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
          <h1 id = "logo"><a href = "tempSigHome.php"><span>UP</span>SMS</a></h1>
          <nav id = "nav">
            <ul>
              <li><a href = "tempSigHome.php">Home</a></li>
              <li class = "current"><a href = "#">Pending Applications</a></li>
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
									<section>	
										<header>
											<h2> Pending Applications </h2> <h3> 
										</header>

										<header>
											<h3><b>For Review</b></h3>
										</header>

<table class = "table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th class = "col-md-1">Number</th>
                                  <th class = "col-md-2">Applicant</th>
                                  <th class = "col-md-2">Scholarship</th>
                                  <th class = "col-md-2">Received on</th>
                                  	
                          
                                  <th class = "col-md-1"></th>
                                  <th class = "col-md-1"></th>
                                  <th class = "col-md-1"></th>
                                </tr>
                              </thead>
                              <tbody>

                            <?php
                                $to_query = "select S.signatoryOrder, A.status, A.applicationID, N.lastName, N.firstName, N.middleName, A.scholarshipID, S.name, A.appdate, N.studentID from student N join application A on N.studentID = A.studentID join scholarship S on S.scholarshipID = A.scholarshipID order by N.lastName";

                                /*

                                S.signatoryOrder = 0
                                A.status = 1
                                A.applicationID = 2

                                N.lastName = 3
                                N.firstName = 4
                                N.middleName = 5
                                
                                A.scholarshipID = 6
                                S.name = 7
                                S.appDate = 8
                                N.studentID = 9

                                */

                                $sql_result = mysqli_query($conn,$to_query);

                                // Get every row of the table formed from the query
                                while($rows=mysqli_fetch_row($sql_result))
                                {
                                	// For every row, these variables are reset to 0
                                	$presentInSigOrder = 0;
                                  $doShow = 0;
                                  $isCurrentSig = 0;
                                  $isAlreadyAccepted = 0;
                                  $isAlreadyRejected = 0;
                                  $isReturned = 0;
                                  $isPrevSig = 0;
                                  $isLastSig = 0;
                                  $prev_sigID = 0;
                                 	$status = 0;
                                 	$appID = 0;
                                  $isNULL = 0;

                                 	
                                 	// Traverses through the columns of a row
                                  	foreach ($rows as $key => $value)
                                  	{
                                   		if ($key == 0)
                                   		{
                                   			// Gets the first column which is the sigOrder, then stores it in a list
		                                    $str = $value;
		                                    $delimiter = ',';
		                                    $order = preg_split("/$delimiter/", $str);
		                                    $numOfSigs = count($order);                   

		                                    // Traverses through the sigOrder list
                                     		for ($i=0; $i < $numOfSigs; $i++)
                                     		{
                                     			// Checks if the currently signed in sigUser is included in the sigOrder
                                       			if ($order[$i] == $_SESSION['currentUserID'])
                                       			{
                                              // If we determine the logged sigID in the SigOrder, find it's prevID.
                                              if($i != 0)
                                              {
                                                // If the sig is NOT the 1st, the prevID is the previous sigID in the order
                                                $prev_sigID = $order[$i - 1];
                                              }
                                              else
                                              {
                                                // Else if it is the 1st, the prevID is the admin (denoted by -1)
                                                $prev_sigID = -1;
                                              }
                                              
                                         			$presentInSigOrder = 1;
                                        			break;
                                      			}
                                     		}
                                   		}	

                                   		if($_SESSION['currentUserID'] == $order[$numOfSigs - 1])
                                   		{
                                   			$isLastSig = 1;
                                   		}

                                   	   // Checks if the application is included in the sigOrder
	                                   if ($presentInSigOrder == 1)
	                                   {
	                                   		// If it is, check if it verified by the admin by checking if key.value == 1 (if A.status == 1)
                									   		if($key == 1)
                									   		{
	                                       		if($value == 1)
	                                       		{
	                                       			// If the status from the table is 1, set $status = 1
	                                         		$status = 1;
	                                       		}
	                                     	}

                                        // Application ID
                                        if($key == 2)
                                        {
                                            $appID = $value;

                                            // In here, so it will be run only once
                                            $query2 = "select Z.sigID, Z.applicationID, Z.sStatus from sigstatus Z where applicationID = '".$appID."'";

                                            

                                            $sql_result2 = mysqli_query($conn, $query2);

                                            if (is_null($sql_result2))
                                            {
                                              
                                              $isNULL = 1; // Curr Sig NULL is TRUE
                                            }

                                            while($rows2 = mysqli_fetch_row($sql_result2))
                                            {
                                              
                                                foreach ($rows2 as $key2 => $value2)
                                                {
                                                    if($key2 == 0)
                                                    {
                                                      if ($value2 == $_SESSION['currentUserID'])
                                                      {
                                                          $isCurrentSig = 1;
                                                      }

                                                      if ($value2 == $prev_sigID)
                                                      {
                                                          $isPrevSig = 1;
                                                      }
                                                    }

                                                    if ($key2 == 1) 
                                                    {
                                                      // pass
                                                    }

                                                   // If status = 1
                                                   if($key2 == 2)
                                                   {
                                                      if ($isCurrentSig == 1)
                                                      {
                                                         if ($value2 == 1) 
                                                         {
                                                           $isAlreadyAccepted = 1;
                                                         }
                                                         if ($value2 == 2)
                                                         {
                                                         	 $isReturned = 1;
                                                         }
                                                         if ($value2 == 0)
                                                         {
                                                           $isAlreadyRejected = 1;
                                                         }
                                                      }

                                                      if ($isPrevSig == 1)
                                                      {
                                                        
                                                         if($value2 == 1)
                                                          {
                                                          // If the status in sigstatus is 1
                                                            $doShow = 1;                             
                                                          }
                                                          if($value2 == 0)
                                                          {
                                                            $doShow = 0;    
                                                          }
                                                      }                                               
                                                   }
                                                }
                                            }
                                        }



                                   			if($status == 1 && ($doShow == 1 || $prev_sigID == -1) && $isAlreadyAccepted != 1 && $isReturned != 1 && $isAlreadyRejected != 1)
                                   			{

                                   				// Last Name
		                                    	if($key == 3)
		                                    	{
		                                   			$name = $value;
		                                   		}

		                                   		// First Name
			                                    if($key == 4)
			                                    {
			                                       $name = $name . ", " . $value;
			                                    }

			                                    // Middle Name and then display to UI
                                     			if($key == 5)
                                     			{
                                     				?><tr><td><?php echo $appID;?></td><?php
                                       				$name = $name . " " . $value;
                            ?>
                                    				<td><?php echo $name;?></td>
                            <?php
                                     			}

                                     			// Scholarship Name
                                     			if($key == 7)
                                     			{
                            ?>
                                       				<td><?php echo $value; ?></td>
                            <?php
                                     			}

                                     			// Date of Application
                                     			if($key == 8)
                                     			{
                            ?>
		                                      		<td><?php echo $value; ?></td>
                            <?php
                                     			}
											}
                                  		}
                                	}


                                  	if($presentInSigOrder == 1)
                                  	{
                                    	if($status == 1 && ($doShow == 1 || $prev_sigID == -1) && $isAlreadyAccepted != 1 && $isReturned != 1 && $isAlreadyRejected != 1)
                                    	{
                            ?> 			

                                    		<td>
                                    		
	                                    	<form action="backend/sigaccept.php" method="get">
	                                    	  <input type="hidden" name="isLastSig" value="<?php echo $isLastSig?>">
	                                          <button type="submit" name="accept" value="<?php echo $appID?>" onclick=saveAppID() class="btn btn-success">Accept</button>
	                                        </form>
	                                        </td>
	                                        <td>
	                                        <form action="backend/sigreject.php" method="get">
	                                          <button type="submit" name="reject" value="<?php echo $appID?>" class="btn btn-danger">Reject</button>
	                                        </form>
	                                        
	                                        </td>
	                                        <td>
	                                        <form action="backend/sigreturn.php" method="get">
                                            <input type="hidden" name="prevID" value="<?php echo $prev_sigID?>">
	                                          <button type="submit" name="return" value="<?php echo $appID?>" class="btn btn-warning">Return</button>
	                                        </form>
	                                        
	                                        </td>
                                    		
                            <?php
                                		}
                                  	}
                                }
                            ?>

                            </tbody>
                            </table>
                            
                            <br>
                            <header>
								<h3><b>Returned Applications</b></h3>
							</header>
                            <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th class = "col-md-1">Number</th>
                                  <th class = "col-md-2">Returned By</th>
                                  <th class = "col-md-2">Scholarship</th>
                                  <th class = "col-md-2">Reason</th>
                                  <th class = "col-md-1"></th>
                                  <th class = "col-md-1"></th>
                                  <th class = "col-md-1"></th>

                                </tr>
                              </thead>
                              <tbody>

                              <?php
                              $to_query3 = "select R.appID, S.lastName, S.firstName, S.middleName, R.returnedBy, Z.name, Z.signatoryOrder from sigreturn R JOIN signatory S on R.returnedBy = S.sigID JOIN application A on A.applicationID = R.appID JOIN scholarship Z on Z.scholarshipID = A.scholarshipID where returnedTo = '".$_SESSION['currentUserID']."'";
                              $sql_result3 = mysqli_query($conn, $to_query3);

                              while($rows=mysqli_fetch_row($sql_result3))
                                {
                                $appID = 0;
                                $scholarshipName = "";
                                $returnedByID = 0;
                                $Rprev_sigID = 0;
                                $Rnext_sigID = 0;

						        foreach ($rows as $key => $value)
						            {
						            	if ($key == 0)
                                   		{
                                   			$appID = $value;
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
                                     	?><tr><td><?php echo $appID;?></td><?php
                                       	$name = $name . " " . $value;
                            ?>
                                    	<td><?php echo $name;?></td>
                            <?php
                                     	}


                                      if ($key == 4)
                                      {
                                        $returnedByID = $value;
                                      }

                                   		if ($key == 5)
                                   		{
                                   			$scholarshipName = $value;
                                   			?>
                                    		<td><?php echo $scholarshipName;?></td>
                           					 <?php
                                   		}

                                      if ($key == 6)
                                      {
// Gets the first column which is the sigOrder, then stores it in a list
                                        $str = $value;
                                        $delimiter = ',';
                                        $order = preg_split("/$delimiter/", $str);
                                        $numOfSigs = count($order);                   

                                        // Traverses through the sigOrder list
                                        for ($i=0; $i < $numOfSigs; $i++)
                                        {
                                          // Checks if the currently signed in sigUser is included in the sigOrder
                                            if ($order[$i] == $_SESSION['currentUserID'])
                                            {
                                              // If we determine the logged sigID in the SigOrder, find it's prevID.
                                              if($i != 0)
                                              {
                                                // If the sig is NOT the 1st, the prevID is the previous sigID in the order
                                                $Rprev_sigID = $order[$i - 1];
                                              }
                                              else
                                              {
                                                // Else if it is the 1st, the prevID is the admin (denoted by -1)
                                                $Rprev_sigID = -1;
                                              }

                                              if($i != ($numOfSigs - 1))
                                              {
                                                $Rnext_sigID = $order[$i + 1];
                                              }
                                              else
                                              {
                                                $Rnext_sigID = -1;
                                              }

                                              break;
                                            }
                                        }
                                      }
						            }
						         ?>
											<td>
											Ineligible
											</td>

                                    		<td>
	                                    	<form action="backend/sigRaccept.php" method="get">
                                             <input type="hidden" name="returnByID" value="<?php echo $returnedByID?>">
	                                          <button type="submit" name="returnAccept" value="<?php echo $appID?>" onclick=saveAppID() class="btn btn-success">Accept</button>
	                                        </form>
	                                        </td>
	                                        <td>

	                                        <form action="backend/sigRreject.php" method="get">
                                            <input type="hidden" name="returnByID" value="<?php echo $returnedByID?>">
	                                          <button type="submit" name="returnReject" value="<?php echo $appID?>" class="btn btn-danger">Reject</button>
	                                        </form>
	                                        
	                                        </td>
	                                        <td>
	                                        <form action="backend/sigRreturn.php" method="get">
                                            <input type="hidden" name="RprevID" value="<?php echo $Rprev_sigID?>">
                                            <input type="hidden" name="RnextID" value="<?php echo $Rnext_sigID?>">
	                                          <button type="submit" name="returnReturn" value="<?php echo $appID?>" class="btn btn-warning">Return</button>
	                                        </form>
	                                        
	                                        </td>

                              <?php
                                }

                              ?>

                              </tbody>
                            </table>

                            <!--  Modal when the button is clicked --> 
                            <div class = "modal fade" id = "myModal" role = "dialog">
                              <div class = "modal-dialog">
                                <div class = "modal-content">
                                  <div class = "modal-header">
                                    <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                                    <h4 class = "modal-title">Documents from Application <?php echo $_SESSION["selectedAppID"]?></h4>
                                  </div>
                                  <div class = "modal-body">
                                    <table class = "table table-condensed">
                                      <tbody>
                                        <tr>
                                          <td> Document 1 </td>
                                          <td>
                                            <button type = "button" class = "btn btn-info btn-block"> View </button>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td> Document 2 </td>
                                          <td>
                                            <button type = "button" class = "btn btn-info btn-block"> View </button>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td> Document 3 </td>
                                          <td>
                                            <button type = "button" class = "btn btn-info btn-block"> View </button>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  <div class = "modal-footer">
                                      <div class="pull-left">
                                        <form action="sigaccept.php" method="get">
                                          <button style = "margin:5px" type="submit" class="btn btn-success">Accept</button>
                                        </form>
                                        <form action="sigreject.php" method="get">
                                          <button style = "margin:5px" type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                        <form action="sigreturn.php" method="get">
                                          <button style = "margin:5px" type="submit" class="btn btn-danger">Return</button>
                                        </form>
                                      </div>
                                    <button type = "button" class = "btn btn-default" data-dismiss = "modal"> Close </button>
                                  </div>
                                </div>
                              </div>
                            </div>

									
										
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