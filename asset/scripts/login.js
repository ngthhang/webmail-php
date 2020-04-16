// Handle input login
function isInputValid(){
    let email = $('#email').val();
    let password = $('#pwd').val();
    let error_message = $('error-message');
    let error_message_content = $('error-message-content');

    if (email == '') {
        error_message_content.html('Please enter your email');
        error_message.show();
        email.focus();
        return false
    } else if(!email.includes("@")) {
        error_message_content.html('Your email is not valid');
        error_message.show();
        email.focus();
        return false
    } else if(email.length < 3){
        error_message_content.html('Email must contain at least 3 characters');
        error_message.show();
        email.focus();
        return false
    } else if (passwork == '') {
        error_message_content.html('Please enter your passwork');
        error_message.show();
        password.focus();
        return false
    } else if(passwork.length < 3){
        error_message_content.html('Passwork must contain at least 3 characters');
        error_message.show();
        passwork.focus();
        return false
    }
    error_message.hide("slow");
    return true
}