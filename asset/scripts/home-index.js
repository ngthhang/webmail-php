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

