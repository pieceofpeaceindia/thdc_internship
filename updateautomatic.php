<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "internrsvp";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$output = ''; 
	if (isset($_POST["action"])) {
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
					// $row_cnt = mysqli_num_rows($result1);
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

?>		