function onClickBlockUser(id){
    window.location.href = `index.php?controller=admin&action=blocked&user_id=${id}&prev_c=admin&prev_a=index`;
    return 
}

function onChangeSysAdmin(id){
    window.location.href = `index.php?controller=admin&action=change_sysadmin&user_id=${id}&prev_c=admin&prev_a=admin`;
    return
}

function viewDetailUser(id) {
    $(".user_id").val(id);
    $(".controller").val("admin");
    $(".action").val("view_user");
    document.viewDetail.submit();
}

function viewDetailAdmin(id){
    $(".admin_id").val(id);
    $(".controller").val("admin");
    $(".action").val("view_admin");
    document.viewDetail.submit();
}

function onRouteInModeAdmin(id) {
    let sysadmin = $('#sysadmin').val();
    if (id === 'admin') {
        if (sysadmin == 0) {
            alert('You dont have permission to access this object');
            return
        }
    }
    $('#controller').val('admin');
    $('#action').val(id);
    document.menuSide.submit();
}

function changeAdminData() {
    let useremail = $('.useremail').val();
    let password = $('.userpassword').val();
    let phone = $('.userphone').val();
    let name = $('.username').val();
    let position = $('.position').val();
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
    else if (position === '') {
        error_message.html('Position can be null, please enter again');
        error_message.show();
        event.preventDefault();
        return false
    }
    return true
}