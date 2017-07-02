<!DOCTYPE html>
<html lang="en">
<head>
    <title>CONFIRMATION PAGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>

<body>
	<nav class="navbar navbar-inverse bg-primary">
        <a class="navbar-brand" href="http://coloredcow.com" target="_blank" style="font-size:20px;color:black">ColoredCow</a>
    </nav>
	<?php
		// $key="hash121015@+-*/";
		if(isset($_GET["passkey"])){
			$recievedcode=$_GET['passkey'];
			$output ='';
			$decryptedcode=base64_decode($recievedcode);
			// die($encrypted);	
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "internrsvp";
			$output='';
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) 
			{
			    die("Connection failed: " . $conn->connect_error);
			}
			$sql =" SELECT * FROM guestdetails
					WHERE random_token='$decryptedcode' ";		 		
			$result=mysqli_query($conn,$sql);
			$row = $result->fetch_assoc();
			$updatestatus=" UPDATE guestdetails
							SET guestrespone='CONFIRM'
							WHERE random_token='$decryptedcode' ";
			$resultupdate=mysqli_query($conn,$updatestatus);
			$output .='<div class="card text-center">
							<img class="card-img-top" src="logo.png" alt="Card image cap" style="width: 20rem; margin:auto;">
							<h4 class="card-title">THANK YOU</h4>
							<p class="card-text text-primary">Mr.'.$row["guestname"].' for your precious time to response to us, see you soon.<p>
							<div class="card-block">
							   	<a class="btn btn-success" href="http://localhost/internshiprsvp/index.php">HOME</a>
							</div>
							</center>
						</div>';
			echo $output;			
		}else {
			$outputa='';
			$outputa .='<div class="card text-center">
							<img class="card-img-top" src="logo.png" alt="Card image cap" style="width: 20rem; margin:auto;">
							<h4 class="card-title text-danger">WARNING</h4>
							<p class="card-text text-warning">DONT TRY TO BE SMART AND SPOOF OUR WEBSITE<p>
							<div class="card-block">
							   	<a class="btn btn-success" href="http://localhost/internshiprsvp/index.php">HOME</a>
							</div>
							</center>
						</div>';
			echo $outputa;			
		}
		
	?>		  
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>