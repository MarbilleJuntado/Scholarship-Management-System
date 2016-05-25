<?php
/*Start a session*/
  session_start();
/*Include files for the backend*/
include 'backend/getAdmins.php';

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
                         

                             <table class = "table table-hover table-condensed">
                              <thead>
                                <tr>

                                  <th class = "col-md-1">Admin</th>
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

                                      <td class = "pull-right">
                                      	<form method = "post" name = "editAdminForm" action = "tempEditAdmin.php">
	                                      	<input type = "hidden" name = "adminID" value = "<?php echo $temp->adminID; ?>">
	                                        <button type = "submit" class = "btn btn-info">Edit</button>
                                     	</form>
                                      </td>

                                     
                                    </tr>
                                  
                                </tbody>

                                <?php
                                  }
                                ?>
                              </table>
                             	<form action = "tempAddAdmin.php" class = "text-center">
									<input type = "submit" value = "Add Admin">
								</form>




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
    <script type="text/javascript">
    function selectAll(){
      sel = document.getElementById("selSigList");
      for (var i = 0; i < sel.options.length; i++){
        sel.options[i].selected = true;
      }
    }

    </script>

        <script src="js/creative.js"></script>

		<!-- Script for enabling links to submit form !-->
		<script type="text/javascript">
		function submitEditAdminForm(){
			  document.editAdminForm.submit();
		}
		</script>


	</body>
</html>

