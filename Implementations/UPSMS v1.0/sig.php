<!DOCTYPE html>

<?php
  // Connect
    $conn = new mysqli("localhost","root","","cs192upsms");
  // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>

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
                            <h2> Pending Applications </h2>
                            <h4> For Review </h4>

                            <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th class = "col-md-1">Applicant</th>
                                  <th class = "col-md-1">Scholarship</th>
                                  <th class = "col-md-1">Received on</th>
                                  <th class = "col-md-1"></th>
                                  <th class = "col-md-1"></th>
                                </tr>
                              </thead>



                              <tbody>

                              <?php
                                $to_query = "select N.studentID, N.lastName, N.firstName, N.middleName,  A.applicationID, A.scholarshipID, S.name, A.appdate from student N join application A on N.studentID = A.studentID join scholarship S on S.scholarshipID = A.scholarshipID order by N.lastName";



                                /*
                                N.studentID = 0
                                N.lastName = 1
                                N.firstName = 2
                                N.middleName = 3
                                A.applicationID = 4
                                A.scholarshipID = 5
                                S.name = 6
                                S.appDate = 7
                                */

                                $sql_result = mysqli_query($conn,$to_query);
                                while($rows=mysqli_fetch_row($sql_result)){
                                 foreach ($rows as $key => $value){
                                   if($key == 1){
                                     $name = $value;
                                   }
                                   if($key == 2){
                                     $name = $name . ", " . $value;
                                   }
                                   if($key == 3){
                                     $name = $name . " " . $value;
                                    ?>
                                  <tr>
                                   <td>
                                     <?php echo $name; ?>
                                   </td>

                                   <?php
                                    }
                                   if($key == 6){
                                  ?>
                                     <td>
                                       <?php echo $value; ?>
                                     </td>

                                  <?php
                                   }
                                   if($key == 7){

                                  ?>
                                    <td>
                                      <?php echo $value; ?>
                                    </td>
                                     <?php
                                   }

                                   }
                                   ?>

                                   <td style = "padding-left:40px">
                                       <button type = "button" class = "btn btn-info" data-toggle = "modal" data-target = "#myModal"> Review </button>
                                   </td>

                                   <?php
                                 }

                                  ?>

                                <tr>
                                  <td>John Doe</td>
                                  <td>MOVE UP</td>
                                  <td>November 3, 2015</td>
                                  <td style = "padding-left:40px">
                                      <button type = "button" class = "btn btn-info" data-toggle = "modal" data-target = "#myModal"> Review </button>
                                  </td>
                                  <td style = "padding-left:40px">
                                    <div class = "checkbox">
                                      <label><input type = "checkbox" value = ""></label>
                                    </div>
                                  </td>
                                </tr>

                              </tbody>

                            </table>

                            <div class = "col-md-offset-10">
                              <div class= "dropdown">
                                <button class = "btn btn-info" type = "button" data-toggle = "dropdown"> Accept
                                <span class = "caret"> </span>
                                </button>
                                <ul class = "dropdown-menu">
                                  <li><a href = "#">Accept</a></li>
                                  <li><a href = "#">Reject</a></li>
                                  <li><a href = "#">Return</a></li>
                                </ul>
                              </div>
                            </div>
                            <br>

                            <h4>Returned Applications</h4>
                            <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th class = "col-md-1">Applicant</th>
                                  <th class = "col-md-1">Scholarship</th>
                                  <th class = "col-md-1">Returned by</th>
                                  <th class = "col-md-1">Notes</th>
                                  <th class = "col-md-1"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>John Smith</td>
                                  <td>MOVE UP</td>
                                  <td>Rhodora Azanza</td>
                                  <td>Incomplete Documents</td>
                                  <td>
                                      <button type = "button" class = "btn btn-info" data-toggle = "modal" data-target = "#myModal"> Review </button>

                                  </td>
                                </tr>
                              </tbody>
                            </table>

                            <div class = "modal fade" id = "myModal" role = "dialog">
                              <div class = "modal-dialog">
                                <div class = "modal-content">
                                  <div class = "modal-header">
                                    <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                                    <h4 class = "modal-title">Documents</h4>
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
