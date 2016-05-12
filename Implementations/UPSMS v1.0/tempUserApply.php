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

              <!-- Content -->
                <div class="content">
                  <section> <!-- start -->

<h1>Apply for Scholarship</h1>
                          <p>Please choose the scholarship you want to apply for from the dropdown menu. Read the description of the scholarship. Download the form and follow all instructions given. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>
                            <div class = "col-md-4">
                              <form style="width:1000px" method="POST" action="tempConfirmUserInfo.php">
                                <div class = "form-group">
                                  <select name = "schlist" id = "schlist" class = "form-control">
                                    <?php
                                      $to_query = "SELECT * FROM scholarship ORDER by name";
                                      $sql_result = mysqli_query($conn, $to_query);
                                      while($row=mysqli_fetch_row($sql_result)){
                                        ?>
                                        <option name="schoChoice" value = "<?php echo $row[0]; ?>">
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

                                <input type="submit" class="btn btn-success" value="Confirm">

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