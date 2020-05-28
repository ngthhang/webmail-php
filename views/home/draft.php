<?php
$header = 'Draft Mail';
$all_draft = Draft::getAllDraftByUserId($current_user_id);
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
            foreach ($all_draft as $i) {

                // get spam mail 
                $mail = Mail::getMailById($i->id);

                // display content
                if (is_null($mail->conversation_id) || $mail->conversation_id === '') {
                    $subject = '(no subject)';
                } else {
                    $mail_conversation = Conversation::getConversation($mail->conversation_id);
                    $subject = $mail_conversation->subject;
                }
                $date = $mail->sent_time;
                $style_read = 'd-flex mail';
                $style_text_read = '';
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
</div>