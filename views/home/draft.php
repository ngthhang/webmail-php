<?php
$header = 'Draft Mail';
$current_controller = $_GET['controller'];
$current_action = $_GET['action'];
$all_draft = Draft::getAllDraftByUserId($current_user_id);
?>
<div class='col-xl-10 col-md-8 col-lg-8 p-0'>
    <form action="index.php" method="GET" name="viewDetail">
        <input type="text" value="" style="display: none;" name="controller" class="controller">
        <input type="text" value="" style="display: none;" name="action" class="action">
        <input type="text" value="" style="display: none;" name="conv_id" class="conv_id">
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
                foreach ($all_draft as $i) {

                    // get draft mail 
                    $id = $i->id;
                    $mail = Mail::getMailById($id);

                    //check if mail in bin
                    if (Trash::isMailInTrash($i->id, $current_user_id) === 1) {
                        continue;
                    }

                    // display content
                    $conversation_id = $mail->conversation_id;
                    $mail_conversation = Conversation::getConversation($mail->conversation_id);
                    if(is_null($mail_conversation)){
                        $subject = '(no subject)';
                    } else{
                        $subject = $mail_conversation->subject;
                    }
                    if (is_null($subject)) {
                        $subject = '(no subject)';
                    }
                    $date = $mail->sent_time;
                    $is_star_mail = Star::isMailStar($i->id, $current_user_id);
                    if ($is_star_mail) {
                        $star = 'star';
                    } else {
                        $star = 'star_outline';
                    }
                    $seen = $mail->seen;
                    if ($seen === 0) {
                        $style_read = 'd-flex mail mail-unread';
                        $style_text_read = 'font weight-bold';
                    } else {
                        $style_read = 'd-flex mail';
                        $style_text_read = '';
                    }
                ?>
                    <tr class='<?= $style_read ?>'>
                        <td class='col-1 mail-user' style="padding: 5px 0px 5px 30px">
                            <img src="asset/images/icons/<?= $star ?>.png" onclick="onClickStarButton(<?= $id ?>,'<?= $current_controller ?>', '<?= $current_action ?>')" class='img-fluid icon mr-2 star_icon' alt="">
                            <img src="asset/images/icons/bin.png" onclick="onClickDeleteButton(<?= $id ?>,'<?= $current_controller ?>', '<?= $current_action ?>')" class='delete_icon img-fluid icon mr-2' alt="">
                        </td>
                        <td class='col-3 mail-user' onclick="composeMail(<?= $conversation_id ?>)">
                            <p class='<?= $style_text_read ?>' style="margin-left: 0.5rem ; color: red">Draft</p>
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