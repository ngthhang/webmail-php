<?php
$header = 'Sent Mail';
$all_mail = Mail::getSentMail($current_user_id);
?>
<div class='col-xl-10 col-md-8 col-lg-8 p-0'>
    <form action="index.php" method="GET" name="viewDetail">
        <input type="text" class="controller" name="controller" value="" style="display: none;">
        <input type="text" class="action" name="action" value="" style="display: none;">
        <input type="text" class="id_mail" value="" name="id_mail" style="display: none;">
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

                    // display user receive
                    $user_receive = User::getUserById($i->user_receive);
                    if (is_null($user_receive->avatar) || $user_receive->avatar === '') {
                        $user_receive_avatar = 'asset/images/avatar/1.png';
                    } else {
                        $user_receive_avatar = $user_receive->avatar;
                    }
                    $user_receive_name = $user_receive->name;

                    // display content
                    $id = $i->id;
                    $mail_conversation = Conversation::getConversation($i->conversation_id);
                    $subject = $mail_conversation->subject;
                    $date = $i->sent_time;

                    $is_star_mail = Star::isMailStar($i->id, $current_user_id);
                    if ($is_star_mail) {
                        $star = 'star';
                    } else {
                        $star = 'star_outline';
                    }
                ?>
                    <tr class='d-flex mail' onclick="viewDetailMail(<?= $id ?>)">
                        <td class='col-1 mail-user' style="padding: 5px 0px 5px 30px">
                            <img src="asset/images/icons/<?= $star ?>.png" class='img-fluid icon mr-2 star_icon' alt="">
                            <img src="asset/images/icons/bin.png" class='delete_icon img-fluid icon mr-2' alt="">
                        </td>
                        <td class='col-3 mail-user'>
                            <span>Sent: </span>
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
        </table>
    </form>
</div>