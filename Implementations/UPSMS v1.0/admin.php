<!--
 The MIT License (MIT)
 Copyright (c) 2016 UPSMS
 Authors:
   Prototype Front-End Developer: Marbille Juntado
   Front-End and Back-End Developer: Patricia Regarde

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
  Decemeber 11, 2015: Marbille Juntado finished Front End of Protoype for admin.php
  February 11, 2016: Patricia Regarde added the feature of the admin.php being able to read from cs192upsms.sql database.
                     The system is also able to display the contents of the application table in the UI.
  February 16, 2016: Patricia Regarde added the feature of the system that allows the admin account to accept/reject an
                     application. If accepted, the system will write 1 to status field of the application table. If rejected,
                     write 2 instead.
  February 18, 2016: Patricia Regarde finished the accept feature. System can now also write the information of the student and
                     his/her respective scholarship in the studentscholarship table.
  March 1, 2016: The system can now display the contents of the scholarship table in the UI.
                 Patricia Regarde added the delete scholarship feature.
  March 3, 2016: Patricia Regarde added the add scholarship feature.
  March 15, 2016: Patricia Regarde fixed the form for inputting signatory orders. 
  March 15, 2016: Patricia Regarde added the add signatory and add admin feature.
  March 17, 2016: Patricia Regarde added the add student feature.

  File Creation Date: December 11, 2015
  Development Group: UPSMS (Marbille Juntado, Patricia Regarder, Cyan Villarin)
  Client Group: Mrs. Rowena Solamo, Dr. Jaime Caro
  Purpose of this software: Our main goal is to implement a system that allows the monitoring of scholarship system within UP System.
-->


<?php
/*Start a session*/
  session_start();
/*Include files for the backend*/

  include 'backend/getApplication.php';
  include 'backend/getScholarship.php';
  include 'backend/getSignatory.php';
  include 'backend/getCollege.php';
  include 'backend/getDepartment.php';
  include 'backend/getStudents.php';
  include 'backend/getAdmins.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin.css" rel="stylesheet">

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


                <li><a href="javascript:displayDiv('home-div','application-div','scholarship-div', 'users-div', 'about-div')">Home</a></li>
                <li><a href="javascript:displayDiv('application-div','home-div','scholarship-div', 'users-div', 'about-div')">Applications</a></li>
                <li><a href="javascript:displayDiv('scholarship-div','home-div','application-div', 'users-div', 'about-div')">Scholarships</a></li> 
                <li><a href="Javascript:displayDiv('users-div','home-div','application-div', 'scholarship-div', 'about-div')">Users</a></li>
                <li><a href="javascript:displayDiv('about-div','home-div','application-div', 'scholarship-div', 'users-div')">About</a></li>
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
                        
                            <button style="background-color:lightblue;text-align:left" bcoltype="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#demo">Notifications</button>
                            <!-- List group -->
                            <div id="demo" class="collapse">
                              <ul class="list-group">
                                <li class="list-group-item">Cyan Villarin has submitted his financial report.</li>
                                <li class="list-group-item">12 new applications for MOVEUP scholarship.</li>
                              </ul>
                            </div>
                          </div>

                          <div class="panel panel-primary">
                            <!-- Default panel contents -->
                            <button style="text-align:left" bcoltype="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#demo1">Announcements</button>

                            <div id="demo1" class="collapse">
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
                        </div>
                        <br />
                        <br />


                        <div id="application-div" style="display:none">
                        <h1>Release for Signatories</h1>
                          <form method = "post" name = "studentlist" action = "backend/adminAcceptReject.php">
                                                                      
                            
                            <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>

                                  <th class = "col-md-1">Applicant</th>
                                  <th class = "col-md-1">Scholarship</th>
                                  <th class = "col-md-1">Received on</th>
                                  <th class = "col-md-1">Status</th>
                                  <th class = "col-md-1">Documents</th>
                                  <th class = "col-md-1"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  /*Get all applications in the application table. Uses getApplication.php*/
                                  $application = getApplication();
                                  foreach($application as $temp) {
                                    ?>
                                  
                                  
                                    <tr>
                                      <input type = "hidden" name = "studID[]" value = "<?php echo $temp->studentID; ?>">
                                     

                                      <td><a href="#" data-toggle="modal" data-target="#1Modal"><?php echo $temp->firstName, " ", $temp->lastName?></a></td>

                                      <td><?php echo $temp->name?></td>
                                      <td><?php echo $temp->appDate?></td>
                                      <td>
                                        <button type = "button" class = "btn btn-info" data-toggle="modal" data-target = "#statusModal">See</button>
                                      </td>
                                      <td>
                                          <button type = "button" class = "btn btn-info" data-toggle = "modal" data-target = "#myModal"> Review </button>
                                      </td>
                                      <td>
                                          <input type = "hidden" name = "scholarshipID<?php echo $temp->studentID; ?>" id = "scholarshipID" value = "<?php echo $temp->scholarshipID; ?>">
                                          <input type = "checkbox" name = "acceptreject<?php echo $temp->studentID; ?>" id = "acceptreject" value = "<?php echo $temp->studentID; ?>">
                                      </td>
                                    </tr>
                                  
                                </tbody>

                                <?php
                                  }
                                ?>
                              </table>

                              <input type = "submit" name = "accrej" value = "Accept">
                              <input type = "submit" name = "accrej" value = "Reject">

                          </form>

                          <h1>Release for Accepted Students</h1>

                          <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>

                                  <th class = "col-md-1">Application Number</th>
                                  <th class = "col-md-1">Applicant</th>
                                  <th class = "col-md-1">Scholarship</th>
                                  <th class = "col-md-1">Start Date</th>
                                  <th class = "col-md-1">Status</th>
                                  
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

                              $to_query = "select A.appID, S.lastName, S.firstName, S.middleName, R.name, A.startDate from acceptedapps A join application P on A.appID = P.applicationID join student S on S.studentID = P.studentID join scholarship R on R.scholarshipID = P.scholarshipID";
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
                                        ?><td><?php echo $value;?></td><?php
                                      }
                                      if($key == 5){
                                        ?>
                                            <td><?php echo $value;?></td>
                                  <?php
                                      }
                                    }


                                    $to_query2 = "select R.appID, R.status from released R where R.appID = '".$appID."'";
                                    $sql_result2 = mysqli_query($conn,$to_query2);
                                    if (mysqli_num_rows($sql_result2) == 0)
                                    {?>
                                        <td>
                                        <form action="release.php" method="get">
                                          <input type="hidden" name="status" value="1">
                                            <button type="submit" name="notify" value="<?php echo $appID?>" onclick=saveAppID() class="btn btn-info">Notify</button>
                                          </form>
                                          </td>
                                    <?php
                                    }
                                    else{
                                      ?> <td><button type="submit" class="btn btn-success" disabled>Notified</button></td>
                                      <?php
                                    }
                                    ?>


                                        
                                          <?php

                              }
                              mysqli_close($conn);
                              ?>  

                              </tbody>
                          </table>

                          <h1>Release for Rejected Students</h1>

                          <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>

                                  <th class = "col-md-1">Application Number</th>
                                  <th class = "col-md-1">Applicant</th>
                                  <th class = "col-md-1">Scholarship</th>
                                  <th class = "col-md-1">Status</th>
                                  
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
                                        ?><td><?php echo $value;?></td><?php
                                      }
                                    }


                                    $to_query2 = "select R.appID, R.status from released R where R.appID = '".$appID."'";
                                    $sql_result2 = mysqli_query($conn,$to_query2);
                                    if (mysqli_num_rows($sql_result2) == 0)
                                    {?>
                                        <td>
                                        <form action="release.php" method="get">
                                          <input type="hidden" name="status" value="0">
                                            <button type="submit" name="notify" value="<?php echo $appID?>" onclick=saveAppID() class="btn btn-info">Notify</button>
                                          </form>
                                          </td>
                                    <?php
                                    }
                                    else{
                                      ?> <td><button type="submit" class="btn btn-success" disabled>Notified</button></td>
                                      <?php
                                    }
                                    

                              }
                              mysqli_close($conn);
                              ?>

                              </tbody>
                          </table>

                                    <div id="statusModal" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Application Status</h4>
                                          </div>
                                          <div class="modal-body">
                                            <table class = "table table-hover table-condensed">
                                              <thead>
                                                <tr>
                                                  <th class = "col-md-1">Task</th>
                                                  <th class = "col-md-1">Status</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>Submit Application Form</td>
                                                  <td style = "padding-left:40px;position:relative;left:-32px">
                                                    <div class = "checkbox">
                                                      <label><input type = "checkbox" value = ""></label>
                                                    </div>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>Submit Required Documents</td>
                                                  <td style = "padding-left:40px;position:relative;left:-32px">
                                                    <div class = "checkbox">
                                                      <label><input type = "checkbox" value = ""></label>
                                                    </div>
                                                  </td>
                                                </tr> 
                                                <tr>
                                                  <td>Approval by College Dean</td>
                                                  <td style = "padding-left:40px;position:relative;left:-32px">
                                                    <div class = "checkbox">
                                                      <label><input type = "checkbox" value = ""></label>
                                                    </div>
                                                  </td>
                                                </tr>                                            
                                                <tr>
                                                  <td>Approval by VPAA</td>
                                                  <td style = "padding-left:40px;position:relative;left:-32px">
                                                    <div class = "checkbox">
                                                      <label><input type = "checkbox" value = ""></label>
                                                    </div>
                                                  </td>
                                                </tr>      
                                                <tr>
                                                  <td>Approval by Chancellor (Final)</td>
                                                  <td style = "padding-left:40px;position:relative;left:-32px">
                                                    <div class = "checkbox">
                                                      <label><input type = "checkbox" value = ""></label>
                                                    </div>
                                                  </td>
                                                </tr>                                                                                                                                 
                                              </tbody>
                                            </table>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                    

                                  <div class = "modal fade" id = "myModal" role = "dialog">
                                    <div class = "modal-dialog">
                                      <div class = "modal-content">
                                        <div class = "modal-header">
                                          <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                                          <h4 class = "modal-title">View Documents</h4>
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
                                          <button type = "button" class = "btn btn-default" data-dismiss = "modal"> Close </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        </div>

                        <div id="scholarship-div" style="display:none">
                          <form method = "post" name = "scholarshiplist" id = "scholarshiplist" action = "backend/adminAddDelSch.php">
                            <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th class = "col-md-1">Scholarship</th>
                                  <th class = "col-md-1">Form</th>
                                  <th class = "col-md-1">Application Status</th>
                                  <th class = "col-md-1">Total Slots</th>
                                  <th class = "col-md-1">Grantees</th>

                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $scholarship = getScholarship();
                                  foreach($scholarship as $temp){
                                    ?>
                                    <tr>
                                      <input type = "hidden" name = "schoID[]" value = "<?php echo $temp->scholarshipID; ?>">
                                     
                                      <td><a href="#" data-toggle="modal" data-target="#scholarshipDescription"><?php echo $temp->name?></a></td>
                                      <td><button type="button" class="btn btn-info btn-block">Upload New</td>
                                      <td>
                                        <?php 
                                          $now = time();
                                          $date = $temp->appDeadline;

                                          if (strtotime($date) > $now){
                                            echo "Ongoing", "(", $date, ")";
                                          }

                                          else{
                                              echo "Finished";
                                          }
                                        ?>  
                                      </td>
                                      <td><?php echo $temp->numofGrantees?></td>
                                      <td>
                                        <button type = "button" class = "btn btn-info" data-toggle = "modal" data-target = "#grantees">View</button>
                                      </td>
                                    </tr>
                              </tbody>
                              <?php
                                }
                              ?>
                            </table>

                            <br>

                            <label>Scholarship Name</label><br><input type = "text" name = "schname">
                            <br><br>

                            <label>Benefactor</label><br><input type = "text" name = "benefactor">
                            <br><br>

                            <label>Application Deadline</label><br><input type = "date" name = "appdeadline">
                            <br><br>

                            <label>Number of grantees</label><br><input type = "text" name = "granteesNum">
                            <br><br>

                            <br>
                            <br>

                            <label>Signatory Order</label><br>

                            <button type = "button" class = "btn btn-default" id = "addSig" name = "addSig">+</button>
                            <button type = "button" class = "btn btn-default" id = "remSig" name = "remSig">x</button>
                            <button type = "button" class = "btn btn-default" id = "upSig" name = "upSig">^</button>
                            <button type = "button" class = "btn btn-default" id = "downSig" name = "downSig">v</button>
                            <br><br>

                            <select name = "sigList" id = "sigList" multiple size = "10" style = "width:200px;">
                              <?php
                                $signatory = getSignatory();
                                foreach($signatory as $temp){
                              ?>

                              <option value = "<?php echo $temp->sigID; ?>"><?php echo $temp->firstName, " ", $temp->lastName; ?></option>

                              <?php } ?>

                            </select>

                            <select name = "selSigList[]" id = "selSigList" multiple size = "10"  style = "width:200px;">
                            </select>
                            
                            <br><br>

                              <select id = "schoList" name = "schoList" class = "form-control">
                                <option>...</option>
                                <?php 
                                  $scho = getScholarship();
                                  foreach($scho as $temp){
                                    ?>

                                    <option value = "<?php echo $temp->scholarshipID; ?>" name = "<?php echo $temp->scholarshipID; ?>"><?php echo $temp->name; ?></option>
                                    <?php
                                  }
                                    ?>
                              </select>


                            <input type = "submit" name = "deladd" value = "Edit" onclick = "selectAll();">
                            <input type = "submit" name = "deladd" value = "Add" onclick = "selectAll();">

                          </form>

                            <div class="modal fade" id="scholarshipDescription" role="Dialog">
                              <div class="modal-dialog">
                                <div class = "modal-content">
                                  <div class = "modal-header">
                                    <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                                    <h4 class = "modal-title">Description</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type = "button" class = "btn btn-default" data-dismiss = "modal"> Close </button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="grantees" role="dialog">
                              <div class = "modal-dialog">
                                <div class = "modal-content">
                                  <div class = "modal-header">
                                    <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                                    <h4 class = "modal-title">List of Grantees</h4>
                                  </div>
                                  <div class = "modal-body">
                                    <table>
                                      <tr>
                                        <td><a href="#" data-toggle="modal" data-target="#Bae">Suzy Bae</a></td>
                                      </tr>
                                      <tr>
                                        <td><a href="#">Shin-hye Park</a></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class = "modal-footer">
                                    <button type = "button" class = "btn btn-default" data-dismiss = "modal"> Close </button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="Bae" role ="dialog">
                              <div class="modal-dialog">
                                <div class = "modal-content">
                                  <div class = "modal-header">
                                    <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                                    <h4 class = "modal-title">Information</h4>
                                  </div>
                                  <div class = "modal-body">
                                    <b>Duration of Scholarship Program</b>: Fall 2015 - Spring 2016
                                    <br />
                                    <br />
                                    <b>Important Data</b>:                                    
                                    <ul>
                                      <li><a href="#">User Profile</a></li>
                                      <li><a href="#">Financial Report</a></li>
                                      <li><a href="#">Accomplishment Report</a></li>
                                    </ul>
                                  </div>

                                  <div class = "modal-footer">
                                    <button type = "button" class = "btn btn-default" data-dismiss = "modal"> Close </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <br />

                            <div>
                              <button type = "button" class = "btn btn-info" data-toggle = "modal" data-target = "#newScholarship" disabled> Define New Scholarship </button>
                            </div>

                            <div id="newScholarship" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <div class = "modal-content">
                                  <div class = "modal-header">
                                    <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                                    <h4 class = "modal-title">Defining new scholarship</h4>
                                  </div>
                                  <div class = "modal-body">
                                    <ul>
                                      <li><a href="#">Add scholarship description</a></li>
                                      <li><a href="#">Add required applicant data</a></li>
                                      <li><a href="#">Add required documents</a></li>
                                      <li><a href="#">Add signatories</a></li>
                                    </ul>
                                  </div>
                                  <div class = "modal-footer">
                                    <button type = "button" class = "btn btn-default" data-dismiss = "modal"> Close </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div id = "users-div" style = "display:none">
                          <div class = "form-group">
                            <select id = "userType" name = "userType" class = "form-control">
                              <option>Add user account...</option>
                              <option value = "studopt">Student</option>
                              <option value = "adminopt">Admin</option>
                              <option value = "sigopt">Signatory</option>
                            </select>
                          </div>

                            <form id = "studopt" style = "display:none" method = "post" action = "backend/addStudent.php">

                            <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>

                                  <th class = "col-md-1">Student</th>
                                  <th class = "col-md-1"></th>
                                  <th class = "col-md-1"></th>

                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  /*Get all applications in the application table. Uses getApplication.php*/
                                  $student = getStudents();
                                  foreach($student as $temp) {
                                    ?>
                                  
                                  
                                    <tr>
                                      <input type = "hidden" name = "stdntID[]" value = "<?php echo $temp->studentID; ?>">
                                      <input type = "hidden" name = "sID" value = "<?php echo $temp->studentID; ?>">
                                     

                                      <td><a href="#" data-toggle="modal" data-target="#1Modal"><?php echo $temp->lastName, ", ", $temp->firstName, " ", $temp->middleName; ?></a></td>

                                      <td>
                                        <input type = "submit" class = "btn btn-default" value = "Edit" name = "studButton">
                                      </td>

                                      <td>
                                          <input type = "hidden" name = "studentID<?php echo $temp->studentID; ?>" id = "studentID" value = "<?php echo $temp->studentID; ?>">
                                          <input type = "checkbox" name = "edit<?php echo $temp->studentID; ?>" id = "edit" value = "<?php echo $temp->studentID; ?>">
                                      </td>
                                    </tr>
                                  
                                </tbody>

                                <?php
                                  }
                                ?>
                              </table>
                              <br>

                              <input type = "submit" class = "btn btn-default" value = "Delete" name = "studButton">
                              <br><br>


                              <button type = "button" onClick = "addRow('studTable')" class = "btn btn-default"> Add Student </button>
                              <button type = "button" onClick = "deleteRow('studTable')" class = "btn btn-default"> Remove Student </button>

                              <table id = "studTable" class = "table table-striped table-hover table-bordered table-condensed">
                                <thead>
                                  <tr>
                                    <th></th>
                                    <th>Information</th>
                                  
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><input type = "checkbox" name = "chkbox[]"><br></td>
                                    <td>

                                    First Name: <input type = "text" name = "fname[]"><br><br>
                                    
                                    Middle Name: <input type = "text" name = "mname[]"><br><br>
                                    
                                    Last Name: <input type = "text" name = "lname[]"><br><br>
                                    
                                    UP Mail: <input type = "text" name = "mail[]"><br><br>
                                    
                                    College: <select id = "college" name = "college[]" class = "form-control">
                                        <option>...</option>
                                        <?php 
                                          $college = getCollege();
                                          foreach($college as $temp){
                                        ?>

                                        <option value = "<?php echo $temp->collegeID; ?>" name = "<?php echo $temp->name; ?>"><?php echo $temp->name; ?></option>
                                        <?php } ?>
                                      </select>
                                      <br>
                                      Department: <select id = "dept" name = "dept[]" class = "form-control">
                                        <option value = "">...</option></select>

                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                              <select id = "studList" name = "studList" class = "form-control">
                                <option>...</option>
                                <?php 
                                  $student = getStudents();
                                  foreach($student as $temp){
                                    ?>

                                    <option value = "<?php echo $temp->studentID; ?>" name = "<?php echo $temp->studentID; ?>"><?php echo $temp->lastName, ", ", $temp->firstName, " ", $temp->middleName; ?></option>
                                    <?php
                                  }
                                    ?>
                              </select>

                              <br>


                              <input type = "submit" class = "btn btn-default" value = "Edit" name = "studButton">  

                              <input type = "submit" class = "btn btn-default" value = "Submit" name = "studButton">



                            </form>

                            <form id = "adminopt" style = "display:none" method = "post" action = "backend/addAdmin.php">

                             <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>

                                  <th class = "col-md-1">Admin</th>
                                  <th class = "col-md-1"></th>
                                  <th class = "col-md-1"></th>

                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  /*Get all applications in the application table. Uses getApplication.php*/
                                  $admin = getAdmins();
                                  foreach($admin as $temp) {
                                    ?>
                                  
                                  
                                    <tr>
                                      <input type = "hidden" name = "admnID[]" value = "<?php echo $temp->adminID; ?>">
                                     

                                      <td><a href="#" data-toggle="modal" data-target="#1Modal"><?php echo $temp->lastName, ", ", $temp->firstName, " ", $temp->middleName; ?></a></td>

                                      <td>
                                        <button type = "submit" class = "btn btn-info" name = "adminButton">Edit</button>
                                      </td>

                                      <td>
                                          <input type = "hidden" name = "adminID<?php echo $temp->adminID; ?>" id = "adminID" value = "<?php echo $temp->adminID; ?>">
                                          <input type = "checkbox" name = "edit<?php echo $temp->adminID; ?>" id = "edit" value = "<?php echo $temp->adminID; ?>">
                                      </td>
                                    </tr>
                                  
                                </tbody>

                                <?php
                                  }
                                ?>
                              </table>
                              <br>
                                
                              <input type = "submit" class = "btn btn-default" value = "Delete" name = "adminButton">
                              <br><br>


                              
                              <button type = "button" onClick = "addRow('adminTable')" class = "btn btn-default"> Add Admin </button>
                              <button type = "button" onClick = "deleteRow('adminTable')" class = "btn btn-default"> Remove Admin </button>

                              <table id = "adminTable" class = "table table-striped table-hover table-bordered table-condensed">
                                <thead>
                                  <tr>
                                    <th></th>
                                    <th>Information</th>
                                  
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><input type = "checkbox" name = "chkbox[]"><br></td>
                                    <td>

                                    First Name: <input type = "text" name = "fname[]"><br><br>
                                    
                                    Middle Name: <input type = "text" name = "mname[]"><br><br>
                                    
                                    Last Name: <input type = "text" name = "lname[]"><br><br>
                                    
                                    UP Mail: <input type = "text" name = "mail[]"><br><br>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                              <select id = "adList" name = "adList" class = "form-control">
                                <option>...</option>
                                <?php 
                                  $admin = getAdmins();
                                  foreach($admin as $temp){
                                    ?>

                                    <option value = "<?php echo $temp->adminID; ?>" name = "<?php echo $temp->adminID; ?>"><?php echo $temp->lastName, ", ", $temp->firstName, " ", $temp->middleName; ?></option>
                                    <?php
                                  }
                                    ?>
                              </select>

                              <br>


                              <input type = "submit" class = "btn btn-default" value = "Edit" name = "adminButton">  


                              <input type = "submit" class = "btn btn-default" value = "Submit" name = "adminButton">



                            </form>


                            <form id = "sigopt" style = "display:none" method = "post" action = "backend/addSig.php">
                              
                              <button type = "button" onClick = "addRow('sigTable')" class = "btn btn-default"> Add Signatory </button>
                              <button type = "button" onClick = "deleteRow('sigTable')" class = "btn btn-default"> Remove Signatory </button>

                              <table id = "sigTable" class = "table table-striped table-hover table-bordered table-condensed">
                                <thead>
                                  <tr>
                                    <th></th>
                                    <th>Information</th>
                                  
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><input type = "checkbox" name = "chkbox[]"><br></td>
                                    <td>

                                    First Name: <input type = "text" name = "fname[]"><br><br>
                                    
                                    Middle Name: <input type = "text" name = "mname[]"><br><br>
                                    
                                    Last Name: <input type = "text" name = "lname[]"><br><br>
                                    
                                    UP Mail: <input type = "text" name = "mail[]"><br><br>

                                    Position: <input type = "text" name = "position[]"><br><br>                                    
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                              <input type = "submit" class = "btn btn-default" value = "Submit" name = "Submit">
                            </form>
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
    <script src="js/jquery.js">
      $(document).ready(function(){

      });

    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('#userType').on('change', function() {
      var val = $(this).val();
      $('#studopt').hide();
      $('#adminopt').hide();
      $('#sigopt').hide();
      $('#' + val).show();
    });

    $('#studTable').on('change', 'select', function() {
      var val = $(this).val();

      if (val == "1"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "2"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'Department of Art Studies'>Department of Art Studies</option><option value = 'Department of English and Comparative Literature'>Department of English and Comparative Literature</option><option value = 'Department of European Languages'>Department of European Languages</option><option value = 'Departamento ng Filipino at Panitikan ng Pilipinas'>Departamento ng Filipino at Panitikan ng Pilipinas</option><option value = 'Department of Speech Communication and Theatre Arts'>Department of Speech Communication and Theatre Arts</option>")
      }
      else if (val == "3"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "4"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "5"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'Department of Business Administration'>Department of Business Administration</option><option value = 'Department of Accounting and Finance'>Department of Accounting and Finance</option>");
      }
      else if (val == "6"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "7"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "8"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'Institute of Civil Engineering'>Institute of Civil Engineering</option><option value = 'Department of Chemical Engineering'>Department of Chemical Engineering</option><option value = 'Department of Computer Science'>Department of Computer Science</option><option value = 'Institute of Electrical and Electronics Engineering'>Institute of Electrical and Electronics Engineering</option><option value = 'Department of Geodetic Engineering'>Department of Geodetic Engineering</option><option value = 'Department of Industrial Engineering and Operations Research'>Department of Industrial Engineering and Operations Research</option><option value = 'Department of Mechanical Engineering'>Department of Mechanical Engineering</option><option value = 'Department of Mining, Metallurgical, and Materials Engineering'>Department of Mining, Metallurgical, and Materials Engineering</option><option value = 'Energy Engineering Program'>Energy Engineering Program</option><option value = 'Environmental Engineering Program'>Environmental Engineering Program</option>");
      }
      else if (val == "9"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'Department of Studio Arts'>Department of Studio Arts</option><option value = 'Department of Theory'>Department of Theory</option><option value = 'Department of Visual Communication'>Department of Visual Communication</option><option value = 'CFA Graduate Program'>CFA Graduate Program</option>");
      }
      else if (val == "10"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'Department of Clothing, Textiles, and Interior Design'>Department of Clothing, Textiles, and Interior Design</option><option value = 'Department of Family Life and Child Development'>Department of Family Life and Child Development</option><option value = 'Department of Food Science and Nutrition'>Department of Food Science and Nutrition</option><option value = 'Department of Home Economics Education'>Department of Home Economics Education</option><option value = 'Department of Hotel, Restaurant and Institution Management'>Department of Hotel, Restaurant and Institution Management</option>");
      }
      else if (val == "11"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'Department of Physical Education'>Department of Physical Education</option><option value = 'Department of Sports Science'>Department of Sports Science</option><option value = 'Graduate Studies Program'>Graduate Studies Program</option>");
      }
      else if (val == "12"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "13"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "14"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "15"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "16"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'Department of Broadcast Communication'>Department of Broadcast Communication</option><option value = 'Department of Communication Research'>Department of Communication Research</option><option value = 'Film Institute'>Film Institute</option><option value = 'Department of Journalism'>Department of Journalism</option><option value = 'Department of Graduate Studies'>Department of Graduate Studies</option>");
      }
      else if (val == "17"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "18"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "19"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'Institute of Biology'>Institute of Biology</option><option value = 'Institute of Chemistry'>Institute of Chemistry</option><option value = 'Institute of Environmental Science and Meteorology'>Institute of Environmental Science and Meteorology</option><option value = 'Institute of Math'>Institute of Math</option><option value = 'National Institute of Molecular Biology and Biotechnology'>National Institute of Molecular Biology and Biotechnology</option><option value = 'Marine Science Institute'>Marine Science Institute</option><option value = 'National Institute of Geological Sciences'>National Institute of Geological Sciences</option><option value = 'National Institute of Physics'>National Institute of Physics</option><option value = 'Materials Science and Engineering Program'>Materials Science and Engineering Program</option>");
      }
      else if (val == "20"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'Department of Anthropology'>Department of Anthropology</option><option value = 'Department of Geography'>Department of Geography</option><option value = 'Departamento ng Kasaysayan'>Departamento ng Kasaysayan</option><option value = 'Departamento ng Linggwistiks'>Departamento ng Linggwistiks</option><option value = 'Department of Philosophy'>Department of Philosophy</option><option value = 'Department of Political Science'>Department of Political Science</option><option value = 'Department of Psychology'>Department of Psychology</option><option value = 'Department of Sociology'>Department of Sociology</option><option value = 'Population Institute'>Population Institute</option>");
      }
      else if (val == "21"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'Department of Community Development'>Department of Community Development</option><option value = 'Department of Social Work'>Department of Social Work</option><option value = 'Department of Women and Development Studies'>Department of Women and Development Studies</option><option value = 'Doctor of Social Development Program'>Doctor of Social Development Program</option>");
      }
      else if (val == "22"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "23"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "24"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "25"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "26"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }
      else if (val == "27"){
        $(this).closest('tr').find('select[name="dept[]"]').html("<option value = 'N/A'>N/A</option>");
      }

    });

    $('#addSig').click(function(){
      $('#sigList option:selected').each( function() {
        $('#selSigList').append("<option value = '"+$(this).val()+"'>" + $(this).text() + "</option>");
        $(this).remove();
      });
    });


    $('#remSig').click(function(){
      $('#selSigList option:selected').each( function() {
        $('#sigList').append("<option value = '"+$(this).val()+"'>" + $(this).text() + "</option>");
        $(this).remove();
      });
    });

    $('#upSig').on('click', function(){
      $('#selSigList option:selected').each( function(){
        var newPos = $('#selSigList option').index(this) - 1;
        if (newPos > -1){
          $('#selSigList option').eq(newPos).before("<option value='"+$(this).val()+"' selected='selected'>"+$(this).text()+"</option>");
          $(this).remove();
        }
      });
    });

    $('#downSig').on('click', function(){
      var countOptions = $('#selSigList option').size();
      $('#selSigList option:selected').each( function(){
        var newPos = $('#selSigList option').index(this) + 1;
        if (newPos < countOptions){
          $('#selSigList option').eq(newPos).after("<option value='"+$(this).val()+"' selected='selected'>"+$(this).text()+"</option>");
          $(this).remove();
        }
      });
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

    <!-- Display Div Script -->
    <script type="text/javascript">
    function displayDiv(div1, div2, div3, div4, div5, div6)
    {
       d1 = document.getElementById(div1);  // this is the div we want to disply
       d2 = document.getElementById(div2);  // the divs below are the div, pardon for inefficiency
       d3 = document.getElementById(div3);
       d4 = document.getElementById(div4);
       d5 = document.getElementById(div5);
       d6 = document.getElementById(div6);

       if( d1.style.display == "none" )
       {
          d1.style.display = "block";
          d2.style.display = "none";
          d3.style.display = "none";
          d4.style.display = "none";
          d5.style.display = "none";
          d6.style.display = "none";
       }

    }

    function addRow(tableID){
      var table = document.getElementById(tableID);
      var rowCount = table.rows.length;
      
      var row = table.insertRow(rowCount);
      var colCount = table.rows[1].cells.length;
      
      for (var i = 0; i < colCount; i++){
        var newcell = row.insertCell(i);
        newcell.innerHTML = table.rows[1].cells[i].innerHTML;
      }
    }

    function deleteRow(tableID){
      var table = document.getElementById(tableID);
      var rowCount = table.rows.length;

      for (var i = 0; i < rowCount; i++){
        var row = table.rows[i];
        var chkbox = row.cells[0].childNodes[0];
        if (null != chkbox && true == chkbox.checked){
          if (rowCount <= 2){
            alert("You cannot remove all students");
            break;
          }
          table.deleteRow(i);
          rowCount--;
          i--;
        }
      }
    }

    function selectAll(){
      sel = document.getElementById("selSigList");
      for (var i = 0; i < sel.options.length; i++){
        sel.options[i].selected = true;
      }
    }

    </script>

</body>

</html>
