$(function(){
    function check_name(name){
	return /^[a-zA-Z\' -\.]+$/.exec(name.trim());
    }
    function check_email(email){
	//ref: http://emailregex.com/
	return /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/.exec(email.trim());
    }
    function check_phone(phone){
	//ref: https://manual.limesurvey.org/Using_regular_expressions#Australian_phone_numbers
	return /^(?:\+?61|0)[2-478](?:[ -]?[0-9]){8}$/.exec(phone);
    }


    function set_message(container,is_correct,message){
	if(is_correct){
	    container.removeClass('incorrect');
	    container.addClass('correct');
	    container.html('&#x2713;');
	}else{
	    container.removeClass('correct');
	    container.addClass('incorrect');
	    container.html('&#x2717;'+message);	    
	}

    }
    var form = $('#customer-info');
    $('input#name',form).focusout(function(){
	var name = $(this).val().trim();
	$(this).val(name);
	console.log(name);
	if(name.length==0){
	    set_message($('#message-name',form),false,'Please enter your name!');
	    return;
	}	
	set_message($('#message-name',form),check_name(name),'Unvalid name format!');
    });
    $('input#email',form).focusout(function(){
	var email = $(this).val().trim();
	$(this).val(email);	
	console.log(email);	
	if(email.length==0){
	    set_message($('#message-email',form),false,'Please enter email address!');
	    return;
	}
	set_message($('#message-email',form),check_email(email),'Invalid email address!');
    });
    $('input#phone',form).focusout(function(){
	var phone = $(this).val().trim();
	$(this).val(phone);
	console.log(phone);
	if(phone.length==0){
	    set_message($('#message-phone',form),false,'Please enter contact number!');
	    return;
	}		
	set_message($('#message-phone',form),check_phone(phone),'Invalid phone number!');
    });
    $( "form#customer-info" ).submit(function( event ) {
	if (
	    check_name($('input#name').val().trim())
	    && check_email($('input#email').val().trim())
	    && check_phone($('input#phone').val().trim())
	) {
	    if(!confirm("My contact details are correct!")) event.preventDefault();
	    return;
	}
	alert('Invalid customer detail!');
	event.preventDefault();
    });
});
