//discard mail
function onSubmitMail(id){
    let to = $("#to").val();
    let subject = $("#subject").val();
    let content = $("#content_mail").val();
    $("#forward").val("false");

    if(to[to.length-1]===','){
        to = to.substr(0,to.length-1);
    }
    $("#to").val(to);

    if(id === 'draft'){
        $('#check_save_draft').val('true');
        document.composeSubmit.submit();
    }
    else if(id==='discard')
    {
        $("#to").val(null);
        $("#subject").val(null);
        $("#content_mail").val(null);

    } else{
        split_to = to.split(',');
        if (split_to.length > 1){
            for(let i = 0; i<split_to.length ; i++){
                if(!split_to[i].includes('@gmail.com')){
                    alert('User receive email ' + split_to[i] + ' is invalid');
                    return;
                }
            }
        }
        if(to === '' || to === null){
            alert('User receive cant be null');
        }
        else if( subject === '' || subject === null){
            alert('Subject cant be null');
        }
        else if(subject.length >= 101 ){
            alert('Subject is too big, subject <= 100 characters');
        }
        else if(content === null){
            alert('Content cant be null');
        }
        else if(content.length >= 4001){
            alert('Your content text is too big, content <= 4000 characters');
        }
        else{
            document.composeSubmit.submit();
        }
    }
}

//on routing view detail mail
function viewDetailMail(id){
    $(".id_mail").val(id);
    $(".controller").val("mail");
    $(".action").val("view");
    document.viewDetail.submit();
}

//compose draft mail
function composeMail(id){
    $(".conv_id").val(id);
    $(".controller").val("mail");
    $(".action").val("compose");
    document.viewDetail.submit();
}


//routing back home page
function onClickBackButton(previousRoute){
    window.location.href = `index.php?controller=home&action=${previousRoute.id}`;
    return 
}


//on star email in list mail
function onClickStarButton(id, prev_controller, prev_action) {
    window.location.href = `index.php?controller=mail&action=starred&id_mail=${id}&prev_c=${prev_controller}&prev_a=${prev_action}`;
    return
}

//on delete mail to mail bin
function onClickDeleteButton(id, prev_controller, prev_action){
    window.location.href = `index.php?controller=mail&action=delete&id_mail=${id}&prev_c=${prev_controller}&prev_a=${prev_action}`;
    return 
}

//on update star in mail detail
function updateStarInMailDetail(id,curr_controller,curr_action,prev_action){
    window.location.href = `index.php?controller=mail&action=starred&id_mail=${id}&curr_c=${curr_controller}&curr_a=${curr_action}&prev_a=${prev_action}`;
    return 
}

//on add spam mail
function moveMailToSpam(id,curr_controller,curr_action,prev_action){
    window.location.href = `index.php?controller=mail&action=add_spam&id_mail=${id}&curr_c=${curr_controller}&curr_a=${curr_action}&prev_a=${prev_action}`;
    return 
}


//change unread mail
function changeUnreadMail(id,prev_controller,prev_action){
    window.location.href = `index.php?controller=mail&action=unread&id_mail=${id}&prev_c=${prev_controller}&prev_a=${prev_action}`;
    return 
}

//forward mail
function onForwardMail(id){
    window.location.href = `index.php?controller=mail&action=compose&id_mail=${id}&forward=true`;
    return
}

//reply mail
function onReplyMail(id) {
    window.location.href = `index.php?controller=mail&action=compose&id_mail=${id}&reply=true`;
    return
}

//on change input to from compose file 
function onChangeToInput(){
    let to = $('#to').val();
    if(to.includes(' ')){
        to = to.replace(' ','');
        $('#to').val(to);
    }

    console.log($('#to').val());
}

//on key press
function onCheckKeyPress(event){
    let to = $('#to').val();
    if (event.keyCode === 32 && to.slice(-1) !== ',' && to.slice(-1) !== ''){
        to = to + ',';
        $('#to').val(to);
    }
}
