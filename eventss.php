<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HOST----EVENTS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    </head>
  
    <body>
        <nav class="navbar navbar-toggleable-md navbar-light" style="background-color: #e3f2fd;">    
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
        <div class="container"> 
            <div class="row ">
                <div class="col-4">
                    <center>
                    <br>
                    <h5 class="text-primary">ADD NEW EVENT</h5>
                    <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#add_event" id="event_modal">Add</button>
                    </center>
                    <br>
                </div>
            </div>
	    	<div class="container" id="events">
                <?php include_once"function.php"; show_all_events(); ?>
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
    			        		<input type="text" placeholder="Event Theme Name" name="event_name" id="event_name">
    			        		<p id="validate_theme" class="text-danger"></p>
    			        		<input type="date" placeholder="Date" name="event_date" id="event_date">
    			        		<p id="validate_date" class="text-danger"></p>
    			        		<input type="text" placeholder="Venue" name="event_venue" id="event_venue">
                                <p id="validate_venue" class="text-danger"></p>
                            </form>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        		<button type="button" class="btn btn-success" id="addevent">Add</button>
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