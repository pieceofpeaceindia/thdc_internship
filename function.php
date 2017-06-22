<?php
	function addaevent(){	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "internrsvp";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		}
		$event_theme_name=$_POST['event_name'];
		$event_date=$_POST['event_date'];
		$event_venue=$_POST['event_venue'];
		$sql = "INSERT INTO eventdetails(event_theme_name,event_date,event_venue) 
				VALUES('$event_theme_name', '$event_date', '$event_venue')";

		if ($conn->query($sql) === TRUE) 
		{
			$output="New record created successfully";
		    echo $output;
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
			}
	$conn->close();
	}

	function addaguest(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "internrsvp";

		$conna = new mysqli($servername, $username, $password, $dbname);
		if ($conna->connect_error) 
		{
		    die("Connection failed: " . $conna->connect_error);
		}
		$email_guest=@$_POST['email_guest'];
		$guest_name=$_POST['guest_name'];
		$guest_contact_number=$_POST['guest_contact_number'];
		if (!filter_var($email_guest, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format"; 
		  echo $emailErr;
		  die;
		}
		$sqla = "INSERT INTO guestdetails (email,password,guestname,phone,guestrespone) 
				VALUES('$email_guest','abc@123', '$guest_name', '$guest_contact_number','PENDING')";


		if ($conna->query($sqla) === TRUE) {
			$output="New record created successfully";
		    echo $output;
		}else{
				echo "Error: " . $sqla . "<br>" . $conna->error;
		    }
		$conna->close();
	}

	

	function updatedetails() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "internrsvp";

		$connb = new mysqli($servername, $username, $password, $dbname);
		if ($connb->connect_error) 
		{
		    die("Connection failed: " . $connb->connect_error);
		}
		$email_guest=@$_POST['email_guest'];
		$password1=$_POST['guest_password'];
		if (!filter_var($email_guest, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format"; 
		  echo $emailErr;
		  die;
		}
		$q= "SELECT email,guestname
			FROM guestdetails
			WHERE email='$email_guest' AND password='$password1' ";
		$result=mysqli_query($connb,$q);
		if (mysqli_num_rows($result)>0)  {
			$sqlb = " UPDATE guestdetails
			SET  guestrespone='CONFIRM'
			WHERE email='$email_guest' ";	
			if ($connb->query($sqlb) === TRUE) {
				$row = $result->fetch_assoc();
			   	echo "THANK YOU FOR YOUR PRECIOUS TIME TO RESPONSE TO US";	
			}else{
						echo "Error: " . $sqlb . "<br>" . $connb->error;
			}
		} else {
			echo "THANK YOU, BUT YOU ARE NOT REGISTERED TO US! HAVE A GOOD TIME";
		}		
		$connb->close();	
	}

	function forget_password() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "internrsvp";

		$connb = new mysqli($servername, $username, $password, $dbname);
		if ($connb->connect_error) 
		{
		    die("Connection failed: " . $connb->connect_error);
		}
		$email_guest=@$_POST['email_guest'];
		$no=$_POST['guest_contact_number'];
		if (!filter_var($email_guest, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format"; 
		  echo $emailErr;
		  die;
		}
		$q= "SELECT email,phone
			FROM guestdetails
			WHERE email='$email_guest' AND phone='$no' ";
		$result=mysqli_query($connb,$q);	
		if (mysqli_num_rows($result)>0)  {
			$sqlb = " UPDATE guestdetails
			SET  guestrespone='CONFIRM'
			WHERE email='$email_guest' ";	
			if ($connb->query($sqlb) === TRUE) {
				$row = $result->fetch_assoc();
			   	echo "THANK YOU FOR YOUR PRECIOUS TIME TO RESPONSE TO US";	
			}else{
						echo "Error: " . $sqlb . "<br>" . $connb->error;
			}
		} else {
			echo "THANK YOU, BUT YOU ARE NOT REGISTERED TO US! HAVE A GOOD TIME";
		}		
		$connb->close();	
	}

	function show_guest_details(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "internrsvp";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT email,guestname,phone,guestrespone FROM guestdetails";
		$result = $conn->query($sql);
		echo "<table class='table table-striped table-bordered' style='text-align:center'>";
			echo "<thead class='bg-success'>";
				echo "<tr>";
					echo "<th style='text-align:center'>"."Guest Name"."</th>";
					echo "<th style='text-align:center'>"."Response."."</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			if ($result->num_rows > 0) 
				{
			    while($row = $result->fetch_assoc()) 
			    	{
			    	echo "<tr class='text-primary'>";
			    		echo "<td>";
			    			echo $row["guestname"];
			    		echo "</td>";
			    		echo "<td>";
			    			echo $row["guestrespone"];
			    		echo "</td>";
			    	echo "</tr>";
			        }
				} else {
			    echo "No guest Till now";
			}
			$conn->close();
			echo "</tbody>";
		echo "</table>";
	}

	function apply(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "internrsvp";

		$connd = new mysqli($servername, $username, $password, $dbname);
		if ($connd->connect_error) 
		{
		    die("Connection failed: " . $connd->connect_error);
		}
		$email=@$_POST['apply_email'];
		$name=$_POST['apply_name'];
		$number=$_POST['apply_contact_number'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format"; 
		  echo $emailErr;
		  die;
		}
		$sqlq= "INSERT INTO applyguests(apply_email,apply_name,apply_number) VALUES('$email','$name','$number')";

		if ($connd->query($sqlq) === TRUE) {
			$output="New record created successfully";
		    echo $output;
		}else{
				echo "Error: " . $sqlq . "<br>" . $connd->error;
		    }
		$connd->close();
	}
?>