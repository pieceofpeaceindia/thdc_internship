<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HOST----GUESTS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    </head>
  
    <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary ">    
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="http://coloredcow.com" target="_blank" style="font-size:20px;color:black">ColoredCow</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item my-2 my-lg-0">
                        <a class="nav-link" href="guests.php" style="font-size:18px;">Guests</a>
                    </li>
                    <li class="nav-item my-2 my-lg-0">
                        <a class="nav-link" href="eventss.php" style="font-size:18px;">Events</a>
                    </li>
                </ul>
             </div>
        </nav>
        <hr>
        <div class="container"> 
  			<?php include_once"function.php"; current_event(); ?>
			<div class="container">
			<div class="row justify-content-md-around">
	        	<div class="col-4">
	        		<center>
	        		<br>
	        		<h5 class="text-primary">ADD NEW GUEST</h5>
	        		<button type="submit" class="btn btn-info" data-toggle="modal" data-target="#add_guest" id="guest_modal">Add</button>
	        		</center>
	        	</div>
	        </div>
	        <br>
	    	<div class="container" id="guests">
                <nav class="navbar navbar-inverse bg-success" style="text-align: center; font-weight: bold;font-size: 20px;">PREVIOUSLY INVITED GUEST
                </nav>
                <?php include_once"function.php"; show_guest_details(); ?>
            </div>     
            <hr><hr>
            <div class="container" id="applied">
                <nav class="navbar navbar-inverse bg-success" style="text-align: center; font-weight: bold;font-size: 20px;">REQUESTED PEOPLE'S DETAILS
                </nav>
                <?php include_once"function.php"; apply_list(); ?>
                <br>
            </div> 
	        <br>
			<!-- Modal -->
			<div class="modal fade" id="add_guest" tabindex="-1" role="dialog" aria-labelledby="add_guest_label" aria-hidden="true">
				<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="add_guest_label">Add guest's details</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
				      		<form class="form-group" id="guest_form">
				        		<input type="text" placeholder="Guest Name" name="guest_name" id="guest_name">
				        		<p id="validate_name" class="text-danger"></p>
				        		<input type="email" placeholder="E-Mail" name="guest_email" id="guest_email">
				        		<p id="validate_email" class="text-danger"></p>
				        		<input type="tel" placeholder="Contact Number" name="guest_contact_number" id="guest_contact_number">
	                            <p id="validate_no" class="text-danger"></p>
                            </form>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        		<button type="button" class="btn btn-success" id="addguest">Add</button>
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