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
    <link rel="stylesheet" type="text/css" href="asset/styles/mail.css">
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
                                <img src="asset/images/icons/star.png" class='img-fluid icon mr-2' alt="">
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
                <table class='table'>
                    <thead>
                        <tr class='row'>
                            <td class='table-home-header col-2' style="padding-left:30px">
                                <button class='btn d-flex flex-row p-0 mr-4 text-center'>
                                    <img src="asset/images/icons/back.png" class='img-fluid icon mr-2' alt="">
                                </button>
                            </td>
                            <td class='col-10 table-mail-header' style="padding-top:24px; padding-bottom:24px">
                                <!--more button -->
                                <button class="btn d-flex flex-row p-0 mr-5 dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="asset/images/icons/more.png" class='img-fluid text-center icon mr-2' alt="">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item d-flex flex-row p-2" type="button">
                                        <img src="asset/images/icons/unread.png" class='img-fluid icon mr-2' alt="">
                                        <p>Mark as read</p>
                                    </button>
                                    <button class="dropdown-item d-flex flex-row p-2" type="button">
                                        <img src="asset/images/icons/spam.png" class='img-fluid icon mr-2' alt="">
                                        <p>Move to Junk</p>
                                    </button>
                                    <button class="dropdown-item d-flex flex-row p-2" type="button">
                                        <img src="asset/images/icons/back.png" class='img-fluid icon mr-2' alt="">
                                        <p>Previous</p>
                                    </button>
                                    <button class="dropdown-item d-flex flex-row p-2" type="button">
                                        <img src="asset/images/icons/next.png" class='img-fluid icon mr-2' alt="">
                                        <p>Next</p>
                                    </button>
                                </div>

                                <button class='btn d-flex flex-row p-0 mr-4 text-center'>
                                    <img src="asset/images/icons/star_outline.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Set star</p>
                                </button>
                                <button class='btn d-flex flex-row p-0 mr-4 text-center'>
                                    <img src="asset/images/icons/bin.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Delete</p>
                                </button>
                                <button class='btn d-flex flex-row p-0 mr-4 text-center'>
                                    <img src="asset/images/icons/arrow.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Forward</p>
                                </button>
                                <button class='btn d-flex flex-row p-0 mr-4 text-center'>
                                    <img src="asset/images/icons/reply-all.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Reply All</p>
                                </button>
                                <button class='btn d-flex flex-row p-0 mr-4 text-center'>
                                    <img src="asset/images/icons/reload.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Reply</p>
                                </button>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class='no-border'>
                            <td colspan="3" class='font-weight-bold' style="padding: 3px 0px 3px 30px">
                               <h4>Subject of the mail</h4>
                            </td>
                        </tr>
                        <tr class='no-border d-flex'>
                            <td class='d-flex flex-row mail-user' style="padding-left: 30px">
                                <img src='asset/images/avatar/1.png' alt='avatar' class='img-fluid avatar' />
                                <div class='d-flex flex-column'>
                                    <p class='ml-2 label-text font-weight-bold'>webmail</p>
                                    <p class='ml-2'>11/01/2020 17:40</p>
                                </div>
                            </td>
                        </tr>
                        <tr class='no-border d-flex'>
                            <td class='mail-user' style='padding-left: 30px'>
                                <p>To: webmail@gmail.com</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class='mt-2' style='padding-left:30px; padding-right:30px'>
                    Content of the mail
                </p>
            </div>
            <!-- END LIST MAIL DISPLAY -->

        </div>
    </div>
</body>

</html>