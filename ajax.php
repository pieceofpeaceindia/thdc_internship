<?php
	require_once "function.php";
	if(isset($_POST["action"]))
	{
		switch ($_POST["action"])
		{
			case 'addevent':
				print json_encode(addaevent($_POST["event_name"],$_POST["event_date"],$_POST["event_venue"]));
				break;
			case 'addguest':
				addaguest();
				break;
			case 'rsvp':
				updatedetails($_POST["email_guest"]);
				 break;
			case 'forgot':	
				print json_encode(forget_password($_POST["email_guest"],$_POST["guest_contact_number"])); 
				break;
			case 'applyguest':
				print json_encode(apply($_POST["apply_email"],$_POST["apply_name"],$_POST["apply_contact_number"]));	
			case 'accept':
				approve_request($_POST["applyid"]);
				break;
			case 'reject':
				decline_request($_POST["applyid"]);
				break;
			case 'selectguest':
				guests_list();
				break;
			case 'selectapplyguest':
				apply_guests_list();
				break;
			case 'selectevent':
				show_all_events();
				break;
			case 'pendingguest':
				show_pending_guest();
				break;
			case 'declineguest':
				show_decline_guest();
				break;
			case 'updateevent':
				update_event_details($_POST["updateid"]);
				break;
			case 'deleteevent':
				delete_event($_POST["deleteid"]);
				break;
			case 'updateeventdetail':
				updateevent($_POST["update_event_name"],$_POST["update_event_date"],$_POST["update_event_venue"]);				
				break;
			case 'confirm':
				die("here");
				confirm_response($_POST["nameofguest"],$_POST["emailofguest"],$_POST["noofguest"],$_POST["idofguest"]);
				break;
			case 'dorsvp':
				do_rsvp($_POST["confirm_name"],$_POST["confirm_email"],$_POST["confirm_phone"],$_POST["guestid"]);
				break;												
			default:
				echo "invalid";
				break;
		}
	}
?>