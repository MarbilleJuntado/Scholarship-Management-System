<?php
/*Start a session*/
  session_start();
/*Include files for the backend*/
  include 'backend/getCollege.php';
  include 'backend/getStudent.php';

  if(isset($_POST['studentID'])){
  	$_SESSION['student'] = $_POST['studentID'];
  }

  $student = getStudent();

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
          <h1 id = "logo"><a href = "tempAdmin.php"><span>UP</span>SMS</a></h1>
          <nav id = "nav">
            <ul>
              <li class = "current"><a href = "tempAdmin.php">Home</a></li>
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
											<h3><strong></strong></h3>
										</header>
                        <form method = "post" name = "scholarshiplist" id = "scholarshiplist" action = "backend/addStudent.php">
                      
                          <table id = "studTable" class = "table table-striped table-hover table-bordered table-condensed">
                              <thead>
                                <tr>
                                  <th>Information</th>  
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>

                                    First Name: <input type = "text" name = "fname[]" value = "<?php echo $student->firstName; ?>"><br><br>
                                    
                                    Middle Name: <input type = "text" name = "mname[]" value = "<?php echo $student->middleName; ?>"><br><br>
                                    
                                    Last Name: <input type = "text" name = "lname[]" value = "<?php echo $student->lastName; ?>"><br><br>
                                    
                                    UP Mail: <input type = "text" name = "mail[]" value = "<?php echo $student->upMail; ?>"><br><br>
                                    
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


                            <div class = "text-center">
              		            <input type = "submit" name = "studButton" value = "Edit">
                            </div>
								        </form>
        								<br>
                        <div class = "text-center">
          								<form method = "post" action = "backend/addStudent.php">
          									<input type = "submit" value = "Delete" name = "studButton">
          								</form>
                        </div>
        								<br>
                        <div class = "text-center">
          								<form action = "tempAdStudent.php">
          									<input type = "submit" value = "Back">
          								</form>
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


    </script>

        <script src="js/creative.js"></script>

		<!-- Script for enabling links to submit form !-->
		<script type="text/javascript">
		function submitEditStudentForm(){
			  document.editStudentForm.submit();
		}

		</script>
	</body>
</html>

