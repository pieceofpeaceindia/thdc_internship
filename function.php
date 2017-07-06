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

	function addaevent(){	
		global $conn;
		$event_theme_name=$_POST['event_name'];
		$event_date=$_POST['event_date'];
		$event_venue=$_POST['event_venue'];
		$sql = "INSERT INTO eventdetails(event_theme_name,event_date,event_venue) 
				VALUES('$event_theme_name', '$event_date', '$event_venue')";

		if ($conn->query($sql) === TRUE) 
		{
			$outputevent="Event added successfully";
		    echo $outputevent;
		    $resetguest= "UPDATE guestdetails
		    			SET guestrespone='PENDING', random_token='' ";
		    if($conn->query($resetguest)===TRUE){
		    	$x="done";
		    }
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
			}
	$conn->close();
	}

	function addaguest(){
		$output ='';
		global $conn;
		$guest_name= mysqli_real_escape_string($conn, $_POST["guest_name"]);
		$email_guest= mysqli_real_escape_string($conn, $_POST["guest_email"]);
		$guest_contact_number= mysqli_real_escape_string($conn, $_POST["contact"]);
		if (!filter_var($email_guest, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format"; 
		  die($emailErr);
		}
		$qry= "SELECT email,phone
			FROM guestdetails
			WHERE email='$email_guest' OR phone='$guest_contact_number' ";
		$qury= "SELECT apply_email,apply_number
			FROM applyguests
			WHERE apply_email='$email_guest' OR apply_number='$guest_contact_number' ";	
		$resulta=mysqli_query($conn,$qry);
		$resultb=mysqli_query($conn,$qury);	
		if (mysqli_num_rows($resulta)>0)  {
			// echo "Data is already registered";
			die($guest_name." already Added in Guest list");
		}
		if (mysqli_num_rows($resultb)>0){
			die($guest_name." has applied for the event");
		}
		$sqla = "INSERT INTO guestdetails (email,guestname,phone,guestrespone) 
				VALUES('$email_guest', '$guest_name', '$guest_contact_number','PENDING')";


		if ($conn->query($sqla) === TRUE) {
			$output="Guest added successfully";
		    echo $output;
		}else{
				echo "Error: " . $sqla . "<br>" . $conn->error;
		    }
		$conn->close();
	}

	function updatedetails() {
		global $conn;
		$email_guest=@$_POST['email_guest'];
		$q= "SELECT * FROM guestdetails
			WHERE email='$email_guest' ";
		$p= "SELECT * FROM guestdetails
			WHERE guestrespone='CONFIRM' AND email='$email_guest' ";
		$resultofp=mysqli_query($conn,$p);
		if(mysqli_num_rows($resultofp)>0){
			die("<span class='text-danger'>YOUR RESPONSE IS ALREADY REGISTERED TO US</span>");
		}				
		$result=mysqli_query($conn,$q);
		if (mysqli_num_rows($result)>0)  {
			$row = $result->fetch_assoc();
			$confirmcode=md5(uniqid(rand()));
			$guestemail=$row["email"];
			$guestname=$row["guestname"];
			$guestphone=$row["phone"];
			$encryptedconfirmcode=base64_encode($confirmcode);
			echo "<a target='_blank' href='http://localhost/internshiprsvp/rsvp.php/?passkey=$encryptedconfirmcode'>Click Here to Confirm Details</a>";
			$updatequery="UPDATE guestdetails
							SET random_token='$confirmcode' 
							WHERE email='$email_guest' ";
			mysqli_query($conn,$updatequery);				
		} else {
			 echo "<span class='text-danger'>THANK YOU !! BUT YOU ARE NOT REGISTERED TO US! HAVE A GOOD TIME</span>";
		}		
		$conn->close();	
	}

	function forget_password() {
		global $conn;
		$email_guest=@$_POST['email_guest'];
		$no=$_POST['guest_contact_number'];
		if (!filter_var($email_guest, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format"; 
		  die($emailErr);
		}
		$q= "SELECT email,phone
			FROM guestdetails
			WHERE email='$email_guest' AND phone='$no' ";
		$result=mysqli_query($conn,$q);	
		if (mysqli_num_rows($result)>0)  {
			$sqlb = " UPDATE guestdetails
			SET  guestrespone='CONFIRM'
			WHERE email='$email_guest' ";	
			if ($conn->query($sqlb) === TRUE) {
				$row = $result->fetch_assoc();
			    die("THANK YOU FOR YOUR PRECIOUS TIME TO RESPONSE TO US");	
			}else{
						echo "Error: " . $sqlb . "<br>" . $conn->error;
			}
		} else {
			echo "THANK YOU, BUT YOU ARE NOT REGISTERED TO US! HAVE A GOOD TIME";
		}		
		$conn->close();	
	}

	function apply(){
		global $conn;
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
		$resulta=mysqli_query($conn,$qry);
		$resultb=mysqli_query($conn,$qury);	
		if ((mysqli_num_rows($resulta)>0)||(mysqli_num_rows($resultb)>0))  {
			// echo "Data is already registered";
			die("Already Registered");
		}	
		$sqlq= "INSERT INTO applyguests(apply_email,apply_name,apply_number,status) VALUES('$email','$name','$number','REQUESTED')";

		if ($conn->query($sqlq) === TRUE) {
			$output="THANK YOU FOR REGISTER WE WILL SHORTLY CONNECT TO YOU";
		    die($output);
		}else{
				echo "Error: " . $sqlq . "<br>" . $conn->error;
		    }
		$conn->close();
	}

	function current_event(){
			$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "internrsvp";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT event_theme_name, event_date, event_venue FROM eventdetails
			ORDER BY id DESC";
		$result = mysqli_query($conn,$sql);
		if ($result->num_rows > 0) 
			{
		    $row = $result->fetch_assoc();
		    	echo "<table class='table table-bordered text-center' style='font-family:monospace; background-color: #e3f2fd;'>";
		    	echo "<thead>";
		    	echo "</thead>";
		    	echo "<tbody>";
		    	echo "<tr>";
		    	echo "<td style='font-size:25px;'>";
		    		echo "Theme of the &quot;SOIREE&quot; is ".$row["event_theme_name"];
		   			echo "</td>";
		   		echo "</tr>";
		   		echo "<tr style='font-size:25px;'>";
		   			echo "<td>";
	    			echo "<i class='fa fa-calendar' aria-hidden='true'></i>&nbsp;".$row["event_date"];
	    			echo"</td>";
	    		echo "</tr>";
	    		echo "<tr style='font-size:25px;'>";
	    			echo "<td>";
	    			echo "<i class='fa fa-map-marker' aria-hidden='true'></i>&nbsp;".$row["event_venue"];
	    			echo "</td>";
	    		echo "</tr>";
	    		echo"</tbody>";
	    		echo "</table>";
			} else {
		    echo "0 results";
		}
		$conn->close();
	}

	function guests_list()
	{
		global $conn;
		$output = ''; 
		$procedure = "
			CREATE PROCEDURE selectguest()
			BEGIN  
				SELECT email,guestname,phone,guestrespone FROM guestdetails WHERE guestrespone='CONFIRM' ORDER BY id DESC;
			END;
		";
		if(mysqli_query($conn, "drop PROCEDURE IF EXISTS selectguest")){
			if (mysqli_query($conn,$procedure)) {
				$query ="CALL selectguest()";
				$result1= mysqli_query($conn,$query);
				$output .='
						<table class="table table-bordered table-striped table-fixed">
							<thead class="bg-secondary">
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
									<td colspan="5">None of your guest responed till now</td>
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
		global $conn;
		$output = ''; 
		$procedure = "
			CREATE PROCEDURE select_apply_guest()
			BEGIN  
				SELECT * FROM applyguests ORDER BY apply_id DESC;
			END;
		";
		if(mysqli_query($conn, "drop PROCEDURE IF EXISTS select_apply_guest")){
			if (mysqli_query($conn,$procedure)) {
				$query ="CALL select_apply_guest()";
				$result= mysqli_query($conn,$query);
				$output .='
						<table class="table table-bordered table-striped">
							<thead class="bg-secondary">
								<tr>	
									<th width="20%">Name</th>
									<th width="20%">Email</th>
									<th width="20%">Contact No</th>
									<th width="20%">Status</th>
									<th width="20%">Action</th>
								</tr>
							</thead>
							<tbody>	
				';
    			if (mysqli_num_rows($result) > 0){
					while ($row=mysqli_fetch_array($result)) {
						if($row["status"]==="REQUESTED"){
						$output .='
								<tr>
									<td>'.$row["apply_name"].'</td>
									<td>'.$row["apply_email"].'</td>
									<td>'.$row["apply_number"].'</td>
									<td>'.$row["status"].'</td>
									<td><button type="button" name="add" id="'.$row["apply_id"].'" class="btn btn-success btn-sm accept">Approve</button> &nbsp; 
									<button type="button" name="reject" id="'.$row["apply_id"].'" class="btn btn-danger btn-sm reject">Reject</button></td>
								</tr>
						';
						}else{
						$output .='
								<tr>
									<td>'.$row["apply_name"].'</td>
									<td>'.$row["apply_email"].'</td>
									<td>'.$row["apply_number"].'</td>
									<td>'.$row["status"].'</td>
									<td><button type="button" name="add" id="'.$row["apply_id"].'" class="btn btn-success btn-sm accept">Approve</button></td>
								</tr>';							

						}
					}
				}else{

					$output .='
								<tr>
									<td colspan="5">No request yet</td>
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
	    $outpu ='';
	    global $conn;
	    $sql = "SELECT id,event_theme_name, event_date, event_venue FROM eventdetails
	        	ORDER BY id DESC";
	    $result = $conn->query($sql);            
	    $outpu .='
    			<table class="table table-striped table-bordered">
        			<thead class="bg-info">
            			<tr>
			                <th style="text-align: center">EVENT THEME</th>
			                <th style="text-align: center">EVENT DTAE</th>
			                <th style="text-align: center">EVENT VENUE</th>
			                <th style="text-align: center">UPDATE / DELETE</th>
			            </tr>
			        </thead>
					<tbody style="text-align: center">';
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) 
                {
                $outpu .='<tr>
	                    	<td>'.$row["event_theme_name"].'</td>
	                    	<td>'.$row["event_date"].'</td>
	                    	<td>'.$row["event_venue"].'</td>
	                    	<td><button type="button" class="update btn btn-warning" data-toggle="modal" data-target="#update_event" id="'.$row["id"].'">UPDATE</button>&nbsp;
	                    		<button type="button" class="delete btn btn-danger" id="'.$row["id"].'">DELETE</button></td>
		                  </tr>';
                }
            } else{
                $outpu .='<tr>
            				<td colspan="4">No event detail present in database</td>
            			  </tr>';	
            }
              $outpu .='</tbody>
            		</table>';
            echo $outpu ;
            $conn->close();
	}

	function decline_request(){
		global $conn;
		$applyd= mysqli_real_escape_string($conn, $_POST["applyid"]);
		$sql= "SELECT * FROM applyguests
				WHERE apply_id='$applyd' ";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		$name =$row["apply_name"];
		$email=$row["apply_email"];
		$number=$row["apply_number"];
		$status=$row["status"];
		if($status==="REQUESTED"){
		$sql8= "UPDATE applyguests
				SET status='REJECTED'
				WHERE apply_id='$applyd'";		
		mysqli_query($conn,$sql8);		
		echo $name." request has been rejected";
		}else{
			echo $name." already Rejected";
		}	
		$conn->close();
	}		
 
	function approve_request(){
		global $conn;
		$applyd= mysqli_real_escape_string($conn, $_POST["applyid"]);
		$sqla= "SELECT apply_id,apply_name,apply_email,apply_number
				FROM applyguests
				WHERE apply_id='$applyd' ";
		$result=mysqli_query($conn,$sqla);
		$row=mysqli_fetch_assoc($result);
		$name =$row["apply_name"];
		$email=$row["apply_email"];
		$number=$row["apply_number"];		
		$sqlc = "INSERT INTO guestdetails (email,guestname,phone,guestrespone) 
				VALUES('$email', '$name', '$number','PENDING')";		
		mysqli_query($conn,$sqlc);		
		echo $name." request has been accepted";
		$sqlb ="DELETE FROM applyguests
		WHERE apply_id='$applyd'";
		mysqli_query($conn,$sqlb);						
		$conn->close();
	}	
	
	function show_pending_guest()
	{
		global $conn;
		$output = ''; 
		$procedure = "
			CREATE PROCEDURE selectaguest()
			BEGIN  
				SELECT email,guestname,phone,guestrespone FROM guestdetails WHERE guestrespone='PENDING' ORDER BY id DESC;
			END;
		";
		if(mysqli_query($conn, "drop PROCEDURE IF EXISTS selectaguest")){
			if (mysqli_query($conn,$procedure)) {
				$query ="CALL selectaguest()";
				$result1= mysqli_query($conn,$query);
				$output .='
						<table class="table table-bordered table-striped table-fixed">
							<thead class="bg-secondary">
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
									<td colspan="5">No pending guests</td>
								</tr>
					';
				}
				$output .='</tbody>
						</table>';
				echo $output;
			}
		}						
	}

	function update_event_details()
	{
		global $conn;
		$updateid= mysqli_real_escape_string($conn, $_POST["updateid"]);
		$sqls = "SELECT * FROM eventdetails WHERE id='$updateid' ";
		$results =mysqli_query($conn,$sqls);
		$row=mysqli_fetch_assoc($results);
		$event_name=$row["event_theme_name"];
		$event_date=$row["event_date"];
		$event_venue=$row["event_venue"];
		echo $event_name."!".$event_venue."!".$event_date."!".$updateid;
	}

	function updateevent()
	{
		global $conn;
		$theme_name=$_POST['update_event_name'];
		$date=$_POST['update_event_date'];
		$venue=$_POST['update_event_venue'];
		$id=$_POST['dataid'];
		$sql = "UPDATE eventdetails
			SET  event_theme_name='$theme_name',event_date='$date',event_venue='$venue'
			WHERE id='$id' ";
		if ($conn->query($sql) === TRUE) 
		{
			$output="Event updated successfully";
		    die($output);
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
			}
	$conn->close();
	}

	function delete_event(){
		global $conn;
		$deleteid= mysqli_real_escape_string($conn, $_POST["deleteid"]);
		$deleteevent = "DELETE FROM eventdetails WHERE id='$deleteid' ";
		if ($conn->query($deleteevent)===TRUE){
			echo "EVENT DELETE SUCCESSFULLY";
		}
	$conn->close();	
	}

	function do_rsvp(){
		global $conn;
		$id_guest=$_POST['guestid'];	
		$updatestatus=" UPDATE guestdetails
						SET guestrespone='CONFIRM'
						WHERE id='$id_guest' ";				
		if(mysqli_query($conn,$updatestatus)===TRUE){
			echo "<h4 class='text-center text-success'>YOUR RESPONSE IS SUCCESSFULLY UPDATED <br><a role='button' class='btn btn-warning' href='http://localhost/internshiprsvp/'><i class='fa fa-check-square-o' aria-hidden='true'></i>HOME</a></h4>";
		}else{
			echo "error";
		}	
	}

	function fetch_month(){
	global $conn;
	$sql = "SELECT event_theme_name, event_date, event_venue FROM eventdetails
		ORDER BY id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
		{
	    $row = $result->fetch_assoc();
	    	$date = $row["event_date"];
			$year = date('Y', strtotime($date));
			$month = date('F', strtotime($date));
			echo $month;
	}
	$conn->close();
	}

?>