<?php
require_once('handle_compose.php');
?>
<div class='col-xl-10 col-md-10 col-lg-10 container'>
    <form action="" name="composeSubmit" method="POST">
        <input type="text" value="<?= $conversation_id ?>" name="conversation_id" id="conversation_id" style="display:none">
        <input type="text" value="" name="check_save_draft" id="check_save_draft" style="display:none">
        <table class="table table-borderless m-0 sticky-top">
            <?php require_once('compose_header.php') ?>
            <tbody>
                <table class='table table-borderless'>
                    <tr>
                        <td class='table-mail-input border-bottom'>
                            <label for="from" class='mail-input-label'>From: </label>
                            <input type="text" class='mail-input' id="from" value="<?= $from ?>" disabled name="from">
                        </td>
                    </tr>
                    <tr>
                        <td class='table-mail-input border-bottom'>
                            <label for="to" class='mail-input-label'>To: </label>
                            <input type="text" class='mail-input' oninput="onChangeToInput(event)" onkeypress="onCheckKeyPress(event)" value="<?= $user_receive_mail ?>" id="to" name="to">
                        </td>
                    </tr>
                    <tr>
                        <td class='table-mail-input border-bottom'>
                            <label for="cc" class='mail-input-label'>Cc: </label>
                            <input type="text" class='mail-input' id="cc" name="cc">
                        </td>
                    </tr>
                    <tr>
                        <td class='table-mail-input border-bottom'>
                            <label for="bcc" class='mail-input-label'>Bcc: </label>
                            <input type="text" class='mail-input' id="bcc" name="bcc">
                        </td>
                    </tr>
                    <tr>
                        <td class='table-mail-input border-bottom'>
                            <label for="subject" class='mail-input-label'>Subject: </label>
                            <input type="text" class='mail-input' id="subject" value="<?= $subject ?>" name=" subject">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="content_mail" class='mail-input' id="content_mail" cols="1000" rows="100"><?= $content ?></textarea>
                        </td>
                    </tr>
                </table>
            </tbody>
        </table>
    </form>
</div>