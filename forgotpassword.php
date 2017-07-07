<!DOCTYPE html>
<html>
	<head>
		<title>RSVP</title>
			<meta charset="UTF-8">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-inverse bg-primary ">
        <span class="navbar-brand" style="text-align: center;">FORGET YOUR PASSWORD</span>
    	</nav>
    	<br>
    	<center>
    	<div class="row container">
			<table class="table bg-warning">
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
		<div class="row container">
			<div class="col-sm">
				<form  method="POST" id="forgot_password_form">
					<label for="Email" class="col-8 col-sm col-form-label"><strong><em>Email address</em></strong></label>
	                <div class="col-6 col-sm-4">
	                    <input type="email" class="form-control" id="email_guest" placeholder="Enter email" name="email_guest">
	                </div>
	                <label for="phone no" class="col-8 col-sm col-form-label"><strong><em>Contact Number</em></strong></label>
	                <div class="col-6 col-sm-4">
	                    <input type="tel" class="form-control" id="guest_contact_number" placeholder="Enter you contact number" name="guest_contact_number">
	                </div>
	                <br>
	                <button type="submit" class="btn btn-success" name="forget_password" id="forget_password">SUBMIT</button>
				</form>
			</div>			
			&nbsp;<!-- 
			<div class="col-sm">	
			</div> -->
		</center>	
		</div>	
	    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
            
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://ec2-52-15-245-244.us-east-2.compute.amazonaws.com/thdc_internship/main.js"></script>
</html>