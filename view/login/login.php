<?//php require_once('');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>mail.com: Login</title>
</head>
<body>

    <style>
        body{
            font-size: 14px;
            font-weight: 500;
            line-height: 18px;
            color: #1a1a1b;
            font-family: IBMPlexSans,sans-serif;
        }

        .title-action{
            text-align: center;
        }

        form{
            max-width: 300px;
            margin:auto;
        }

        #error-message-content{
            color: #ea0027;
        }
    </style>

    <script>
        // Handle input
        function isInputValid(){
            let email = $('#email').val();
            let password = $('#passwork').val();
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
    </script>

    <div class="container" >
        <h2 class="title-action">Sign in</h2>
        
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" value="<?= $email ?>" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <input type="password" value="<?= $password ?>" class="form-control" id="passwork" placeholder="Password" name="password">
            </div>
    
            <button type="submit" class="submit-button btn btn-primary" onclick="isInputValid()">Submit</button>
        </form>

        <br>
        <div id='error-message' class="alert alert-danger" style="display:none">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span id='error-message-content'></span>
        </div>
    </div>
</body>
</html>