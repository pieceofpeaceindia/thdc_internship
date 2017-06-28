<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RSVP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    </head>
  
    <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary fixed-top">    
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="http://coloredcow.com" target="_blank" style="font-size:20px;color:black">ColoredCow</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item my-2 my-lg-0">
                        <a class="nav-link" data-toggle="modal" data-target="#guestpage_link">Guests</a>
                    </li>
                    <li class="nav-item my-2 my-lg-0">
                        <a class="nav-link" data-toggle="modal" data-target="#eventpage_link">Events</a>
                    </li>
                </ul>
             </div>
        </nav>
        <br>
        <div class="container" style="padding-top:50px;">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
			  	<div class="carousel-inner" role="listbox">
			    	<div class="carousel-item active">
			    		<img class="d-block img-fluid" src="bg2.jpg" alt="First slide" style="width:100%;height:500px;">
			    	</div>
				    <div class="carousel-item">
				    	<img class="d-block img-fluid" src="bg3.jpg" alt="Second slide" style="width:100%;height:500px;">
				    </div>
				    <div class="carousel-item">
				    	<img class="d-block img-fluid" src="bg4.jpg" alt="Third slide" style="width:100%;height:500px;">
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
         	<hr>
<!--         	<div class="container" style="border-left:2px solid #CC9900;">
	        		<h3 style="font-family: 'courier';color:#993333;">About Us</h3>
	        	<div>
	        		<p style="font-family:monospace ;font-size: 18px;color:#999900;">ColoredCow is a problem solving company; we solve business problems through technology. We center the solutions around our clients and the people their business affects. Our software products and services grow business when we make connection at the heart by making empathy the main element. We believe in providing long lasting solutions that we can share as success stories. A colored cow would always stand out from the crowd; we do justice to our name by reflecting the same in our thoughts and in the way we work.</p>
        		</div>
        	</div>
        	<hr> -->
        	<div class="container" class="container" style="border-left:2px solid #999900;">	
        			<h3 style="font-family: 'courier';color:#993333">About &quot;SOIREE&quot;</h3>
	        	<div>	
	        		<p style="font-family:monospace;font-size: 18px;color:#CC9900;">Every first saturday of each month we sit together and talk about our life and discuss things happenning around. We believe that there must be healthy relationship among the collegues so that the essence of the organization can sustain. We invite all of our clients, friends, friends of friends and even some one who wanna be part of the event he can register through portal. This is the &quot;SOIREE&quot;. Details of the upcoming event is shown below you can gave response or register.</p>
        		</div>
        	</div>
        	<div class="container">
        		<hr>
        		<center>
        			<h3 style="font-family:'courier'; font-weight: bold; color:red">&quot;CREATING MEMORIES TOGETHER&quot;</h3>
        			<h3 style="font-family:'courier'; font-weight: bold; color:red">SOIREE-JULY</h3>
        		<center>
        		<hr>
        	</div>
	    	<div class="container-fluid">
					<?php include_once"function.php"; current_event(); ?>
	        </div>
	        <div class="row justify-content-md-around">
	        	<div class="col col-xs-12 col-sm-4">
	        		<center>
	        		<br>
	        		<h3 class="text-primary" style="font-family: 'comic sans ms';">RESPONSE FOR SOIREE</h3>
	        	   <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#rsvp_modal" name="rsvp-modal" id="rsvp-modal">RSVP</button>
	        		</center>
	        	</div>
	        	<div class="col col-xs-12 col-sm-4">
	        		<center>
	        		<br>
	        		<h3 class="text-primary" style="font-family: 'comic sans ms';">REGISTER FOR SOIREE</h3>
	        		<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#request_modal" name="register_modal" id="register_modal">REGISTER</button>
	        		</center>
	        	</div>
	        </div>
<hr>
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
			      			<p id="msgrsvp"></p>
			      			<form class="form-group" id="rsvp_form">
			        			<input type="email" placeholder="E-mail" name="email_guest" id="email_guest" required>
			        			<p id="validate_email" class="text-danger"></p>
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
				        		<input type="tel" placeholder="Contact Number" name="apply_contact_number" id="apply_contact_number" required>
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

			<div class="modal fade" id="guestpage_link" tabindex="-1" role="dialog" aria-labelledby="guestpage_label" aria-hidden="true">
				<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="guestpage_label">Please enter you credentials</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<input type="password" placeholder="Enter Password" name="loginpassword" id="loginpassword">
			      		</div>
			      		<div class="modal-body">
			      			<p class="text-danger"><a href="forgotpassword.php">Forget Password?</a></p>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        		<button type="button" class="btn btn-success" onclick="window.location.href='guest.php'" id="login">Log In</button>
			      		</div>
			    	</div>
			  	</div>
			</div>

			<div class="modal fade" id="eventpage_link" tabindex="-1" role="dialog" aria-labelledby="eventpage_label" aria-hidden="true">
				<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="eventpage_label">Please enter you credentials</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<input type="password" placeholder="Enter Password" name="loginpassword" id="loginpassword">
			      		</div>
			      		<div class="modal-body">
			      			<p class="text-danger"><a href="forgotpassword.php">Forget Password?</a></p>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        		<button type="button" class="btn btn-success" onclick="window.location.href='eventss.php'" id="login">Log In</button>
			      		</div>
			    	</div>
			  	</div>
			</div>
		</div>			
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="main.js"></script>
</html>