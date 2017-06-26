$(document).ready(function(){
    console.log("ur document is ready");
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
                }
        });
    });   

    $("#addguest").click(function(){
        console.log("i m adding guest");
        document.getElementById("guest_name").val();
        var guestform = $('#guest_form');
        if(!guestform[0].checkValidity()){
            guestform[0].reportValidity();
            return;
        }
        var dataString = 'action=addguest&'+$('#guest_form').serialize();

        console.log(dataString);
        console.log("hello here i'm");
            var table = document.getElementById("guest_table");
            var row = table.insertRow(1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = name;
            cell2.innerHTML = "PENDING";
     $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        success: function(result){
            console.log(result);
            document.getElementById('guest_form').reset();
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
        document.getElementById("msg").innerHTML='';
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

});