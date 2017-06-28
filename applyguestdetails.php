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
	}	
	$conn->close();
?>		