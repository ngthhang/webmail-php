<?php
$header = 'Bin';
$current_controller = $_GET['controller'];
$current_action = $_GET['action'];
$all_trash = Trash::getAllTrashByUserId($current_user_id);
?>
<div class='col-xl-10 col-md-8 col-lg-8 p-0'>
    <form action="index.php" method="GET" name="viewDetail">
        <input type="text" value="" style="display: none;" name="controller" class="controller">
        <input type="text" value="" style="display: none;" name="action" class="action">
        <input type="text" value="" style="display: none;" name="id_mail" class="id_mail">
        <input type="text" value="trash" style="display: none;" name="previous_route" class="previous_route">
        <table class='table border-bottom'>
            <thead>
                <tr>
                    <td colspan="2" class='table-home-header sticky-top bg-white border-bottom' style="padding: 24px 30px">
                        <p class='label-text font-weight-bold'><?= $header ?></p>
                        <img src="asset/images/icons/search.png" class='img-fluid icon search-icon'>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($all_trash as $i) {

                    // get spam mail 
                    $id = $i->id;
                    $mail = Mail::getMailById($id);

                    // display user receive
                    $user_sent = User::getUserById($mail->user_sent);
                    if (is_null($user_sent->avatar) || $user_sent->avatar === '') {
                        $user_sent_avatar = 'asset/images/avatar/1.png';
                    } else {
                        $user_sent_avatar = $user_sent->avatar;
                    }
                    if ($user_sent->id == $current_user_id) {
                        $user_sent_name = 'me';
                        $style_read = 'd-flex mail';
                        $style_text_read = '';
                    } else {
                        $user_sent_name = $user_sent->name;
                        $seen = $mail->seen;
                        if ($seen === 0) {
                            $style_read = 'd-flex mail mail-unread';
                            $style_text_read = 'font-weight-bold';
                        } else {
                            $style_read = 'd-flex mail';
                            $style_text_read = '';
                        }
                    }

                    // display content
                    $mail_conversation = Conversation::getConversation($mail->conversation_id);
                    $subject = $mail_conversation->subject;
                    $date = $mail->sent_time;
                ?>
                    <tr class='<?= $style_read ?>'>
                        <td class='col-1 mail-user' style="padding: 5px 0px 5px 30px">
                            <img src="asset/images/icons/bin.png" onclick="onClickDeleteButton(<?= $id ?>,'<?= $current_controller ?>', '<?= $current_action ?>')" class='delete_icon img-fluid icon mr-2' alt="">
                        </td>
                        <td class='col-3 mail-user' onclick="viewDetailMail(<?= $id ?>)">
                            <img src='<?= $user_sent_avatar ?>' alt='avatar' class='img-fluid mail-avatar' />
                            <p class='<?= $style_text_read ?>' style="margin-left: 0.5rem ;"><?= $user_sent_name ?></p>
                        </td>
                        <td class='col-8 mail-content'>
                            <span class='<?= $style_text_read ?>'><?= $subject ?></span>
                            <span class='mail-content-text'><?= $date ?></span>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </form>
</div>