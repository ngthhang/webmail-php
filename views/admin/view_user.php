<?php
require_once('change_profile_user.php');
?>
<div class='col-xl-10 col-md-8 col-lg-8 p-0'>
    <table class='table border-bottom'>
        <thead>
            <tr>
                <td colspan="4" class='table-home-header sticky-top bg-white border-bottom' style="padding: 24px 30px">
                    <p class='label-text font-weight-bold'><?= $header ?></p>
                </td>
            </tr>
        </thead>
    </table>
    <form action="" method="POST" onsubmit="return changeUserData()">
        <input type="text" value="<?= $this_user->block ?>" name="block" style="display: none;">
        <div class='profile-container'>
            <div>
                <img src='<?= $user_avatar ?>' alt='avatar' class='img-fluid profile-avatar' />
            </div>
            <span>User</span>
            <div class='profile-info-container'>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Id: </span>
                    <input type="text" class='profile-input col-10' disabled value="<?= $id ?>" name="id">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Name: </span>
                    <input type="text" class='profile-input username col-10' onclick="onFocus()" value="<?= $this_user->name ?>" name="username">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Phone: </span>
                    <input type="text" class='profile-input userphone col-10' onclick="onFocus()" value="<?= $this_user->phone ?>" name="userphone">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Email: </span>
                    <input type="text" class='profile-input useremail col-10' onclick="onFocus()" value="<?= $this_user->mail ?>" name="useremail">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Password: </span>
                    <input type="password" class='profile-input userpassword col-10' onclick="onFocus()" value="<?= $this_user->pass ?>" name="userpassword">
                </div>
                <div class='profile-row'>
                    <p id='error-message' class='ml-3 error-text'></p>
                </div>
                <div class='mt-3 align-self-end'>
                    <button type="submit" name="change_block" class="mr-2 button btn btn-danger profile-save-btn font-weight-bold"><?= $block_text ?></button>
                    <button type="submit" name="save_user" class="mr-2 button btn btn-primary profile-save-btn font-weight-bold">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>