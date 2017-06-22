<!DOCTYPE html>
<html>
	<head>
		<title>Apply for soiree</title>
			<meta charset="UTF-8">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-inverse bg-primary">
        <span class="navbar-brand" style="text-align: center;">SOIREE</span>
    	</nav>
    	<center>
    	<br>
    	<div class="row container">
			<table class="table bg-warning table-bordered">
				<?php
					$details=array();
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "internrsvp";
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					} 

					$sql = "SELECT event_theme_name, event_date, event_venue FROM eventdetails
						ORDER BY event_date Asc";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
						{
					    $row = $result->fetch_assoc();
					    	echo "<br/>";
					    	echo "<thead>";
					    	echo "<tr>";
					    	echo "<th>";
					    		echo "THEME NAME :- ".$row["event_theme_name"];
					   			echo "</th>";
					   			echo "<th>";
				    			echo "DATE :- ".$row["event_date"];
				    			echo"</th>";
				    			echo "<th>";
				    			echo "EVENT VENUE :- ".$row["event_venue"];
				    		echo "</th>";
				    		echo "</tr>";
				    		echo"</thead>";
						} else {
					    echo "0 results";
					}
					$conn->close();
				?>
			</table>
		</div>	
		<br><br>
		<div class="row container">
			<div class="col-sm">
				<form  method="POST" id="apply_form">
					<label for="Email" class="col-8 col-sm col-form-label"><strong><em>Email address :-</em></strong></label>
		                <div class="col-6 col-sm-4 col-xs-6">
		                    <input type="email" class="form-control" id="apply_email" placeholder="Enter email" name="apply_email">
		                <p id="validate_email" class="text-danger"></p>
		                </div>
	                <label for="guestname" class="col-8 col-sm col-form-label">Name Of The Guest</label>
	                    <div class="col-6 col-sm-4 col-xs-6">
	                       <input type="text" class="form-control required" id="apply_name" placeholder="Your Name" name="apply_name">
	                       <p id="validate_name" class="text-danger"></p>
	                    </div>
	                <label for="contact_number" class="col-8 col-sm col-form-label">Phone No.</label>
	                    <div class="col-6 col-sm-4 col-xs-6">
	                       <input type="number" class="form-control required" id="apply_contact_number" placeholder="Contact Number" name="apply_contact_number">
	                       <p id="validate_no" class="text-danger"></p>
	                    </div>
	                <button type="button" class="btn btn-primary" name="select" value="selectguest" id="register">Register Youself</button>    
				</form>
			</div>			
			&nbsp;&nbsp;
			<div class="row">
				
			</div>
		</center>
		</div>	
		
	    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
            
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="main.js"></script>
</html>