<!DOCTYPE html>

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
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Our main goal is to implement a system that allows the monitoring of scholarship system within UP System." content="">
    <meta name="Patricia Regarde, Cyan Villarin" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="sig.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#">UP SMS</a></li>

                <form class = "sidebar-form" role = "search">
                  <div class = "input-group">
                    <input type = "text" class = "form-control" placeholder = "Search">
                    <span class = "input-group-btn">
                      <button type = "submit" class = "btn btn default">
                        <span class = "glyphicon glyphicon-search"></span>
                      </button>
                    </span>
                  </div>
                </form>

                <li><a href="javascript:displayDiv('home-div','pending-div','reviewed-div','about-div')">Home</a></li>
                <li><a href="javascript:displayDiv('pending-div','home-div','reviewed-div','about-div')">Pending Applications</a></li>
                <li><a href="javascript:displayDiv('reviewed-div','pending-div', 'home-div','about-div')">Reviewed Applications</a></li>
                <li><a href="javascript:displayDiv('about-div','pending-div', 'reviewed-div','home-div')">About</a></li>
                <li><a href="backend/logout.php">Logout</a></li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>

                        <div id="home-div" style="display:block">

                          <h1>Home</h1>
                          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>

                          <div class="panel panel-info">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Notifications</div>

                            <!-- List group -->
                            <ul class="list-group">
                              <li class="list-group-item">There are 22 new applications to be reviewed.</li>
                              <li class="list-group-item">Rhodora V. Azanza has rejected 3 applications.</li>
                            </ul>
                          </div>

                          <div class="panel panel-primary">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Announcements</div>

                            <!-- List group -->
                            <ul class="list-group">
                              <li class="list-group-item">Deadline for MOVE UP applications is on November 13, 2015 11:59 PM.</li>
                              <li class="list-group-item">The Application for COOPERATE is now open.</li>
                              <li class="list-group-item">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</li>
                              <li class="list-group-item">Porta ac consectetur acusamus et iusto odio dignissimos ducimus qui blanditiis praes</li>
                              <li class="list-group-item">Vestibulum at eros corrupti quos dolores et quas molestia voluptas assumenda est, omnisat.</li>
                            </ul>
                          </div>
                        </div>

                        <div id="pending-div" style="display:none">
                            <h2> Pending Applications </h2> <h3> <?php echo "Logged in as: Signatory " . $_SESSION['currentUserID'] ?> </h3>
                            <br>
                            <h4> For Review </h4>

                            <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th class = "col-md-1">Applicant</th>
                                  <th class = "col-md-1">Scholarship</th>
                                  <th class = "col-md-1">Received on</th>
                                  
                                  <th class = "col-md-1"></th>
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
                                       				$name = $name . " " . $value;
                            ?>
                                    				<tr><td><?php echo $name;?></td>
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
                                    		<td style = "padding-left:40px">
                                        	<button type = "button" name="reviewButton" value="<?php echo $appID; ?>" class = "btn btn-info" data-toggle = "modal" data-target = "#myModal"> Application 	<?php echo $appID; ?> </button>
                                    		</td>
                                    		<td>
                                    		
	                                    	<form action="sigaccept.php" method="get">
	                                          <button type="submit" name="accept" value="<?php echo $appID?>" onclick=saveAppID() class="btn btn-success">Accept <?php echo $appID?></button>
	                                        </form>
	                                        </td>
	                                        <td>
	                                        <form action="sigreject.php" method="get">
	                                          <button type="submit" name="reject" value="<?php echo $appID?>" class="btn btn-danger">Reject <?php echo $appID?></button>
	                                        </form>
	                                        
	                                        </td>
	                                        <td>
	                                        <form action="sigreturn.php" method="get">
                                            <input type="hidden" name="prevID" value="<?php echo $prev_sigID?>">
	                                          <button type="submit" name="return" value="<?php echo $appID?>" class="btn btn-warning">Return <?php echo $appID?></button>
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
                            <h4>Returned Applications</h4>
                            <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th class = "col-md-1">Returned By</th>
                                  <th class = "col-md-1">Scholarship</th>
                                  <th class = "col-md-1"></th>
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
                                       	$name = $name . " " . $value;
                            ?>
                                    	<tr><td><?php echo $name;?></td>
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
											<td style = "padding-left:40px">
                                        	<button type = "button" name="reviewButton" value="<?php echo $appID; ?>" class = "btn btn-info" data-toggle = "modal" data-target = "#myModal"> Application 	<?php echo $appID; ?> </button>
                                    		</td>
                                    		<td>
                                    		
	                                    	<form action="sigRaccept.php" method="get">
                                             <input type="hidden" name="returnByID" value="<?php echo $returnedByID?>">
	                                          <button type="submit" name="returnAccept" value="<?php echo $appID?>" onclick=saveAppID() class="btn btn-success">Accept <?php echo $appID?></button>
	                                        </form>
	                                        </td>
	                                        <td>

	                                        <form action="sigRreject.php" method="get">
                                            <input type="hidden" name="returnByID" value="<?php echo $returnedByID?>">
	                                          <button type="submit" name="returnReject" value="<?php echo $appID?>" class="btn btn-danger">Reject <?php echo $appID?></button>
	                                        </form>
	                                        
	                                        </td>
	                                        <td>
	                                        <form action="sigRreturn.php" method="get">
                                            <input type="hidden" name="RprevID" value="<?php echo $Rprev_sigID?>">
                                            <input type="hidden" name="RnextID" value="<?php echo $Rnext_sigID?>">
	                                          <button type="submit" name="returnReturn" value="<?php echo $appID?>" class="btn btn-warning">Return <?php echo $appID?></button>
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
                          </div>
                        </div>
                        <div id="reviewed-div" style="display:none">
                            <h2> Reviewed Applications </h2>
                            <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th class = "col-md-1">Applicant</th>
                                  <th class = "col-md-1">Scholarship</th>
                                  <th class = "col-md-1">Received on</th>
                                  <th class = "col-md-1">Office</th>
                                  <th class = "col-md-1">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>John Smith</td>
                                  <td>COOPERATE</td>
                                  <td>October 31, 2015</td>
                                  <td>OVPAA</td>
                                  <td>Accepted</td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <div id="about-div" style="display:none">
                          <h1>About</h1>
                          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    <!--
    Method Name: displayDiv
    Creation Date: December 7, 2015
    Purpose: To display and switch between tabs on a page.
    List of the calling arguments: The arguments used are the div elements of the page.
    List of required files: No required files
    Return Value: None
    -->
    <script type="text/javascript">
    function displayDiv(div1, div2, div3, div4, div5){
      /* This is the div that we want to display */
       d1 = document.getElementById(div1);
      /* The divs below are to be hidden when the first div wants to be shown */
       d2 = document.getElementById(div2);
       d3 = document.getElementById(div3);
       d4 = document.getElementById(div4);
       d5 = document.getElementById(div5);

       if( d1.style.display == "none" ){
          d1.style.display = "block";
          d2.style.display = "none";
          d3.style.display = "none";
          d4.style.display = "none";
          d5.style.display = "none";
       }
    }
    </script>

</body>
</html>
