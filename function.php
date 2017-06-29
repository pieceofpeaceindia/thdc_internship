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
	$output ='';
	$conn= mysqli_connect("localhost","root","","internrsvp");
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "internrsvp";

	$conna = new mysqli($servername, $username, $password, $dbname);
	if ($conna->connect_error) 
	{
	    die("Connection failed: " . $conna->connect_error);
	}
	$guest_name= mysqli_real_escape_string($conna, $_POST["guest_name"]);
	$email_guest= mysqli_real_escape_string($conna, $_POST["guest_email"]);
	$guest_contact_number= mysqli_real_escape_string($conna, $_POST["contact"]);
	if (!filter_var($email_guest, FILTER_VALIDATE_EMAIL)) {
	  $emailErr = "Invalid email format"; 
	  die($emailErr);
	}
	$sqla = "INSERT INTO guestdetails (email,guestname,phone,guestrespone) 
			VALUES('$email_guest', '$guest_name', '$guest_contact_number','PENDING')";


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
		    	echo "<table class='table table-bordered' style='background-color: #e3f2fd;''>";
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

	function guests_list()
	{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "internrsvp";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$output = ''; 
	$procedure = "
		CREATE PROCEDURE selectguest()
		BEGIN  
			SELECT email,guestname,phone,guestrespone FROM guestdetails ORDER BY id DESC;
		END;
		";
		if(mysqli_query($conn, "drop PROCEDURE IF EXISTS selectguest")){
			if (mysqli_query($conn,$procedure)) {
				$query ="CALL selectguest()";
				$result1= mysqli_query($conn,$query);
				$output .='
						<table class="table table-bordered table-striped table-fixed">
							<thead class="bg-warning">
								<tr>	
									<th width="20%">Name</th>
									<th width="20%">Email</th>
									<th width="20%">Contact No</th>
									<th width="20%">Status</th>
								</tr>
							</thead>
							<tbody>	
				';
				if (mysqli_num_rows($result1)>0) {
					while ($row=mysqli_fetch_array($result1)) {
						$output .='
								<tr>
									<td>'.$row["guestname"].'</td>
									<td>'.$row["email"].'</td>
									<td>'.$row["phone"].'</td>
									<td>'.$row["guestrespone"].'</td>
								</tr>
						';
					}
				}else{

					$output .='
								<tr>
									<td colspan="5">No Data Found</td>
								</tr>
					';
				}
				$output .='</tbody>
						</table>';
				echo $output;
			}
		}						
	}

	function apply_guests_list()
	{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "internrsvp";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$output = ''; 
	$procedure = "
		CREATE PROCEDURE select_apply_guest()
		BEGIN  
			SELECT apply_id,apply_email,apply_name,apply_number FROM applyguests ORDER BY apply_id DESC;
		END;
		";
		if(mysqli_query($conn, "drop PROCEDURE IF EXISTS select_apply_guest")){
			if (mysqli_query($conn,$procedure)) {
				$query ="CALL select_apply_guest()";
				$result= mysqli_query($conn,$query);
				$output .='
						<table class="table table-bordered table-striped">
							<thead class="bg-warning">
								<tr>	
									<th width="20%">Name</th>
									<th width="20%">Email</th>
									<th width="20%">Contact No</th>
									<th colspan="2">Action</th>
								</tr>
							</thead>
							<tbody>	
				';
    			if (mysqli_num_rows($result) > 0){
					while ($row=mysqli_fetch_array($result)) {
						$output .='
								<tr>
									<td>'.$row["apply_name"].'</td>
									<td>'.$row["apply_email"].'</td>
									<td>'.$row["apply_number"].'</td>
									<td><button type="button" name="add" id="'.$row["apply_id"].'" class="btn btn-success accept">Accept</button> &nbsp; 
									<button type="button" name="reject" id="'.$row["apply_id"].'" class="btn btn-danger reject">Reject</button></td>
								</tr>
						';
					}
				}else{

					$output .='
								<tr>
									<td colspan="5">No Data Found</td>
								</tr>
					';
				}
				$output .='</tbody>
						</table>';
				echo $output;
			}
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

	function approve_request(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "internrsvp";

		$conna = new mysqli($servername, $username, $password, $dbname);
		if ($conna->connect_error) 
		{
		    die("Connection failed: " . $conna->connect_error);
		}
		$applyd= mysqli_real_escape_string($conna, $_POST["applyid"]);
		$sql= "SELECT apply_id,apply_name,apply_email,apply_number
				FROM applyguests
				WHERE apply_id='$applyd' ";
		$result=mysqli_query($conna,$sql);
		$row=mysqli_fetch_assoc($result);
		$name =$row["apply_name"];
		$email=$row["apply_email"];
		$number=$row["apply_number"];
		$sqlb ="DELETE FROM applyguests
				WHERE apply_id='$applyd'";
		mysqli_query($conna,$sqlb);		
		echo $name." request has been rejected";						
		$conna->close();
	}		

	// if (isset($_POST["actn"])=="accept") 
		function decline_request(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "internrsvp";

		$conna = new mysqli($servername, $username, $password, $dbname);
		if ($conna->connect_error) 
		{
		    die("Connection failed: " . $conna->connect_error);
		}
		$applyd= mysqli_real_escape_string($conna, $_POST["applyid"]);
		$sqla= "SELECT apply_id,apply_name,apply_email,apply_number
				FROM applyguests
				WHERE apply_id='$applyd' ";
		$result=mysqli_query($conna,$sqla);
		$row=mysqli_fetch_assoc($result);
		$name =$row["apply_name"];
		$email=$row["apply_email"];
		$number=$row["apply_number"];		
		$sqlc = "INSERT INTO guestdetails (email,guestname,phone,guestrespone) 
				VALUES('$email', '$name', '$number','CONFIRM')";
		// die($sqlc);		
		mysqli_query($conna,$sqlc);		
		echo $name." request has been accepted";
		$sqlb ="DELETE FROM applyguests
		WHERE apply_id='$applyd'";
		mysqli_query($conna,$sqlb);						
		$conna->close();
	}		
?>