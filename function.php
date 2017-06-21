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
		$sqla = "INSERT INTO guestdetails (email,guestname,phone,guestrespone) 
				VALUES('$email_guest', '$guest_name', '$guest_contact_number','PENDING')";


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
		if (!filter_var($email_guest, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format"; 
		  echo $emailErr;
		  die;
		}
		$q= "SELECT email,guestname
			FROM guestdetails
			WHERE email='$email_guest' ";
		$result=mysqli_query($connb,$q);
		var_dump("hello");	
		if (mysqli_num_rows($result)>0)  {
			$sqlb = " UPDATE guestdetails
			SET  guestrespone='CONFIRM'
			WHERE email='$email_guest' ";	
			if ($connb->query($sqlb) === TRUE) {
				$row = $result->fetch_assoc();
			   	echo "THANK YOU ".$row["guestname"]." FOR YOUR PRECIOUS TIME TO RESPONSE TO US";	
			}else{
						echo "Error: " . $sqlb . "<br>" . $connb->error;
			}
		} else {
			echo "THANK YOU, BUT YOU ARE NOT REGISTERED TO US! HAVE A GOOD TIME";
		}		
		$connb->close();	
	}
?>