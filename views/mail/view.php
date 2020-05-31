<?php
$previous_action = $_GET['previous_route'];
$current_controller = $_GET['controller'];
$current_action = $_GET['action'];
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

    //check if mail is important
    $is_star = Star::isMailStar($id_mail, $current_user_id);
    if ($is_star === 1) {
        $star_text = 'Clear starred';
        $star_icon = 'star';
    } else {
        $star_text = 'Set star';
        $star_icon = 'star_outline';
    }

    //check if mail is in spam 
    $is_spam = Spam::isSpamMail($id_mail, $current_user_id);
    if ($is_spam === 1) {
        $spam_text = 'Move to Inbox';
        $spam_icon = 'inbox';
    } else {
        $spam_text = 'Move to Junk';
        $spam_icon = 'spam';
    }
}
?>
<div class='col-xl-10 col-md-8 col-lg-8 p-0'>
    <form action="" method="GET" name="mailDetail">
        <input type="text" name="controller" value="" id='controller_detail' style="display: none">
        <input type="text" name="action" value="" id='action_detail' style="display: none">
        <table class='table table-borderless'>
            <?php
                require_once('view_header.php');
            ?>
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