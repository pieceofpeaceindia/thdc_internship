<?php
	include "function.php";
	if(isset($_POST["action"])){
		switch ($_POST["action"]) {
			case 'addevent':
				print json_encode(addaevent($_POST["event_name"],$_POST["event_date"],$_POST["event_venue"]));
				break;
			case 'addguest':
				print json_encode(addaguest($_POST["email_guest"],$_POST["guest_name"],$_POST["guest_contact_number"]));
				break;
			case 'rsvp':
				 print json_encode(updatedetails($_POST["email_guest"]));
				 break;
			default:
				echo "invalid";
				break;
		}
	}
?>