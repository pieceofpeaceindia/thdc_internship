<!DOCTYPE html>
<html lang="en">
<head>
    <title>CONFIRMATION PAGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style type="text/css">
    	.btn:hover{
    		cursor: pointer;
    	}
    	a:hover{
    		cursor: pointer;
    		background-color:#AAB5FE;
    	}
    </style>    
</head>

<body>
	<nav class="navbar navbar-inverse bg-primary">
        <a class="navbar-brand" href="http://coloredcow.com" target="_blank" style="font-size:20px;color:black">ColoredCow</a>
    </nav>
	<?php
		$output='';
		$output .='<div class="card text-center">
					<img class="card-img-top" src="http://localhost/internshiprsvp/logo.png" alt="ColoredCow logo" style="width: 20rem; margin:auto;">';

		// $key="hash121015@+-*/";
		if(isset($_GET["passkey"])){
			$recievedcode=$_GET['passkey'];
			$decryptedcode=base64_decode($recievedcode);
			// die($encrypted);	
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "internrsvp";
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) 
			{
			    die("Connection failed: " . $conn->connect_error);
			}

			$sql =" SELECT * FROM guestdetails
					WHERE random_token='$decryptedcode' ";		 		
			$result=mysqli_query($conn,$sql);
			$row = $result->fetch_assoc();
				$output .='<h4 class="card-title text-center text-warning">THANK YOU</h4>
							<p class="card-text text-primary text-center">'.$row["guestname"].' for your precious time to response to us<p>
							<div class="card-block">
								<form id="confirm_details_form" class="text-center">
									<label class="text-danger">NAME:</label>
									<br>
									<input type="text" id="confirm_name" name="confirm_name" value="'.$row["guestname"].'" class="form-group col-3 col-md-3 col-sm-6 col-xs-12" readonly>
									<br>
									<label class="text-danger">E-MAIL:</label>
									<br>
									<input type="email" id="confirm_nemail" name="confirm_email" value="'.$row["email"].'" class="form-group col-3 col-md-3 col-sm-6 col-xs-12" readonly>
									<br>
									<label class="text-danger">CONTACT NUMBER:	</label>
									<br>
									<input type="tel" id="confirm_phone" name="confirm_phone" value="'.$row["phone"].'" class="form-group col-3 col-md-3 col-sm-6 col-xs-12" readonly>
									<br>
									<input type="hidden" id="guestid" name="guestid" value="'.$row["id"].'">
									<input type="button" class="btn btn-success" id="confirm_rsvp" value="RSVP">
								</form>
								<br>
								<p id="confirm_msg"></p>
							</div>
						</div>';			
		}else {
			$output .='<h4 class="card-title text-danger">WARNING</h4>
							<p class="card-text text-warning">ONLY SPECIFIC USER ARE AUTHORIZED TO THIS PAGE THANK YOU<p>
							<div class="card-block">
							   	<a class="btn btn-success" href="http://localhost/internshiprsvp/index.php">HOME</a>
							</div>
						</div>';			
		}
		echo $output;
	?>		  
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){	
    $("#confirm_rsvp").click(function(){
        var confirmform=$('#confirm_details_form');
        if(!confirmform[0].checkValidity()){
            confirmform[0].reportValidity();
            return;
        }
        var confirmdata='action=dorsvp&'+$('#confirm_details_form').serialize();
        console.log(confirmdata);
        $.ajax({
            type: "POST",
            url: "http://localhost/internshiprsvp/ajax.php",
            data:confirmdata,
            success: function(result){
                document.getElementById('confirm_details_form').reset();
                $('#confirm_msg').html(result);
            }
        })
    });
});
</script>
</html>