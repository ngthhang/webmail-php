<?php
$header = 'Inbox';
$all_mail = Mail::getInboxMail($current_user_id);
?>
<div class='col-xl-10 col-md-8 col-lg-8 p-0'>
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
                    $style_text_read = 'font-weight-bold';
                } else {
                    $style_read = 'd-flex mail';
                    $style_text_read = '';
                }
                $is_star_mail = Star::isMailStar($i->id, $current_user_id);
                if ($is_star_mail) {
                    $star = 'star';
                } else {
                    $star = 'star_outline';
                }

            ?>
                <tr class='<?= $style_read ?>'>
                    <td class='col-1 mail-user' style="padding: 5px 0px 5px 30px">
                        <img src="asset/images/icons/<?= $star ?>.png" class='img-fluid icon mr-2 star_icon' alt="">
                        <img src="asset/images/icons/bin.png" class='delete_icon img-fluid icon mr-2' alt="">
                    </td>
                    <td class='col-3 mail-user'>
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
</div>