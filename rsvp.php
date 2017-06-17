<!DOCTYPE html>
<html>
	<head>
		<title>RSVP</title>
			<meta charset="UTF-8">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
             <script type="text/javascript" src="main.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse bg-primary ">
        <center><span class="navbar-brand">ADD YOUR RESPONSE FOR &quot;SOIREE&quot;</span></center>
    	</nav>
    	<div class="row">
			<div class="container col-7">
				<table class="table table-warning">
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
					<div class="container">
						<form action="function.php" method="POST">
							<label for="Email" class="col-8 col-form-label">Email address</label>
			                <div class="col-6">
			                    <input type="email" class="form-control" id="email_guest" placeholder="Enter email" name="email_guest">
			                </div>
			                <br>
			                <!-- <label class="col-8">Enter Your Prefrence</label>
			                <div class="radio">
				                <label><input type="radio" name="prefrence" value="veg">Veg</label>
				                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			 					<label><input type="radio" name="prefrence" value="nonveg">Non Veg.</label>
			                	<br>
			                </div> -->
			                <button type="submit" class="btn btn-success" name="select" value="dorsvp">RSVP</button>
						</form>
					</div>
					<hr>
					<!--< div class="container">
						<span class="bg-warning navbar navbar-brand col" style="text-align: center;">WANNA BE THE PART OF SOIREE !!<br> REGISTER HERE</span>
						<form>
							<label for="name" class="col-8 col-form-label">YOUR NAME</label>
							<div class="col-12">
			                    <input type="text" class="form-control" id="guestname" placeholder="Enter your name" name="guest_name">
			                </div>
							<label for="email" class="col-8 col-form-label">Email address</label>
							<div class="col-12">
			                    <input type="email" class="form-control" id="email_guest" placeholder="Enter email" name="email_guest">
			                </div>
			                <br>
			                <button type="submit" class="btn btn-success" name="select" value="dorsvp">RSVP</button>
						</form>
					</div -->
			</div>		
		</div>	
	    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
            
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>	 
	</body>

</html>