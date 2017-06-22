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
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#guests">My Guests</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#applied">Registered Guest</a>
                    </li>
                </ul>
             </div>
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
                                        <div class="col-12 col-xs-12 col-sm-6 col-md-5">
                                            <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Theme Name">
                                        <p id="validate_theme" class="text-danger"></p>   
                                        </div>
                                    <label for="date" class="col-12 col-xs-4 col-sm-6 col-md-5 col-form-label">Date</label>
                                        <div class="col-12 col-xs-12col-sm-6 col-md-5">
                                            <input type="date" class="form-control" name="event_date" id="event_date">
                                        <p id="validate_date" class="text-danger"></p>
                                        </div>
                                    <label for="venue" class="col-12 col-xs-4 col-sm-6 col-md-5 col-form-label">Venue</label>
                                        <div class="col-12 col-xs-12 col-sm-6 col-md-5">
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
                                    <div class="col-12 col-xs-12 col-sm-6 col-md-6">
                                        <input type="email" class="form-control" id="email_guest" placeholder="Enter email" name="email_guest">
                                        <p id="validate_email" class="text-danger"></p>
                                    </div>
                                <label for="guestname" class="col-xs-4 col-sm-6 col-md-5 col-form-label">Name Of The Guest</label>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                       <input type="text" class="form-control required" id="guest_name" placeholder="Guest Name" name="guest_name">
                                       <p id="validate_name" class="text-danger"></p>
                                    </div>
                                <label for="contact_number" class="col-xs-4 col-sm-6 col-md-5 col-form-label">Phone No.</label>
                                    <div class="col-12 col-xs-12 col-sm-6 col-md-6">
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
            </div>    <br>
            <div class="container" id="guests">
                <nav class="navbar navbar-inverse bg-warning" style="text-align: center; font-weight: bold;font-size: 20px;">PREVIOUSLY INVITED GUEST</nav>
                <?php include_once"function.php"; show_guest_details(); ?>
            </div>     
            <hr><hr>
            <div class="container" id="applied">
                <nav class="navbar navbar-inverse bg-success" style="text-align: center; font-weight: bold;font-size: 20px;">REGISTERED </nav>
                <table class="table table-striped table-bordered" style="text-align:center">
                    <thead class="bg-warning">
                        <tr>
                            <th style="text-align:center">email</th>
                            <th style="text-align:center">Name</th>
                            <th style="text-align:center">Contact Number</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "internrsvp";
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 
                            $sql = "SELECT apply_email,apply_name,apply_number FROM applyguests";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) 
                            {
                            while($row = $result->fetch_assoc()) 
                                {
                                echo "<tr class='text-primary'>";
                                    echo "<td>";
                                        echo $row["apply_email"];
                                    echo "</td>";
                                    echo "<td>";
                                        echo $row["apply_name"];
                                    echo "</td>";
                                    echo "<td>";
                                        echo $row["apply_number"];
                                    echo "</td>";
                                    echo "<td>";
                                        echo "<b>"."<a href='' class='text-success'>"."ADD"."</a>"."&nbsp;"."&nbsp;"."&nbsp;"."<a href='' class='text-danger'>"."REJECT"."</a>"."</b>";
                                    echo "</td>";
                                echo "</tr>";
                                }
                            } else {
                            echo "No guest Till now";
                        }
                        $conn->close();
                            ?>
                    </tbody>
                </table>
                <br>
            </div> 

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="main.js"></script>
</html>