<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HOST----GUESTS</title>
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
                        <a class="nav-link" href="guests.php" style="font-size:18px;">Guests</a>
                    </li>
                    <li class="nav-item my-2 my-lg-0">
                        <a class="nav-link" href="eventss.php" style="font-size:18px;">Events</a>
                    </li>
                </ul>
             </div>
        </nav>
        <hr>
        <div class="container" style="padding-top:25px;"> 
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
	        </div>
	        <br>
	    	<div class="table-responsive" id="guests"> 
               
            </div>     
            <hr><hr>
            <div class="table-responsive" id="applied">

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
				        		<input type="tel" placeholder="Contact Number" name="phone" id="phone" required>
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
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="main.js"></script> -->
</html>

<script type="text/javascript">
	$(document).ready(function() {
	fetch_guest();
	fetch_appply_guest();	
		function fetch_guest(){
			var action="select";
			$.ajax({
				url: "updateautomatic.php",
				method: "POST",
				data:{action:action},
				success:function(data){
					$('#action').text("Add");
					$('#guests').html(data);
				}
			});
		}
		function fetch_appply_guest(){
			var action="select";
			$.ajax({
				url: "applyguestdetails.php",
				method: "POST",
				data:{action:action},
				success:function(data){
					// $('#action').text("Add");
					$('#applied').html(data);
				}
			});
		}	
		$("#action").click(function(){
			var guestform = $('#guest_form');
			if(!guestform[0].checkValidity()){
            guestform[0].reportValidity();
            return;
       		}
			var guest_name= $('#guestname').val();
			var guest_email= $('#email').val();
			var contact= $('#phone').val();
			var id=$('#guest_id').val();
			var action=$('#action').val();
			console.log(guest_name);
			console.log(guest_email);
			console.log(contact);
			$.ajax({
				url: "action.php",
				method:"POST",
				data:{guest_name:guest_name,guest_email:guest_email,contact:contact,id:id,action:action},
				success:function(result){
					document.getElementById("msg").innerHTML=result;
					document.getElementById('guest_form').reset();
					// alert(result);
					fetch_guest();
				}
			})
		});

		$(document).on('click', '.reject', function(){
			var applyid= $(this).attr("id");
			var action="reject";
			$.ajax({
				url:"ajax.php",
				method:"POST",
				data:{applyid:applyid, action:action},
				success:function(data){
					fetch_guest();
					fetch_appply_guest();
					alert(data);
				}
			})
		});

		$(document).on('click', '.accept', function(){
			var applyid= $(this).attr("id");
			var action="accept";
			$.ajax({
				url:"ajax.php",
				method:"POST",
				data:{applyid:applyid, action:action},
				success:function(data){
					fetch_guest();
					fetch_appply_guest();
					alert(data);
				}
			})
		});		

	});
</script>
