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

    <!-- CSS LINK EXTERNAL FILE-->
    <link rel="stylesheet" type="text/css" href="asset/styles/index.css">
    <link rel="stylesheet" type="text/css" href="asset/styles/home-index.css">
    <link rel="stylesheet" type="text/css" href="asset/styles/login.css">
    <link rel="stylesheet" type="text/css" href="asset/styles/mail.css">

    <!-- JS LINK EXTERNAL FILE-->
    <script src="asset/scripts/mail.js"></script>
    <script src="asset/scripts/home-index.js"></script>
</head>

<body>
    <div class='container-fluid p-0'>
        <div class='row h-100 w-100 m-0'>
            <!-- START MENU SIDE BAR -->
            <div class='col-xl-2 d-none d-md-block col-md-2 col-lg-2 p-0 h-100 sticky-top'>
                <!-- MENU SETTING WEBMAIL -->
                <form method="get" name="menuSide" action="index.php">
                    <input type="text" name="controller" value="" id='controller' style="display: none">
                    <input type="text" name="action" value="" id='action' style="display: none">
                    <table class='table table-borderless'>
                        <thead>
                            <tr>
                                <td class='table-home-header'>
                                    <p class='font-weight-bold label-text'><?= $current_user ?></p>
                                    <img src="<?= $avatar ?>" alt='avatar' class='img-fluid avatar' />
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id='compose' onclick="onRoute(this.id)">
                                <td class='table-body'>
                                    <img src="asset/images/icons/add.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Compose</p>
                                </td>
                            </tr>
                            <tr id='index' onclick="onRoute(this.id)">
                                <td class='d-flex flex-row justify-content-between table-body'>
                                    <div class='table-body'>
                                        <img src="asset/images/icons/inbox.png" class='img-fluid icon mr-2' alt="">
                                        <p class='label-text'>Inbox</p>
                                    </div>
                                    <span class="badge badge-primary p-2"><?= $total_unread_mail ?></span>
                                </td>
                            </tr>
                            <tr id='sent' onclick="onRoute(this.id)">
                                <td class='table-body'>
                                    <img src="asset/images/icons/sent.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Sent</p>
                                </td>
                            </tr>
                            <tr id='star' onclick="onRoute(this.id)">
                                <td class='table-body'>
                                    <img src="asset/images/icons/draft.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Starred</p>
                                </td>
                            </tr>
                            <tr id='draft' onclick="onRoute(this.id)">
                                <td class='table-body'>
                                    <img src="asset/images/icons/draft.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Draft</p>
                                </td>
                            </tr>
                            <tr id='spam' onclick="onRoute(this.id)">
                                <td class='table-body'>
                                    <img src="asset/images/icons/spam.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Spam</p>
                                </td>
                            </tr>
                            <tr id='trash' onclick="onRoute(this.id)">
                                <td class='table-body'>
                                    <img src="asset/images/icons/bin.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Bin</p>
                                </td>
                            </tr>
                            <tr id='logout' onclick="onRoute(this.id)">
                                <td class='table-body'>
                                    <img src="asset/images/icons/logout.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Sign out</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>


            <!-- END MENU SIDE BAR -->

            <!-- START LIST MAIL DISPLAY -->
            <?= $content ?>
            <!-- END LIST MAIL DISPLAY -->

        </div>
    </div>
</body>

</html>