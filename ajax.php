<?php
	include "function.php";
	if(isset($_post["action"])){
			switch ($_post["action"]) {
			case 'addevent':
				$status=addaevent($_post["event_name"],$_post["event_date"],$_post["event_venue"]);
				print json_encode($status);
				break;
			case 'addguest':
				$status= addaguest($_post["email_guest"],$_post["guest_name"],$_post["guest_contact_number"]);
				print json_encode($status);
				break;
			case 'rsvp':
				$status= updatedetails($_post["email_guest"]);
				print json_encode($status);
				break;	
			default:
				echo "invalid";
				break;
			}
	}
?>