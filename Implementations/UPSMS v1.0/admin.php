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


                <li><a href="javascript:displayDiv('home-div','pending-div','reviewed-div','about-div')">Home</a></li>
                <li><a href="javascript:displayDiv('pending-div','home-div','reviewed-div','about-div')">Applications</a></li>
                <li><a href="javascript:displayDiv('reviewed-div','pending-div', 'home-div','about-div')">Scholarships</a></li> 
                <li><a href="javascript:displayDiv('about-div','pending-div', 'reviewed-div','home-div')">About</a></li>
                <li><a href="login.html">Logout</a></li>
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
                        <div id="pending-div" style="display:none">
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

                        <div id="reviewed-div" style="display:none">
                            <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th class = "col-md-1">Scholarship</th>
                                  <th class = "col-md-1">Application Form</th>
                                  <th class = "col-md-1">Status</th>
                                  <th class = "col-md-1">Free Slots/<br />Total Slots</th>
                                  <th class = "col-md-1">Grantees</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><a href="#" data-toggle="modal" data-target="#scholarshipDescription">COOPERATE</a></td>
                                  <td><button type="button" class="btn btn-info btn-block">Upload New</td>
                                  <td>Ongoing</td>
                                  <td>0/2</td>
                                  <td>
                                    <button type = "button" class = "btn btn-info" data-toggle = "modal" data-target = "#grantees">View</button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>

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
                              <button type = "button" class = "btn btn-info" data-toggle = "modal" data-target = "#newScholarship"> Define New Scholarship </button>
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

    <!-- Display Div Script -->
    <script type="text/javascript">
    function displayDiv(div1, div2, div3, div4, div5)
    {
       d1 = document.getElementById(div1);  // this is the div we want to disply
       d2 = document.getElementById(div2);  // the divs below are the div, pardon for inefficiency
       d3 = document.getElementById(div3);
       d4 = document.getElementById(div4);
       d5 = document.getElementById(div5);

       if( d1.style.display == "none" )
       {
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
