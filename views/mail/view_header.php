<thead>
    <tr class='table-mail-header sticky-top bg-white'>
        <td onclick="onClickBackButton(<?= $previous_action ?>)" class='table-body ml-3'>
            <img src="asset/images/icons/back.png" class='img-fluid icon' alt="">
        </td>
        <td>
            <!--more button -->
            <table class='table table-borderless'>
                <tr class='row'>
                    <td class='table-body d-flex flex-row p-2 mr-4 text-center'>
                        <img src="asset/images/icons/reload.png" class='img-fluid icon mr-2' alt="">
                        <p class='label-text'>Reply</p>
                    </td>
                    <td class='table-body d-flex flex-row p-2 mr-4 text-center'>
                        <img src="asset/images/icons/arrow.png" class='img-fluid icon mr-2' alt="">
                        <p class='label-text'>Forward</p>
                    </td>
                    <td class='table-body d-flex flex-row p-2 mr-4 text-center' onclick="onClickDeleteButton(<?= $id_mail ?>,'home','<?= $previous_action ?>')">
                        <img src="asset/images/icons/bin.png" class='img-fluid icon mr-2' alt="">
                        <p class='label-text'>Delete</p>
                    </td>
                    <td class='table-body d-flex flex-row p-2 mr-4 text-center' onclick="updateStarInMailDetail(<?= $id_mail ?>,'<?= $current_controller ?>', '<?= $current_action ?>','<?= $previous_action ?>')">
                        <img src="asset/images/icons/<?= $star_icon ?>.png" class='img-fluid icon mr-2' alt="">
                        <p class='label-text'><?= $star_text ?></p>
                    </td>
                    <td class='table-body'>
                        <img src="asset/images/icons/more.png" class='img-fluid dropdown-toggle text-center icon mr-2' alt="" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item d-flex flex-row p-2" type="button" onclick="changeUnreadMail(<?= $id_mail ?>,'home','<?= $previous_action ?>')">
                                <img src="asset/images/icons/unread.png" class='img-fluid icon mr-2' alt="">
                                <p>Mark as unread</p>
                            </button>
                            <button class="dropdown-item d-flex flex-row p-2" type="button" onclick="moveMailToSpam(<?= $id_mail ?>,'<?= $current_controller ?>', '<?= $current_action ?>','<?= $previous_action ?>')">
                                <img src="asset/images/icons/<?= $spam_icon ?>.png" class='img-fluid icon mr-2' alt="">
                                <p><?= $spam_text ?></p>
                            </button>
                            <button class="dropdown-item d-flex flex-row p-2" type="button">
                                <img src="asset/images/icons/back.png" class='img-fluid icon mr-2' alt="">
                                <p>Previous</p>
                            </button>
                            <button class="dropdown-item d-flex flex-row p-2" type="button">
                                <img src="asset/images/icons/next.png" class='img-fluid icon mr-2' alt="">
                                <p>Next</p>
                            </button>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</thead>