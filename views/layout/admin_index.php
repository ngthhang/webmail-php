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
    <link rel="stylesheet" type="text/css" href="asset/styles/profile.css">

    <!-- JS LINK EXTERNAL FILE-->
    <script src="asset/scripts/mail.js"></script>
    <script src="asset/scripts/admin.js"></script>
    <script src="asset/scripts/home-index.js"></script>
    <script src="asset/scripts/login.js"></script>
</head>

<body>
    <div class='container-fluid p-0'>
        <div class='row h-100 w-100 m-0'>
            <!-- START MENU SIDE BAR -->
            <div class='col-xl-2 d-none d-md-block col-md-2 col-lg-2 p-0 h-100 sticky-top'>
                <!-- MENU SETTING WEBMAIL -->
                <form method="get" name="menuSide" action="index.php">
                    <input type="text" id="sysadmin" value="<?= $sysadmin ?>" style="display: none;">
                    <input type="text" name="controller" value="" id='controller' style="display: none">
                    <input type="text" name="action" value="" id='action' style="display: none">
                    <table class='table table-borderless'>
                        <thead>
                            <tr id='profile' onclick="onRouteInModeAdmin(this.id)">
                                <td class='table-home-header profile-link'>
                                    <p class='font-weight-bold label-text'><?= $current_user ?></p>
                                    <img src="<?= $avatar ?>" alt='avatar' class='img-fluid avatar' />
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id='index' onclick="onRouteInModeAdmin(this.id)">
                                <td class='table-body'>
                                    <img src="asset/images/icons/user.svg" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>User</p>
                                </td>
                            </tr>
                            <tr id='admin' onclick="onRouteInModeAdmin(this.id)">
                                <td class='d-flex flex-row justify-content-between table-body'>
                                    <div class='table-body'>
                                        <img src="asset/images/icons/admin.svg" class='img-fluid icon mr-2' alt="">
                                        <p class='label-text'>Admin</p>
                                    </div>
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