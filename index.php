<!DOCTYPE html>
<html lang="en">
  
  <head>
        <!-- Required meta tags -->
        <title>DashBoard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

       <!--  <script type="text/javascript" src="main.js"></script> -->
  </head>
  
  <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary ">    
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="http://coloredcow.com" target="_blank">ColoredCow</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
             </div>
        </nav> 
        
        <div class="container-fluid">
            <br/>
                <div class="container">
                    <h2 id="party">ADD EVENT</h2>
                        <form action="function.php" method="post">          
                                <div class="form-group row">
                                        <label for="event_name" class="col-8 col-form-label ">Theme Name</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="event_name" name="event_theme_name" placeholder="Theme Name">
                                            </div>
                                        <label for="date" class="col-8 col-form-label">Date</label>
                                            <div class="col-12">
                                                <input type="date" class="form-control" name="event_date" id="date">
                                            </div>
                                        <label for="venue" class="col-8 col-form-label">Venue</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="venue" name="event_venue" placeholder="Venue">
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="select" value="selecttheme">Submit</button>
                        </form>
                </div>
                <br/><br/ >
                <div class="container">
                    <h2 id="addguest">GUESTS</h2>
                        <form action="function.php" method="post">     
                           <!--  <div class="form-check">
                                    <label for="allGuest" class="form-check-label">
                                    <input type="checkbox" class="checkbox">
                                    All
                                    </label>
                            </div> -->
                            <div class="form-group row">
                                    <label for="Email" class="col-8 col-form-label">Email address</label>
                                    <div class="col-12">
                                        <input type="email" class="form-control" id="email_guest" placeholder="Enter email" name="email_guest">
                                    </div>
                                    <label for="guestname" class="col-8 col-form-label">Name Of The Guest</label>
                                    <div class="col-12">
                                       <input type="text" class="form-control" id="guestname" placeholder="Guest Name" name="guest_name">
                                    </div>
                                    <label for="contact_number" class="col-8 col-form-label">Phone No.</label>
                                    <div class="col-12">
                                       <input type="tel" class="form-control" id="contact_number" placeholder="Contact Number" name="guest_contact_number">
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="select" value="selectguest">Submit</button>
                        </form>
                        <br> 
                            <div class="navbar navbar-brand">
                                   <span id="show_msg"></span>
                            </div>
                </div>
        </div>  

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   
    </body>

</html>