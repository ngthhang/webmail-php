    <!-- START COMPOSE -->
<?php
$from = $_SESSION['email'];
if (isset($_GET['id_mail'])) {
    $id_mail = $_GET['id_mail'];
    $mail = Mail::getMailById($id_mail);
    Mail::updateSeenMail($id_mail);
    if(!is_null($mail->conversation_id)){
        $conversation = Conversation::getConversation($mail->conversation_id);
        $subject = $conversation->subject; 
    } else{
        $subject = null;
    }
    if(!is_null($mail->content)){
        $content = $mail->content;
    }
    else {
        $content = null;
    }
    if(!is_null($mail->user_receive)){
        $user_receive = User::getUserById($mail->user_receive);
        $user_receive_mail = $user_receive->mail;
    } else{
        $user_receive_mail = null;
    }
} else {
    $subject = null;
    $content = null;
    $user_receive_mail = null;
}
if (isset($_POST['to'])) {
    $to = $_POST['to'];
    if (User::checkUserExist($to) != 1) {
        echo "<script>alert('Email is not exist in database, please try again')</script>";
    } else {
        $user_receive = User::getCurrentUser($to);
        $user_receive_id = $user_receive->id;
        $subject = $_POST['subject'];
        $content = $_POST['content_mail'];
        $enclosed = null;
        $result = Mail::addMail($current_user_id, $user_receive_id, $subject, $content, $enclosed);
        if ($result) {
            echo "<script>alert('Sent mail successfully !')</script>";
        } else {
            echo "<script>alert('There is some errors in sending mail, please try again !')</script>";
        }
    }
}
?>

<div class='col-xl-10 col-md-8 col-lg-8 container'>
    <form action="" name="composeSubmit" method="POST">
        <table class="table table-borderless m-0 sticky-top">
            <thead class='bg-white'>
                <tr>
                    <td colspan="4" class='p-0 pt-3 d-flex flex-row align-items-start justify-content-between'>
                        <div class='d-flex flex-column col-10'>
                            <ul class="nav nav-pills " role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="format-tab" data-toggle="tab" href="#format" role="tab" aria-controls="format" aria-selected="true">Format</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="insert-tab" data-toggle="tab" href="#insert" role="tab" aria-controls="insert" aria-selected="false">Insert</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade pt-2" id="format" role="tabpanel" aria-labelledby="format-tab">
                                    <div>
                                        <div>
                                            <img src="asset/images/compose/bold-solid.svg" class='img-fluid icon m-2' alt="">
                                            <img src="asset/images/compose/italic-solid.svg" class='img-fluid icon m-2' alt="">
                                            <img src="asset/images/compose/underline-solid.svg" class='img-fluid icon m-2' alt="">
                                            <img src="asset/images/compose/list-solid.svg" class='img-fluid icon m-2' alt="">
                                            <img src="asset/images/compose/list-ol-solid.svg" class='img-fluid icon m-2' alt="">
                                            <img src="asset/images/compose/align-center-solid.svg" class='img-fluid icon m-2' alt="">
                                            <img src="asset/images/compose/align-justify-solid.svg" class='img-fluid icon m-2' alt="">
                                            <img src="asset/images/compose/align-left-solid.svg" class='img-fluid icon m-2' alt="">
                                            <img src="asset/images/compose/align-right-solid.svg" class='img-fluid icon m-2' alt="">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                                    <a>Heading 1</a>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" alt="">Normal</a>
                                                    <a class="dropdown-item" alt="">Heading 2</a>
                                                    <a class="dropdown-item" alt="">Title</a>
                                                </div>
                                            </div>
                                            <img src="asset/images/compose/undo-solid.svg" class='img-fluid icon m-2' alt="">
                                            <img src="asset/images/compose/redo-solid.svg" class='img-fluid icon m-2' alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade pt-2" id="insert" role="tabpanel" aria-labelledby="insert-tab">
                                    <table class='m-0 table table-borderless'>
                                        <tr class='d-flex flex-row'>
                                            <td class='p-0 d-flex flex-row px-3 align-items-center'>
                                                <img src="asset/images/compose/fileclip-solid.svg" class='img-fluid icon m-2' alt="">
                                                <span class='label-text'>file</span>
                                            </td>
                                            <td class='p-0 d-flex flex-row px-3 align-items-center'>
                                                <img src="asset/images/compose/table-solid.svg" class='img-fluid icon m-2' alt="">
                                                <span class='label-text'>Table</span>
                                            </td>
                                            <td class='p-0 d-flex flex-row px-3 align-items-center'>
                                                <img src="asset/images/compose/link-solid.svg" class='img-fluid icon m-2' alt="">
                                                <span class='label-text'>link</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class='d-flex flex-row col-2'>
                            <div class='mail-button' id='discard' onclick="onSubmitMail(id)">
                                <img src="asset/images/icons/bin.png" class='img-fluid icon m-2' alt="">
                                <span>Discard</span>
                            </div>
                            <div class='mail-button' id='delete' onclick="onSubmitMail(id)">
                                <img src="asset/images/icons/sent.png" class='img-fluid icon m-2' alt="">
                                <span>Sent</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody>
                <table class='table table-borderless'>
                    <tr>
                        <td class='table-mail-input border-bottom'>
                            <label for="from" class='mail-input-label'>From: </label>
                            <input type="text" class='mail-input' id="from" value="<?= $from ?>" disabled name="from">
                        </td>
                    </tr>
                    <tr>
                        <td class='table-mail-input border-bottom'>
                            <label for="to" class='mail-input-label'>To: </label>
                            <input type="text" class='mail-input' value="<?= $user_receive_mail ?>" id="to" name="to">
                        </td>
                    </tr>
                    <tr>
                        <td class='table-mail-input border-bottom'>
                            <label for="cc" class='mail-input-label'>Cc: </label>
                            <input type="text" class='mail-input' id="cc" name="cc">
                        </td>
                    </tr>
                    <tr>
                        <td class='table-mail-input border-bottom'>
                            <label for="bcc" class='mail-input-label'>Bcc: </label>
                            <input type="text" class='mail-input' id="bcc" name="bcc">
                        </td>
                    </tr>
                    <tr>
                        <td class='table-mail-input border-bottom'>
                            <label for="subject" class='mail-input-label'>Subject: </label>
                            <input type="text" class='mail-input' id="subject" value="<?= $subject ?>" name=" subject">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="content_mail" class='mail-input' aria-valuetext="<?= $content ?>" id="content_mail" cols="1000" rows="100"></textarea>
                        </td>
                    </tr>
                </table>
            </tbody>
        </table>
    </form>
</div>