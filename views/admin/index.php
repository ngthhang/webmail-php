<?php
$header = 'User';
$all_user = User::getAll();
?>
<div class='col-xl-10 col-md-8 col-lg-8 p-0'>
    <form action="index.php" method="GET" name="viewDetail">
        <input type="text" value="" style="display: none;" name="controller" class="controller">
        <input type="text" value="" style="display: none;" name="action" class="action">
        <input type="text" value="" style="display: none;" name="user_id" class="user_id">
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
                foreach ($all_user as $i) {
                    $id = $i->id;
                    $name = $i->name;
                    $user_avatar = $i->avatar;
                    $mail = $i->mail;
                    $block = $i->block;
                    if ($block == 1) {
                        $block_text = 'block';
                        $style_block = 'd-flex mail mail-unread';
                    } else {
                        $block_text = 'not_block';
                        $style_block = 'd-flex mail';
                    }
                    if (is_null($user_avatar) || $user_avatar === '') {
                        $user_avatar = 'asset/images/avatar/1.png';
                    }
                ?>
                    <tr class='<?= $style_block ?>'>
                        <td class='col-1 mail-user' style="padding: 5px 0px 5px 30px">
                            <img src="asset/images/icons/<?= $block_text ?>.svg" onclick="onClickBlockUser(<?= $id ?>)" class='delete_icon img-fluid icon mr-2' alt="">
                        </td>
                        <td class='col-3 mail-user' onclick="viewDetailUser(<?= $id ?>)">
                            <img src='<?= $user_avatar ?>' alt='avatar' class='img-fluid mail-avatar' />
                            <p class='font-weight-bold' style="margin-left: 0.5rem ;"><?= $name ?></p>
                        </td>
                        <td class='col-8 mail-content' onclick="viewDetailUser(<?= $id ?>)">
                            <span><?= $mail ?></span>
                            <span class='mail-content-text'>id:<?= $id ?></span>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </form>
</div>