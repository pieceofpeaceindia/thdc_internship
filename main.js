$(document).ready(function(){
    console.log("ur document is ready");
    $("#addingevent").click(function(){
        document.getElementById("validate_theme").innerHTML ='';
        document.getElementById("validate_date").innerHTML ='';
        document.getElementById("validate_venue").innerHTML ='';
        console.log("i m adding event");
        var dataString = 'action=addevent&'+$('#event_form').serialize();
        var theme = $("#event_name").val();
        var date = $("#event_date").val();
        var venue = $("#event_venue").val();
        console.log(dataString);
        if (theme==''&&date==''&&venue=='') {
            document.getElementById("validate_theme").innerHTML ="* input can not be empty";
            document.getElementById("validate_date").innerHTML ="* input can not be empty";
            document.getElementById("validate_venue").innerHTML ="* input can not be empty";
        } else{
            if (theme=='') {
                document.getElementById("validate_theme").innerHTML ="* input can not be empty";
            }else{
                if (date=='') {
                    document.getElementById("validate_date").innerHTML ="* input can not be empty";
                }else{
                    if (venue=='') {
                        document.getElementById("validate_venue").innerHTML ="* input can not be empty";
                    }
                    else{
                        console.log("hello here i'm");
                        $.ajax({
                            type: "POST",
                            url: "ajax.php",
                            data: dataString,
                            success: function(result){
                                console.log(result);
                                document.getElementById('event_name').value = '';
                                document.getElementById('event_date').value = '';
                                document.getElementById('event_venue').value = '';
                                }
                        });
                    }
                }
            }
        }
    });

    $("#addition").click(function(){
        document.getElementById("validate_name").innerHTML ='';
        document.getElementById("validate_email").innerHTML ='';
        document.getElementById("validate_no").innerHTML ='';
        console.log("i m adding guest");
        var dataString = 'action=addguest&'+$('#guest_form').serialize();
        var email = $("#email_guest").val();
        var name = $("#guest_name").val();
        var contact = $("#guest_contact_number").val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        console.log(dataString);
        if(name==''||email==''||contact==''){
            document.getElementById("validate_name").innerHTML ="* input can not be empty";
            document.getElementById("validate_email").innerHTML ="* input can not be empty";
            document.getElementById("validate_no").innerHTML ="* input can not be empty";
        } else{
        if (name=='') {
            document.getElementById("validate_name").innerHTML ="* input can not be empty";
        }else{
            if (email=='') {
                document.getElementById("validate_email").innerHTML ="* input can not be empty";
            }else{
                if (contact=='') {
                    document.getElementById("validate_no").innerHTML ="* input can not be empty";
                }
                else{
                    if (!filter.test(email)) {
                        document.getElementById("validate_email").innerHTML ="* must be valid email";
                    }else{
                            console.log("hello here i'm");
                         $.ajax({
                            type: "POST",
                            url: "ajax.php",
                            data: dataString,
                            success: function(result){
                                console.log(result);
                                document.getElementById('email_guest').value = '';
                                document.getElementById('guest_name').value = '';
                                document.getElementById('guest_contact_number').value = '';
                                }
                            });
                        }
                    }
                }
            }
        }
    });

    $("#rsvp").click(function(){
        document.getElementById("validate_email").innerHTML ='';
        document.getElementById("validate_pass").innerHTML ='';
        console.log("under rsvp");
        var email = $("#email_guest").val();
        var password= $('#guest_password').val();
        var dataStringa = 'action=rsvp&' + $('#rsvp_form').serialize();
        console.log(dataStringa);
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(email==''&&password==''){
            document.getElementById("validate_email").innerHTML ="* input can not be empty";
            document.getElementById("validate_pass").innerHTML ="* input can not be empty";
        }else{
            if (email=='') {
                document.getElementById("validate_email").innerHTML ="* input can not be empty";
                } else 
                    {if (password=='') {
                        document.getElementById("validate_pass").innerHTML ="* input can not be empty";
                        } else{
                                if (!filter.test(email)) {
                                    document.getElementById("validate_email").innerHTML ="* must be valid email";
                                }else{
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax.php",
                                        data: dataStringa,
                                        success: function(result){
                                            console.log(result);
                                            document.getElementById('email_guest').value = '';
                                            document.getElementById('guest_password').value = '';
                                        }
                                    });
                            }
                        }
                    }
        }
        
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
        document.getElementById("validate_name").innerHTML ='';
        document.getElementById("validate_email").innerHTML ='';
        document.getElementById("validate_no").innerHTML ='';
        console.log("i m applying as guest");
        var dataString = 'action=applyguest&'+$('#apply_form').serialize();
        var email = $("#apply_email").val();
        var name = $("#apply_name").val();
        var contact = $("#apply_contact_number").val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        console.log(dataString);
        if(name==''||email==''||contact==''){
            document.getElementById("validate_name").innerHTML ="* input can not be empty";
            document.getElementById("validate_email").innerHTML ="* input can not be empty";
            document.getElementById("validate_no").innerHTML ="* input can not be empty";
        } else{
        if (name=='') {
            document.getElementById("validate_name").innerHTML ="* input can not be empty";
        }else{
            if (email=='') {
                document.getElementById("validate_email").innerHTML ="* input can not be empty";
            }else{
                if (contact=='') {
                    document.getElementById("validate_no").innerHTML ="* input can not be empty";
                }
                else{
                    if (!filter.test(email)) {
                        document.getElementById("validate_email").innerHTML ="* must be valid email";
                    }else{
                            console.log("hello here i'm");
                         $.ajax({
                            type: "POST",
                            url: "ajax.php",
                            data: dataString,
                            success: function(result){
                                document.getElementById("msg").innerHTML=result;
                                document.getElementById('apply_email').value = '';
                                document.getElementById('apply_name').value = '';
                                document.getElementById('apply_contact_number').value = '';
                                }
                            });
                        }
                    }
                }
            }
        }
    });
});