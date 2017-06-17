<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "internrsvp";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	} 
	$x=$_POST['select'];

	switch ($x) {
		case 'selecttheme':
			addaevent();
			break;
		case 'selectguest':
			addaguest();
			break;
		case 'dorsvp':
			updatedetails();
			break;
		default:
			# code...
			break;
	}

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
		$event_theme_name=$_POST['event_theme_name'];
		$event_date=$_POST['event_date'];
		$event_venue=$_POST['event_venue'];
		$sql = "INSERT INTO eventdetails(event_theme_name,event_date,event_venue) VALUES('$event_theme_name', '$event_date', '$event_venue')";

		if ($conn->query($sql) === TRUE) 
		{
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
			}

		header("refresh:0; url=index.php");
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
		$sqla = "INSERT INTO guestdetails (email,guestname,phone,guestrespone) VALUES('$email_guest', '$guest_name', '$guest_contact_number','PENDING')";


		if ($conna->query($sqla) === TRUE) {
		    echo "New record created successfully";
		}else{
				echo "Error: " . $sqla . "<br>" . $conna->error;
		    }

		header("refresh:1; url=index.php");
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
		$prefrence=$_POST['prefrence'];

		$q= "SELECT email,guestname
			FROM guestdetails
			WHERE email='$email_guest' ";
		echo"<center>";	
		$result=mysqli_query($connb,$q);	
		if (mysqli_num_rows($result)>0)  {
			$sqlb = " UPDATE guestdetails
					  SET guestprefrence='$prefrence' , guestrespone='CONFIRM'
					  WHERE email='$email_guest' ";	
			if ($connb->query($sqlb) === TRUE) {
				$row = $result->fetch_assoc();
			   	echo "THANK YOU "."<strong>".$row["guestname"]."</strong>"." FOR YOUR PRECIOUS TIME TO RESPONSE TO US";	
			}else{
						echo "Error: " . $sqlb . "<br>" . $connb->error;
			}
		} else {
			echo "THANK YOU, BUT YOU ARE NOT REGISTERED TO US! HAVE A GOOD TIME";
		}		

		echo"</center>";
		header("refresh:2; url=rsvp.php");
		$connb->close();	}
?>