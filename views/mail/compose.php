<?php
require_once('config/config.php');
?>
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
    <title>webmail</title>
    <link rel="shortcut icon" href="asset/images/icons/logo.png" />
    <link rel="stylesheet" type="text/css" href="asset/styles/login.css">

    <!-- CSS LINK EXTERNAL FILE-->
    <link rel="stylesheet" type="text/css" href="asset/styles/index.css">
    <link rel="stylesheet" type="text/css" href="asset/styles/home-index.css">
    <script src="asset/scripts/home-index.js"></script>
</head>

<body>
    <div class='container-fluid p-0 h-100'>
        <div class='row h-100 w-100 m-0'>
            <!-- START MENU SIDE BAR -->
            <div class='col-xl-2 d-none d-md-block col-md-4 col-lg-4 bg-light p-0 border-right'>
                <!-- MENU SETTING WEBMAIL -->
                <table class='table border-bottom'>
                    <thead>
                        <tr>
                            <td class='table-home-header'>
                                <p class='font-weight-bold label-text'>webmail@...</p>
                                <img src='asset/images/avatar/1.png' alt='avatar' class='img-fluid avatar' />
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class='table-body'>
                                <button class='btn d-flex flex-row p-0'>
                                    <img src="asset/images/icons/add.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Compose</p>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class='d-flex flex-row justify-content-between table-body'>
                                <div class='table-body'>
                                    <img src="asset/images/icons/inbox.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Inbox</p>
                                </div>
                                <span class="badge badge-primary p-2">100</span>
                            </td>
                        </tr>
                        <tr>
                            <td class='table-body'>
                                <img src="asset/images/icons/sent.png" class='img-fluid icon mr-2' alt="">
                                <p class='label-text'>Sent</p>
                            </td>
                        </tr>
                        <tr>
                            <td class='table-body'>
                                <img src="asset/images/icons/draft.png" class='img-fluid icon mr-2' alt="">
                                <p class='label-text'>Starred</p>
                            </td>
                        </tr>
                        <tr>
                            <td class='table-body'>
                                <img src="asset/images/icons/draft.png" class='img-fluid icon mr-2' alt="">
                                <p class='label-text'>Draft</p>
                            </td>
                        </tr>
                        <tr>
                            <td class='table-body'>
                                <img src="asset/images/icons/spam.png" class='img-fluid icon mr-2' alt="">
                                <p class='label-text'>Spam</p>
                            </td>
                        </tr>
                        <tr>
                            <td class='table-body'>
                                <img src="asset/images/icons/bin.png" class='img-fluid icon mr-2' alt="">
                                <p class='label-text'>Trash</p>
                            </td>
                        </tr>
                        <tr>
                            <td class='table-body'>
                                <img src="asset/images/icons/logout.png" class='img-fluid icon mr-2' alt="">
                                <p class='label-text'>Sign out</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <!-- END MENU SIDE BAR -->

            <!-- START LIST MAIL DISPLAY -->
            <div class='col-xl-10 col-md-8 col-lg-8 p-0 bg-light'>
                <table class='table border-bottom'>
                    <thead>
                        <tr>
                            <td colspan="2" class='table-home-header' style="padding: 24px 30px">
                                <p class='label-text font-weight-bold'>Inbox</p>
                                <img src="asset/images/icons/search.png" class='img-fluid icon search-icon'>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" class='bg-date font-weight-bold' style="padding: 14px 0px 14px 30px">Today</td>
                        </tr>
                        <tr class='d-flex mail mail-unread'>
                            <td class='col-3 mail-user' style="padding: 5px 0px 5px 30px">
                                <img src='asset/images/avatar/1.png' alt='avatar' class='img-fluid mail-avatar' />
                                <p class='ml-2 font-weight-bold'>webmail</p>
                            </td>
                            <td class='col-9 mail-user'>
                                <span class='font-weight-bold'>subject tile </span>
                                <span class='mail-content-text'> - iste maiores officia aspernatur iusto voluptates molestias? Explicabo assumenda quae repudiandae officiis quaerat!</span>
                            </td>
                        </tr>
                        <tr class='d-flex mail'>
                            <td class='col-3 mail-user' style="padding: 5px 0px 5px 30px">
                                <img src='asset/images/avatar/1.png' alt='avatar' class='img-fluid mail-avatar' />
                                <p class='ml-2'>webmail</p>
                            </td>
                            <td class='col-9 mail-user'>
                                <span>subject tile </span>
                                <span class='mail-content-text'> - iste maiores officia aspernatur iusto voluptates molestias? Explicabo assumenda quae repudiandae officiis quaerat!</span>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- END LIST MAIL DISPLAY -->

        </div>
    </div>
</body>

</html>