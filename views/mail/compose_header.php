<thead class='bg-white'>
    <tr>
        <td colspan="4" class='p-0 pt-3 d-flex flex-row align-items-start justify-content-between'>
            <div class='d-flex flex-column col-xl-9 col-md-8 col-lg-8'>
                <ul class="nav nav-pills " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="format-tab" data-toggle="tab" href="#format" role="tab" aria-controls="format" aria-selected="true">Format</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="insert-tab" data-toggle="tab" href="#insert" role="tab" aria-controls="insert" aria-selected="false">Insert</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade pt-2" id="format" role="tabpanel" aria-labelledby="format-tab">
                        <div>
                            <div>
                                <img src="asset/images/compose/bold-solid.svg" class='img-fluid icon m-2' alt="">
                                <img src="asset/images/compose/italic-solid.svg" class='img-fluid icon m-2' alt="">
                                <img src="asset/images/compose/underline-solid.svg" class='img-fluid icon m-2' alt="">
                                <img src="asset/images/compose/list-solid.svg" class='img-fluid icon m-2' alt="">
                                <img src="asset/images/compose/list-ol-solid.svg" class='img-fluid icon m-2' alt="">
                                <img src="asset/images/compose/align-center-solid.svg" class='img-fluid icon m-2' alt="">
                                <img src="asset/images/compose/align-justify-solid.svg" class='img-fluid icon m-2' alt="">
                                <img src="asset/images/compose/align-left-solid.svg" class='img-fluid icon m-2' alt="">
                                <img src="asset/images/compose/align-right-solid.svg" class='img-fluid icon m-2' alt="">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                        <a>Heading 1</a>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" alt="">Normal</a>
                                        <a class="dropdown-item" alt="">Heading 2</a>
                                        <a class="dropdown-item" alt="">Title</a>
                                    </div>
                                </div>
                                <img src="asset/images/compose/undo-solid.svg" class='img-fluid icon m-2' alt="">
                                <img src="asset/images/compose/redo-solid.svg" class='img-fluid icon m-2' alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade pt-2" id="insert" role="tabpanel" aria-labelledby="insert-tab">
                        <table class='m-0 table table-borderless'>
                            <tr class='d-flex flex-row'>
                                <td class='p-0 d-flex flex-row px-3 align-items-center'>
                                    <img src="asset/images/compose/fileclip-solid.svg" class='img-fluid icon m-2' alt="">
                                    <span class='label-text'>file</span>
                                </td>
                                <td class='p-0 d-flex flex-row px-3 align-items-center'>
                                    <img src="asset/images/compose/table-solid.svg" class='img-fluid icon m-2' alt="">
                                    <span class='label-text'>Table</span>
                                </td>
                                <td class='p-0 d-flex flex-row px-3 align-items-center'>
                                    <img src="asset/images/compose/link-solid.svg" class='img-fluid icon m-2' alt="">
                                    <span class='label-text'>link</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class='d-flex flex-row col-xl-4 col-md-5 col-lg-5'>
                <div class='mail-button' id='draft' onclick="onSubmitMail(id)">
                    <img src="asset/images/icons/draft.png" class='img-fluid icon m-2' alt="">
                    <span>Save draft</span>
                </div>
                <div class='mail-button' id='discard' onclick="onSubmitMail(id)">
                    <img src="asset/images/icons/bin.png" class='img-fluid icon m-2' alt="">
                    <span>Discard</span>
                </div>
                <div class='mail-button' id='delete' onclick="onSubmitMail(id)">
                    <img src="asset/images/icons/sent.png" class='img-fluid icon m-2' alt="">
                    <span>Sent</span>
                </div>
            </div>
        </td>
    </tr>
</thead>