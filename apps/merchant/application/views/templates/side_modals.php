<div id="deleteIpModal" class="modal fade warning" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><img src="<?= $this->config->item('shared_resources_source') ?>images/icons/close_icon.svg" /></button>
                <p class="modal-title red-text">Delete</p>
            </div>
            <div class="modal-body text-center">
                <div class="modal-message"></div>
                <input type="hidden" id="ip_id" />
            </div>
            <div class="modal-footer">
                <button id="delete_ip_btn" class="btn btn-success">Delete IP <i class="fa fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>
