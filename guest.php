<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOST----GUESTS</title>
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
			height:80px;
			background-color: black;
			color: white;
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
		               <a class="nav-link btn btn-outline-secondary" href="http://ec2-52-15-245-244.us-east-2.compute.amazonaws.com/thdc_internship/eventss.php">Events</a>
	               </li>
	          </ul>
         </div>
	</nav>

	<div class="container" style="padding-top:25px;"> 
		<hr>
		<div class="row justify-content-md-around">
	        	<div class="col">
	        		<center>
	        		<br>
	        		<h5 class="text-primary">ADD NEW GUEST</h5>
	        		<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#add_guest" id="guest_modal">Add</button>
	        		</center>
        		</div>
     	</div>
     	<br>
     	<div>
			<ul class="nav nav-tabs" role="tablist" style="width:80%;">
				<li  class="nav-item">
			    		<a class="nav-link text-success" data-toggle="tab" href="#confiremed_guest_list" role="tab">CONFIRMED GUEST</a>
				</li>
				<li  class="nav-item">
			    		<a class="nav-link active text-info" data-toggle="tab" href="#pending_guest_list" role="tab">PENDING GUEST</a>
			     </li>
			     <li  class="nav-item">
			    		<a class="nav-link text-warning" data-toggle="tab" href="#applied_guest_list" role="tab">REQUESTED GUEST</a>
			     </li>
			</ul>
		</div>
		<div class="tab-content">
	        	<div id="confiremed_guest_list" class="tab-pane" role="tabpanel">
	        		<hr>
		     	<nav class="navbar navbar-inverse bg-success" style="text-align: center; font-weight: bold;font-size: 20px;">CONFIREMED GUEST
	          	</nav>
		    		<div class="table-responsive" id="guests"> 
	               
	          	</div>
          	</div>     
            
            	<div id="pending_guest_list" class="tab-pane active" role="tabpanel">
            	<hr>
	          	<nav class="navbar navbar-inverse bg-info" style="text-align: center; font-weight: bold;font-size: 20px;">PENDING GUEST
	          	</nav>
	          	<div class="table-responsive" id="pending">

	          	</div> 
           	</div>
			
	        	<div id="applied_guest_list" class="tab-pane" role="tabpanel">
	        	<hr>
		        	<nav class="navbar navbar-inverse bg-warning" style="text-align: center; font-weight: bold;font-size: 20px;">REQUESTED PEOPLE'S DETAILS
	            	</nav>
		    		<div class="table-responsive table-sm" id="applied"> 
	               
	            	</div>
            	</div>     
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
		      		<form class="form-group" id="guest_form">
			      		<div class="modal-body">
			      			<p id="msg"></p>
				        		<input type="text" placeholder="Guest Name" name="guestname" id="guestname" required>
				        		<p></p>
				        		<input type="email" placeholder="E-Mail" name="email" id="email" required>
				        		<p></p>
				        		<input type="number" placeholder="Contact Number" name="phone" id="phone" required>
			      		</div>
			      		<div class="modal-footer">
				        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        		<button type="button" class="btn btn-success" name="action " id="action">Add</button>
			      		</div>
		      		</form>
			    	</div>
		  	</div>
		</div>
	</div>
	<div id="footer" class="sticky-bottom">
	<hr>
		<p>Copyright &copy; ColoredCow || 2017 </p>
	</div>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://ec2-52-15-245-244.us-east-2.compute.amazonaws.com/thdc_internship/main.js"></script>
</html>