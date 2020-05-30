<?php
$header = 'Inbox';
$all_mail = Mail::getInboxMail($current_user_id);
if(!isset($_GET['controller'])){
    $current_action = 'index';
    $current_controller = 'home';
} else {
    $current_controller = $_GET['controller'];
    $current_action = $_GET['action'];
}
?>
<div class='col-xl-10 col-md-8 col-lg-8 p-0'>
    <form action="index.php" method="GET" name="viewDetail">
        <input type="text" value="" style="display: none;" name="controller" class="controller">
        <input type="text" value="" style="display: none;" name="action" class="action">
        <input type="text" value="" style="display: none;" name="id_mail" class="id_mail">
        <input type="text" value="index" style="display: none;" name="previous_route" class="previous_route">
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

                    //get user send id
                    $user_sent = User::getUserById($i->user_sent);

                    //check if exist mail in block user 
                    if(BlockUser::isBlockUser($current_user_id,$user_sent->id)=== 1){
                        continue;
                    }

                    //check if mail in bin
                    if (Trash::isMailInTrash($i->id, $current_user_id) === 1) {
                        continue;
                    }

                    // display user sent
                    if (is_null($user_sent->avatar) || $user_sent->avatar === '') {
                        $user_sent_avatar = 'asset/images/avatar/1.png';
                    } else {
                        $user_sent_avatar = $user_sent->avatar;
                    }
                    $user_sent_name = $user_sent->name;

                    // display content
                    $id = $i->id;
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
                            <img src="asset/images/icons/<?= $star ?>.png" onclick="onClickStarButton(<?= $id ?>,'<?= $current_controller ?>', '<?= $current_action ?>')" class='img-fluid star-button icon mr-2 star_icon' alt="">
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