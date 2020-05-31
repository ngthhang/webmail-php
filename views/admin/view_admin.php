<?php
require_once('change_profile_admin.php');
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
    <form action="" method="POST" onsubmit="return changeAdminData()">
        <div class='profile-container'>
            <div>
                <img src='<?= $this_user->avatar ?>' alt='avatar' class='img-fluid profile-avatar' />
            </div>
            <span><?= $sysadmin_text ?></span>
            <div class='profile-info-container'>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Id: </span>
                    <input type="text" class='profile-input col-10' disabled value="<?= $user->id ?>" name="id">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Name: </span>
                    <input type="text" class='profile-input username col-10' onclick="onFocus()" value="<?= $user->name ?>" name="username">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Phone: </span>
                    <input type="text" class='profile-input userphone col-10' onclick="onFocus()" value="<?= $user->phone ?>" name="userphone">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Position: </span>
                    <input type="text" class='profile-input position col-10' onclick="onFocus()" value="<?= $user->position ?>" name="position">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Email: </span>
                    <input type="text" class='profile-input useremail col-10' onclick="onFocus()" value="<?= $user->mail ?>" name="useremail">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Password: </span>
                    <input type="password" class='profile-input userpassword col-10' disabled onclick="onFocus()" value="<?= $user->pass ?>" name="userpassword">
                </div>
                <div class='profile-row'>
                    <p id='error-message' class='ml-3 error-text'></p>
                </div>
                <div class='mt-3 align-self-end'>
                    <button type="submit" name="save_admin" class="mr-2 button btn btn-primary profile-save-btn font-weight-bold">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>