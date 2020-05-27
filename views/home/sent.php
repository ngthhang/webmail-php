<?php
$header = 'Sent';
$all_mail = Mail::getSentMail(1);
?>
<tbody>
    <?php
    foreach ($all_mail as $i) {

        // display user receive
        $user_receive = User::getUserById($i->user_receive);
        if (is_null($user_receive->avatar) || $user_receive->avatar === '') {
            $user_receive_avatar = 'asset/images/avatar/1.png';
        } else {
            $user_receive_avatar = $user_receive_avatar->avatar;
        }
        $user_receive_name = $user_receive->name;

        // display content
        $mail_conversation = Conversation::getConversation($i->conversation_id);
        $subject = $mail_conversation->subject;
        $date = $i->sent_time;
    ?>
        <tr class='d-flex mail'>
            <td class='col-1 mail-user' style="padding: 5px 0px 5px 30px">
                <img src="asset/images/icons/star_outline.png" class='img-fluid icon mr-2 star_icon' alt="">
                <img src="asset/images/icons/bin.png" class='delete_icon img-fluid icon mr-2' alt="">
            </td>
            <td class='col-3 mail-user'>
                <img src='<?= $user_receive_avatar ?>' alt='avatar' class='img-fluid mail-avatar' />
                <p class='ml-2'><?= $user_receive_name ?></p>
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