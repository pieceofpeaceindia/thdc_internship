<!DOCTYPE html>
<html lang="en">
<head>
    <title>RSVP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Margarine" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Luckiest Guy" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Marcellus SC" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Paprika" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Marcellus SC" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fresca" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">    
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#" style="font-family: ;"><img src="images/logo" width="180" height="45" class="d-inline-block align-top" alt=""></a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item my-2 my-lg-0">
                    <a class="nav-link btn btn-outline-secondary"  href="http://ec2-52-15-245-244.us-east-2.compute.amazonaws.com/thdc_internship/eventss.php">Admin</a>
                </li>              
            </ul>
         </div>
    </nav>
    <br>
    <div class="container" style="padding-top:50px;">
     	<div class="container">
			<div  style="font-family:">
				<center>
					<h1 style="font-family:sans-serif; font-size: 60px; color: indigo; padding-top: 20px;" class="main heading"></h1>
				</center>
				<br>
			</div>	
			<div class="row">
				<div class="col col-sm-12 col-md- col-lg-6 about">
					<h5 style="font-family: 'Marcellus SC'; font-size: 85px; color:goldenrod;">Soiree</h5>
					<br>
				  	<p class="lead" style="font-family: inherit;padding-bottom: 5px;">ColoredCow celebrates every first Saturday of the month with family and friends. This custom has been started to take a little time off from work and enjoy some moments in life. we believe in sharing moments and learning with each other. Come and join us over music, food, drinks and some moments full of laughter and joy.</p>
					<hr><center>
						<div class="col-md-8 col-xs-12">
							<h5  class="" style="font-family: 'Marcellus SC'; font-size: 23px; color:white;align-content: center;">Wanna join the party?</h5>
							<button type="button" class="btn btn-outline-warning btn-lg btn-block" data-toggle="modal" data-target="#request_modal" name="register_modal" id="register_modal">Request Invite</button>
						</div>
						</center>
				</div>
				<div class="col col-sm-12 col-md-12 col-lg-6 eventdata" style=" font-family: Paprika;">
					<h1 style="font-family: 'Marcellus SC'; font-size: 25px; color:goldenrod; padding-top: 15px; ">Coming Up...</h1>
					<div style="font-family: 'Marcellus SC'">
					<?php include_once"function.php"; current_event(); ?>
					<hr><center>
						<div class="col-md-8 col-xs-12">
						<h5 style="font-family: 'Marcellus SC'; font-size: 23px; color:white; align-content: center;">Confirm your Presence</h5>
						<button type="button" class="btn btn-outline-warning btn-lg btn-block" data-toggle="modal" data-target="#rsvp_modal" name="rsvp-modal" id="rsvp-modal">RSVP</button>
						</div>	
						</center>
					</div>
				</div>	
			</div>
    		</div>
        <br>
        <hr style="border-width: 3px">
			<center>
				<h1 style="font-family: 'Marcellus SC'; font-size: 50px; color: goldenrod; padding-top: 30px;"><i class="fa fa-camera-retro fa-1x"></i>&nbsp;Event Gallery</h1>
			</center>		
			<div class="container" style="width:765px;">
				<div id="carouselExampleIndicators" class="carousel slide"  data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1">	</li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2">	</li>
						<li data-target="#carouselExampleIndicators" data-slide-to="3">	</li>
						<li data-target="#carouselExampleIndicators" data-slide-to="4">	</li>
						<li data-target="#carouselExampleIndicators" data-slide-to="6">	</li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
						  	<img class="d-block img-fluid images_carousel" src="images/1.jpg" alt="First slide">
						  	<div class="carousel-caption d-none d-md-block">
								<h3 style="font-family: Oswald; color: darkorange;"># 1.</h3>  
						  	</div>
						</div>
						<div class="carousel-item">
						  	<img class="d-block img-fluid images_carousel" src="images/2.jpg" alt="Second slide">
						  	<div class="carousel-caption d-none d-md-block">
								<h3 style="font-family: Oswald; color: darkorange;"># 2.</h3>  
						  	</div>
						</div>
						<div class="carousel-item">
						  	<img class="d-block img-fluid images_carousel" src="images/4.jpg" alt="fourth slide">
						  	<div class="carousel-caption d-none d-md-block">
								<h3 style="font-family: Oswald; color: darkorange;"># 4.</h3>  
						  	</div>
						</div>
						<div class="carousel-item">
						  	<img class="d-block img-fluid images_carousel" src="images/3.jpg" alt="fifth slide">
						  	<div class="carousel-caption d-none d-md-block">
								<h3 style="font-family: Oswald; color: darkorange;"># 5.</h3>  
						  	</div>
						</div>
						<div class="carousel-item">
						  	<img class="d-block img-fluid images_carousel" src="images/6.jpg" alt="seventh slide">
						  	<div class="carousel-caption d-none d-md-block">
								<h3 style="font-family: Oswald; color: darkorange;"># 7.</h3>  
						  	</div>
						</div>
						<div class="carousel-item">
						  	<img class="d-block img-fluid images_carousel" src="images/9.jpg" alt="eighth slide">
						  	<div class="carousel-caption d-none d-md-block">
								<h3 style="font-family: Oswald; color: darkorange;"># 8.</h3>  
						  	</div>
						</div> 
					</div>		
				</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
			</div>
		</div>
	</div>
	<div id="footer" class="sticky-bottom">
	<hr>
		<p>Copyright &copy; ColoredCow || 2017 </p>
	</div>




	<!-- Modal -->
	<div class="modal fade" id="rsvp_modal" tabindex="-1" role="dialog" aria-labelledby="rsvp_modal_label" aria-hidden="true">
		<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="rsvp_modal_label">Add your e-mail address to get link</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<form class="form-group" id="rsvp_form">
	        			<input type="email" placeholder="E-mail" name="email_guest" id="email_guest" required>
	        			<p id="msgrsvp"></p>
	        		</form>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        		<button type="button" class="btn btn-success" id="get_link">Get Link</button>
	      		</div>
	    	</div>
	  	</div>
	</div>

	<div class="modal fade" id="request_modal" tabindex="-1" role="dialog" aria-labelledby="request_modal_label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		    	<div class="modal-content">
	      		<div class="modal-header">
		        		<h5 class="modal-title" id="request_modal_label">Add your details to register</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<p id="msg"></p>
	      			<form class="form-group" id="apply_form">
		        			<input type="text" placeholder="Your Name" name="apply_name" id="apply_name" required>
		        			<p id="validate_name" class="text-danger"></p>
		        			<input type="email" placeholder="Your E-mail" name="apply_email" id="apply_email" required>
		        			<p id="validate_email" class="text-danger"></p>
		        			<input type="number" placeholder="Contact Number" name="apply_contact_number" id="apply_contact_number" required>
		        			<p id="validate_no" class="text-danger"></p>
		        		</form>	
	      		</div>
	      		<div class="modal-footer">
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        		<button type="button" class="btn btn-success" id="register">Submit</button>
	      		</div>
		    	</div>
	  	</div>
	</div>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://ec2-52-15-245-244.us-east-2.compute.amazonaws.com/thdc_internship/main.js"></script>
</html>