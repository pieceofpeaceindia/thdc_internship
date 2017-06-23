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
			$output="Event added successfully";
		    die($output);
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
		$email_guest=@$_POST['guest_email'];
		$guest_name=$_POST['guest_name'];
		$guest_contact_number=$_POST['guest_contact_number'];
		if (!filter_var($email_guest, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format"; 
		  die($emailErr);
		}
		$sqla = "INSERT INTO guestdetails (email,password,guestname,phone,guestrespone) 
				VALUES('$email_guest','abc@123', '$guest_name', '$guest_contact_number','PENDING')";


		if ($conna->query($sqla) === TRUE) {
			$output="Guest added successfully";
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
		  die($emailErr);
		}
		$q= "SELECT email,guestname
			FROM guestdetails
			WHERE email='$email_guest' ";
		$result=mysqli_query($connb,$q);
		if (mysqli_num_rows($result)>0)  {
			$sqlb = " UPDATE guestdetails
			SET  guestrespone='CONFIRM'
			WHERE email='$email_guest' ";	
			if ($connb->query($sqlb) === TRUE) {
				$row = $result->fetch_assoc();
			   	die("THANK YOU FOR YOUR PRECIOUS TIME TO RESPONSE TO US");	
			}else{
						echo "Error: " . $sqlb . "<br>" . $connb->error;
			}
		} else {
			 die("THANK YOU, BUT YOU ARE NOT REGISTERED TO US! HAVE A GOOD TIME");
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
		  die($emailErr);
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
			    die("THANK YOU FOR YOUR PRECIOUS TIME TO RESPONSE TO US");	
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
			echo "<thead class='bg-warning'>";
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
		  die();
		}
		$qry= "SELECT email,phone
			FROM guestdetails
			WHERE email='$email' OR phone='$number' ";
		$qury= "SELECT apply_email,apply_number
			FROM applyguests
			WHERE apply_email='$email' OR apply_number='$number' ";	
		$resulta=mysqli_query($connd,$qry);
		$resultb=mysqli_query($connd,$qury);	
		if ((mysqli_num_rows($resulta)>0)||(mysqli_num_rows($resultb)>0))  {
			// echo "Data is already registered";
			die("Alread Registered");
		}	
		$sqlq= "INSERT INTO applyguests(apply_email,apply_name,apply_number) VALUES('$email','$name','$number')";

		if ($connd->query($sqlq) === TRUE) {
			$output="THANK YOU FOR REGISTER WE WILL SHORTLY CONNECT TO YOU";
		    die($output);
		}else{
				echo "Error: " . $sqlq . "<br>" . $connd->error;
		    }
		$connd->close();
	}

	function current_event(){
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
		    	echo "<table class='table bg-info table-bordered'>";
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
	    		echo "</table>";
			} else {
		    echo "0 results";
		}
		$conn->close();
	}

	function apply_list(){
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "internrsvp";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT apply_email,apply_name,apply_number FROM applyguests";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
        	echo "<table class='table table-striped table-bordered' style='text-align:center'>";
	        	echo "<thead class='bg-warning'>";
	                echo "<tr>";
	                    echo "<th style='text-align:center'>Name</th>";
	                    echo "<th style='text-align:center'>E-Mail</th>";
	                    echo "<th style='text-align:center'>Contact Number</th>";
	                    echo "<th style='text-align:center'>Action</th>";
	                echo "</tr>";
	            echo "</thead>";
	            echo "<tbody>";
			        while($row = $result->fetch_assoc()) 
			            {
			            echo "<tr class='text-primary'>";
			                echo "<td>";
			                    echo $row["apply_name"];
			                echo "</td>";
			                echo "<td>";
			                    echo $row["apply_email"];
			                echo "</td>";
			                echo "<td>";
			                    echo $row["apply_number"];
			                echo "</td>";
			                echo "<td>";
			                    echo "<b>"."<a href='' class='text-success'>"."ADD"."</a>"."&nbsp;"."&nbsp;"."&nbsp;"."<a href='' class='text-danger'>"."REJECT"."</a>"."</b>";
			                echo "</td>";
			            echo "</tr>";
			            }
		        echo "</tbody>";
	        echo "</table>";
        } else {
        echo "No guest Till now";
    }
    $conn->close();
	}

	function show_all_events(){
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "internrsvp";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT event_theme_name, event_date, event_venue FROM eventdetails
        ORDER BY event_date DESC";
    $result = $conn->query($sql);
                
    echo "<table class='table table-striped table-bordered'>";
        echo "<thead class='bg-info'>";
            echo "<tr>";
                echo "<th style='text-align: center'>"."EVENT THEME"."</th>";
                echo "<th style='text-align: center'>"."EVENT DTAE"."</th>";
                echo "<th style='text-align: center'>"."EVENT VENUE"."</th>";
            echo "</tr>";
        echo "</thead>";

        echo "<tbody style='text-align: center'>";
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) 
                {
                echo "<tr>";
                    echo "<td>";
                        echo $row["event_theme_name"];
                    echo "</td>";
                    echo "<td>";
                        echo $row["event_date"];
                    echo "</td>";
                    echo "<td>";
                        echo $row["event_venue"];
                    echo "</td>";
                echo "</tr>";
                }
            } else{
                echo "0 results";
            }
            $conn->close();
        echo "</tbody>";
    echo "</table>";
	}
?>