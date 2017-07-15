<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOST----EVENTS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    	.btn:hover{
    		cursor: pointer;
    	}
    	a:hover{
    		cursor: pointer;
    		background-color:#AAB5FE;
    	}
    	#footer {
			text-align:center;
			bottom: 0;
			width: 100%;
			height:40px;
			background-color: black;
			color: white;
			position: absolute;
		}
    </style>    
</head>

<body>
    	<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">    
        	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          	<span class="navbar-toggler-icon"></span>
        	</button>
        	<a class="navbar-brand btn btn-outline-secondary" href="http://ec2-52-15-245-244.us-east-2.compute.amazonaws.com/thdc_internship/index.php" style="font-size:20px;"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</a>
        	<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          	<ul class="navbar-nav">
               	<li class="nav-item my-2 my-lg-0">
                    	<a class="nav-link btn btn-outline-secondary"  href="http://ec2-52-15-245-244.us-east-2.compute.amazonaws.com/thdc_internship/guest.php"><span class="glyphicon glyphicon-home"></span>Guests</a>
                	</li> 
            	</ul>
         	</div>
    	</nav>
    	<div class="container" style="padding-top: 75px;"> 
        	<div class="row ">
            	<div class="col-4">
               	<center>
               	<br>
               	<h5 class="text-primary">ADD NEW EVENT</h5>
               	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add_event" id="event_modal">Add</button>
              		</center>
               	<br>
            	</div>
        	</div>   
    		
    		<div class="container table-responsive" id="event_details_div">
    		
    		</div>
        	<br>
		<!-- Modal -->
		<div class="modal fade" id="add_event" tabindex="-1" role="dialog" aria-labelledby="add_event_label" aria-hidden="true">
			<div class="modal-dialog" role="document">
			    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="add_event_label">Add event's details</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<div class="modal-body">
		                   	<form class="form-group" id="event_form">
				        		<input type="text" placeholder="Event Theme Name" name="event_name" id="event_name" required>
				        		<p id="validate_theme" class="text-danger"></p>
				        		<input type="date" placeholder="Date" name="event_date" id="event_date" required>
				        		<p id="validate_date" class="text-danger"></p>
				        		<input type="text" placeholder="Venue" name="event_venue" id="event_venue" required>
		                       <p id="validate_venue" class="text-danger"></p>
		                   	</form>
		      		</div>
		      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        		<button type="button" class="btn btn-success" id="addevent" data-dismiss="modal">Add</button>
		      		</div>
			    	</div>
		  	</div>
		</div>
		<div class="modal fade" id="update_event" tabindex="-1" role="dialog" aria-labelledby="update_event_label" aria-hidden="true">
			<div class="modal-dialog" role="document">
		    		<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="update_event_label">Update events details</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<div class="modal-body">
	                        	<form class="form-group" id="event_update_form">
				        		<input type="text" placeholder="Event Theme Name" name="update_event_name" id="update_event_name" required>
				        		<p></p>
				        		<input type="date" placeholder="Date" name="update_event_date" id="update_event_date" required>
				        		<p></p>
				        		<input type="text" placeholder="Venue" name="update_event_venue" id="update_event_venue" required>
				        		<p></p>
				        		<input type="hidden" name="dataid" id="dataid">
	                        	</form>
		      		</div>
		      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        		<button type="button" class="btn btn-success" id="updateevent" data-dismiss="modal">Update</button>
		      		</div>
		    		</div>
		  	</div>
		</div>

		<div class="modal fade" id="delete_event" tabindex="-1" role="dialog" aria-labelledby="delete_event_label" aria-hidden="true">
			<div class="modal-dialog" role="document">
		    		<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="delete_event_label">Delete Event</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<div class="modal-body">
			        		<p id="delete_event_name"></p>
			        		<p id="delete_event_date"></p>
			        		<p id="delete_event_venue"></p>
			        		<p class="text-danger">Are you sure want to delete this event?</p>
	                        	<form class="form-group" id="event_delete_form">
				        		<input type="hidden" name="dataid" id="dataid">
	                        	</form>
		      		</div>
		      		<div class="modal-footer">
			        		<button type="button" class="btn btn-danger" id="deleteevent" data-dismiss="modal">Yes! Delete it</button>
		      		</div>
		    		</div>
		  	</div>
		</div>

	</div>	

<div id="footer">
	<p>Copyright &copy; ColoredCow || 2017 </p>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://ec2-52-15-245-244.us-east-2.compute.amazonaws.com/thdc_internship/main.js"></script>
</html>