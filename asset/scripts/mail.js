//discard mail
function onSubmitMail(id){
    let to = $("#to").val();
    let subject = $("#subject").val();
    let content = $("#content_mail").val();
    console.log(to);
    console.log(subject);
    console.log(content);
    if(id==='discard')
    {
        
    } else{
        if(to === '' || to === null){
            alert('User receive cant be null');
        }
        else if(!to.includes('@gmail.com')) {
            alert('User receive email is invalid');
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
    $(".id_mail").val(id);
    $(".controller").val("mail");
    $(".action").val("compose");
    document.viewDetail.submit();
}


//routing back home page
function onClickBackButton(previousRoute){
    $('#controller_detail').val('home');
    $('#action_detail').val(previousRoute.id);
    document.mailDetail.submit();
}


//on star email
function onClickStarButton(id) {
    window.location.href = `index.php?controller=mail&action=starred&id_mail=${id}`;
    return
}

//on delete mail 
function onClickDeleteButton(id){
    window.location.href = `index.php?controller=mail&action=delete&id_mail=${id}`;
    return 
}