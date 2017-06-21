$(document).ready(function(){
    console.log("ur document is ready");
    $("#addingevent").click(function(){
        console.log("i m adding event");
        var dataString = 'action=addevent&'+$('#event_form').serializeArray();
        var theme = $("#event_name").val();
        var date = $("#event_date").val();
        var venue = $("#event_venue").val();
        console.log(dataString);
        if(theme==''||date==''||venue==''){
            alert("Please Fill All Fields");
        }
        else{
            console.log("hello here i'm");
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: dataString,
                cache: false,
                success: function(result){
                    alert(result);
                    document.getElementById('event_name').value = '';
                    document.getElementById('event_date').value = '';
                    document.getElementById('event_venue').value = '';
                    }
            });
        }
        return false;
    });

    $("#addition").click(function(){
        console.log("i m adding guest");
        var dataString = 'action=addguest&'+$('#guest_form').serializeArray();
        var email = $("#email_guest").val();
        var name = $("#guest_name").val();
        var contact = $("#guest_contact_number").val();
        console.log(dataString);
        if(name==''||email==''||contact==''){
            alert("Please Fill All Fields");
        }
        else{
            console.log("hello here i'm");
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: dataString,
                cache: false,
                success: function(result){
                    alert(result);
                    document.getElementById('email_guest').value = '';
                    document.getElementById('guest_name').value = '';
                    document.getElementById('guest_contact_number').value = '';
                    }
            });
        }
        return false;
    });

    $("#rsvp").click(function(){
        console.log("under rsvp");
        var email = $("#email_guest").val();
        var dataStringa = 'action=rsvp&' + $('#rsvp_form').serializeArray();
        console.log(dataStringa);
        if(email==''){
            alert("Please Fill All Fields");
        }
        else{
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: dataStringa,
                cache: false,
                success: function(result){
                    document.getElementById('email_guest').value = '';
                    alert(result);
                    }
            });
        }
        return false;
    });
});