function onRoute(id){
    if (id === 'logout'){
        window.location.href = 'index.php?controller=login&action=logout';
        return
    }
    else if(id=== 'compose'){
        $('#controller').val('mail');
        $('#action').val('compose');
        
    }
    else{
        $('#controller').val('home');
        $('#action').val(id);
    }
    document.menuSide.submit();
}

function changeUserData() {
    let useremail = $('.useremail').val();
    let password = $('.userpassword').val();
    let phone = $('.userphone').val();
    let name = $('.username').val();
    let error_message = $('#error-message');

    if (useremail == '' || !useremail.includes('@gmail.com')) {
        error_message.html('Email is invalid, please enter again');
        error_message.show();
        event.preventDefault();
        return false
    }
    else if (phone == '' || phone.length < 10 || phone.length > 10 || phone[0] != 0) {
        error_message.html('Phone is invalid, please enter again');
        error_message.show();
        event.preventDefault();
        return false
    }
    else if (password == '') {
        error_message.html('Password is not null, please enter again');
        error_message.show();
        event.preventDefault();
        return false
    }
    else if (name == '') {
        error_message.html('Name is not null, please enter again');
        error_message.show();
        event.preventDefault();
        return false
    }
    return true
}
