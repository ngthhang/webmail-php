<?php
$header = 'Inbox';
$all_mail = Mail::getInboxMail(1);
?>
<tbody>
    <?php
    foreach ($all_mail as $i) {

        // display user sent
        $user_sent = User::getUserById($i->user_sent);
        if (is_null($user_sent->avatar) || $user_sent->avatar === '') {
            $user_sent_avatar = 'asset/images/avatar/1.png';
        } else {
            $user_sent_avatar = $user_sent->avatar;
        }
        $user_sent_name = $user_sent->name;

        // display content
        $mail_conversation = Conversation::getConversation($i->conversation_id);
        $subject = $mail_conversation->subject;
        $date = $i->sent_time;
        $seen = $i->seen;
        if ($seen === 0) {
            $style_read = 'd-flex mail mail-unread';
        } else {
            $style_read = 'd-flex mail';
        }
    ?>
        <tr class='<?= $style_read ?>'>
            <td class='col-1 mail-user' style="padding: 5px 0px 5px 30px">
                <img src="asset/images/icons/star_outline.png" class='img-fluid icon mr-2 star_icon' alt="">
                <img src="asset/images/icons/bin.png" class='delete_icon img-fluid icon mr-2' alt="">
            </td>
            <td class='col-3 mail-user'>
                <img src='<?= $user_sent_avatar ?>' alt='avatar' class='img-fluid mail-avatar' />
                <p class='ml-2'><?= $user_sent_name ?></p>
            </td>
            <td class='col-8 mail-content'>
                <span><?= $subject ?></span>
                <span class='mail-content-text'><?= $date ?></span>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody>