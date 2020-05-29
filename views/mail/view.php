<?php
$previous_action = $_GET['previous_route'];
if (!isset($_GET['id_mail'])) {
    echo "<script>alert('Mail id is not exist!')</script>";
    redirect('index.php');
} else {
    //get mail content
    $id_mail = $_GET['id_mail'];
    Mail::updateSeenMail($id_mail);
    $mail = Mail::getMailById($id_mail);
    $conversation = Conversation::getConversation($mail->conversation_id);
    $subject = $conversation->subject;
    $sent_time = $mail->sent_time;
    $content = $mail->content;

    //display user
    $user_receive = User::getUserById($mail->user_receive);
    $user_receive_mail = $user_receive->mail;
    $user_sent = User::getUserById($mail->user_sent);
    $name = $user_sent->name;
    if ($user_sent->avatar === '' || is_null($user_sent->avatar)) {
        $user_sent_avatar = 'asset/images/avatar/1.png';
    } else {
        $user_sent_avatar = $user_sent->avatar;
    }
}
?>
<div class='col-xl-10 col-md-8 col-lg-8 p-0'>
    <form action="index.php" method="GET" name="mailDetail">
        <input type="text" name="controller" value="" id='controller_detail' style="display: none">
        <input type="text" name="action" value="" id='action_detail' style="display: none">
        <table class='table table-borderless'>
            <thead>
                <tr class='table-mail-header sticky-top bg-white'>
                    <td onclick="onClickBackButton(<?= $previous_action ?>)" class='table-body ml-3'>
                        <img src="asset/images/icons/back.png" class='img-fluid icon' alt="">
                    </td>
                    <td>
                        <!--more button -->
                        <table class='table table-borderless'>
                            <tr class='row'>
                                <td class='table-body d-flex flex-row p-2 mr-4 text-center'>
                                    <img src="asset/images/icons/reload.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Reply</p>
                                </td>
                                <td class='table-body d-flex flex-row p-2 mr-4 text-center'>
                                    <img src="asset/images/icons/reply-all.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Reply All</p>
                                </td>
                                <td class='table-body d-flex flex-row p-2 mr-4 text-center'>
                                    <img src="asset/images/icons/arrow.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Forward</p>
                                </td>
                                <td class='table-body d-flex flex-row p-2 mr-4 text-center'>
                                    <img src="asset/images/icons/bin.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Delete</p>
                                </td>
                                <td class='table-body d-flex flex-row p-2 mr-4 text-center'>
                                    <img src="asset/images/icons/star_outline.png" class='img-fluid icon mr-2' alt="">
                                    <p class='label-text'>Set star</p>
                                </td>
                                <td class='table-body'>
                                    <img src="asset/images/icons/more.png" class='img-fluid dropdown-toggle text-center icon mr-2' alt="" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr class='no-border'>
                    <td colspan="3" class='font-weight-bold' style="padding: 3px 0px 3px 30px">
                        <h4><?= $subject ?></h4>
                    </td>
                </tr>
                <tr class='no-border d-flex'>
                    <td class='d-flex flex-row mail-user' style="padding-left: 30px">
                        <img src='<?= $user_sent_avatar ?>' alt='avatar' class='img-fluid avatar' />
                        <div class='d-flex flex-column'>
                            <p class='ml-2 label-text font-weight-bold'><?= $name ?></p>
                            <p class='ml-2'><?= $sent_time ?></p>
                        </div>
                    </td>
                </tr>
                <tr class='no-border d-flex'>
                    <td class='mail-user' style='padding-left: 30px'>
                        <p>To: <?= $user_receive_mail ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class='mt-2' style='padding-left:30px; padding-right:30px; padding-bottom: 50px'>
                            <?= $content ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>