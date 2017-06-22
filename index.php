<!DOCTYPE html>
<html lang="en">
    <head>
        <title>DashBoard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    </head>
  
    <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary ">    
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="http://coloredcow.com" target="_blank">ColoredCow</a>
            <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#party">Add Party</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#addguest">Add Guest</a>
                    </li>
                    <li class="nav-item active">
                       <a class="nav-link" href="viewguest.php">View Guest Details</a>
                    </li>
                </ul>
             </div> -->
        </nav> 
        
        <div class="container">
            <br>
                <div class="container form-group row">
                    <div class="col-6 bg-faded">
                    <br>
                        <h2 id="party" class="text-secondary">ADD EVENT</h2>
                            <form  method="post" id="event_form">          
                                <div class="form-group row">
                                    <label for="theme_name" class="col-12 col-xs-4 col-sm-6 col-md-5 col-form-label ">Theme Name</label>
                                        <div class="col-12 col-xs-4 col-sm-6 col-md-5">
                                            <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Theme Name">
                                        <p id="validate_theme" class="text-danger"></p>   
                                        </div>
                                    <label for="date" class="col-12 col-xs-4 col-sm-6 col-md-5 col-form-label">Date</label>
                                        <div class="col-12 col-xs-4 col-sm-6 col-md-5">
                                            <input type="date" class="form-control" name="event_date" id="event_date">
                                        <p id="validate_date" class="text-danger"></p>
                                        </div>
                                    <label for="venue" class="col-12 col-xs-4 col-sm-6 col-md-5 col-form-label">Venue</label>
                                        <div class="col-12 col-xs-4 col-sm-6 col-md-5">
                                            <input type="text" class="form-control" id="event_venue" name="event_venue" placeholder="Venue">
                                        <p id="validate_venue" class="text-danger"></p>
                                        </div>
                                </div>
                                <button type="button" class="btn btn-primary" name="select" value="selectevent" id="addingevent">Add Event</button>
                            </form>
                    </div>
                        <br/><br/ >
                    <div class="col-6 bg-faded">
                        <br>
                        <h2 id="addguest" class="text-secondary">ADD GUESTS</h2>
                        <form method="post" id="guest_form" >     
                            <div class="form-group row">
                                <label for="Email" class="col-xs-4 col-sm-6 col-md-5 col-form-label">Email address</label>
                                    <div class="col-12 col-xs-6 col-sm-6 col-md-5">
                                        <input type="email" class="form-control" id="email_guest" placeholder="Enter email" name="email_guest">
                                        <p id="validate_email" class="text-danger"></p>
                                    </div>
                                <label for="guestname" class="col-xs-4 col-sm-6 col-md-5 col-form-label">Name Of The Guest</label>
                                    <div class="col-xs-6 col-sm-6 col-md-5">
                                       <input type="text" class="form-control required" id="guest_name" placeholder="Guest Name" name="guest_name">
                                       <p id="validate_name" class="text-danger"></p>
                                    </div>
                                <label for="contact_number" class="col-xs-4 col-sm-6 col-md-5 col-form-label">Phone No.</label>
                                    <div class="col-12 col-xs-6 col-sm-6 col-md-5">
                                       <input type="number" class="form-control required" id="guest_contact_number" placeholder="Contact Number" name="guest_contact_number">
                                       <p id="validate_no" class="text-danger"></p>
                                    </div>
                            </div>
                            <button type="button" class="btn btn-primary" name="select" value="selectguest" id="addition">Add In List</button>
                        </form>
                        <br> <!-- 
                        <div class="navbar navbar-brand">
                               <span id="show_msg"></span>
                        </div> -->
                    </div>
                </div>
            </div>    
            <div class="container">
                <?php include_once"function.php"; show_guest_details(); ?>
            </div>     

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="main.js"></script>
</html>