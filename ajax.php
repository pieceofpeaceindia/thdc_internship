<?php
	require_once "function.php";
	if(isset($_POST["action"])){
		switch ($_POST["action"]) {
			case 'addevent':
				print json_encode(addaevent($_POST["event_name"],$_POST["event_date"],$_POST["event_venue"]));
				break;
			case 'addguest':
				print json_encode(addaguest());
				break;
			case 'rsvp':
				print json_encode(updatedetails($_POST["email_guest"]));
				 break;
			case 'forgot':	
				print json_encode(forget_password($_POST["email_guest"],$_POST["guest_contact_number"])); 
				break;
			case 'applyguest':
				print json_encode(apply($_POST["apply_email"],$_POST["apply_name"],$_POST["apply_contact_number"]));	
			case 'reject':
				print json_encode(approve_request($_POST["applyid"]));
				break;
			case 'accept':
				print json_encode(decline_request($_POST["applyid"]));
				break;
			case 'selectguest':
				guests_list();
				break;
			case 'selectapplyguest':
				apply_guests_list();
				break;				
			default:
				echo "invalid";
				break;
		}
	}
?>