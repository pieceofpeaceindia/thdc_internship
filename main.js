$(document).ready(function(){
    fetch_guest();
    fetch_appply_guest();
    fetch_event_details();
    fetch_pending_details();
    fetch_declined_details();
    
    $("#addevent").click(function(){
        console.log("i m adding event");
        var eventform= $('#event_form');
        if(!eventform[0].checkValidity()){
            eventform[0].reportValidity();
            return;
        }
        var dataString = 'action=addevent&'+$('#event_form').serialize();
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            success: function(result){
                console.log(result);
                document.getElementById('event_form').reset();  
                fetch_event_details();
                }
        });
    });   

    $("#get_link").click(function(){
        var rsvpform =$('#rsvp_form');
        if(!rsvpform[0].checkValidity()){
            rsvpform[0].reportValidity();
            return;
        }
        console.log(dataStringa);
        var dataStringa = 'action=rsvp&' + $('#rsvp_form').serialize();
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataStringa,
            success: function(result){
                document.getElementById('rsvp_form').reset();
                document.getElementById("msgrsvp").innerHTML=result;
            }
        });      
    return false;    
    });

    $("#forget_password").click(function(){
        console.log("forgot_password");
        var email = $("#email_guest").val();
        var no= $('#guest_contact_number').val();
        var dataStringa = 'action=forgot&' + $('#forgot_password_form').serialize();
        console.log(dataStringa);
        if(email==''|| no==''){
            alert("Please fill both Fields");
        }
        else{
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: dataStringa,
                success: function(result){
                    console.log(result);
                    document.getElementById('email_guest').value = '';
                    document.getElementById('guest_contact_number').value = '';
                }
            });
        }
    return false;    
    });

    $("#register").click(function(){
        console.log("i m applying as guest");
        var userregister= $('#apply_form');
        if (!userregister[0].checkValidity()) {
            userregister[0].reportValidity();
            return;
        }
        var dataString = 'action=applyguest&'+$('#apply_form').serialize();
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            success: function(result){
                document.getElementById("msg").innerHTML=result;
                document.getElementById('apply_form').reset();
                }
            });
    });

    $("#register_modal").click(function(){
        document.getElementById("msg").innerHTML='';
        
    });
    $("#rsvp_modal").click(function(){
        document.getElementById("msgrsvp").innerHTML='';
    });

    $("#action").click(function(){
        var guestform = $('#guest_form');
        if(!guestform[0].checkValidity()){
        guestform[0].reportValidity();
        return;
        }
        var guest_name= $('#guestname').val();
        var guest_email= $('#email').val();
        var contact= $('#phone').val();
        var id=$('#guest_id').val();
        var action= "addguest";
        console.log(guest_name);
        console.log(guest_email);
        console.log(contact);
        $.ajax({
            url: "ajax.php",
            method:"POST",
            data:{guest_name:guest_name,guest_email:guest_email,contact:contact,id:id,action:action},
            success:function(result){
                document.getElementById("msg").innerHTML=result;
                document.getElementById('guest_form').reset();
                fetch_guest();
                fetch_pending_details();
                fetch_appply_guest();
                fetch_declined_details();
            }
        })
    });

    $(document).on('click', '.reject', function(){
        var applyid= $(this).attr("id");
        var action="reject";
        $.ajax({
            url:"ajax.php",
            method:"POST",
            data:{applyid:applyid, action:action},
            success:function(data){
                fetch_guest();
                fetch_appply_guest();
                fetch_pending_details();
                fetch_declined_details();
                alert(data);
            }
        })
    });

    $(document).on('click', '.accept', function(){
        var applyid= $(this).attr("id");
        var action="accept";
        $.ajax({
            url:"ajax.php",
            method:"POST",
            data:{applyid:applyid, action:action},
            success:function(data){
                fetch_guest();
                fetch_appply_guest();
                fetch_pending_details();
                alert(data);
            }
        })
    });   
    function fetch_guest(){
        var action="selectguest";
        $.ajax({
            url: "ajax.php",
            method: "POST",
            data:{action:action},
            success:function(data){
                $('#guests').html(data);
            }
        });
    }
    function fetch_appply_guest(){
        var action="selectapplyguest";
        $.ajax({
            url: "ajax.php",
            method: "POST",
            data:{action:action},
            success:function(data){
                $('#applied').html(data);
            }
        });
    }

    function fetch_event_details() {
        var action="selectevent";
        $.ajax({
            url:"ajax.php",
            method:"POST",
            data:{action:action},
            success:function(data){
                $('#eventdetail').html(data);
            }
        });      
    }
    
    function fetch_pending_details() {
        var action="pendingguest";
        $.ajax({
            url:"ajax.php",
            method:"POST",
            data:{action:action},
            success:function(data){
                $('#pending').html(data);
            }
        });      
    }
     
    function fetch_declined_details() {
        var action="declineguest";
        $.ajax({
            url:"ajax.php",
            method:"POST",
            data:{action:action},
            success:function(data){
                $('#declined').html(data);
            }
        });      
    }

    $(document).on('click', '.update', function(){
        var updateid= $(this).attr("id");
        var action="updateevent";
        console.log(updateid);
        $.ajax({
            url:"ajax.php",
            method:"POST",
            data:{updateid:updateid, action:action},
            success:function(value){
                var data = value.split(",");
                $('#update_event_name').val(data[0]);
                $('#update_event_date').val(data[2]);
                $('#update_event_venue').val(data[1]);
                $('#dataid').val(data[3]);
            }
        })
    }); 

    $(document).on('click', '.delete', function(){
        var deleteid= $(this).attr("id");
        console.log(deleteid);
        var action="deleteevent";
        $.ajax({
            url:"ajax.php",
            method:"POST",
            data:{deleteid:deleteid, action:action},
            success:function(data){
                console.log(data);
                fetch_event_details();
            }
        })
    }); 

    $("#updateevent").click(function(){
        console.log("i m adding event");
        var eventform= $('#event_update_form');
        if(!eventform[0].checkValidity()){
            eventform[0].reportValidity();
            return;
        }
        var dataString = 'action=updateeventdetail&'+$('#event_update_form').serialize();
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            success: function(result){
                console.log(result);
                document.getElementById('event_update_form').reset();  
                fetch_event_details();
                }
        });
    });

});