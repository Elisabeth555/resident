<!-- Modal for Upload Invoice -->
<div class="modal fade" id="uploadInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="uploadInvoiceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadInvoiceLabel">Upload Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="upload_invoice.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  Invoice id:  <input type="text" id="id" name="reservation_id">
                    <input type="hidden" id="paymentIdField" name="pay_id">
                    <input type="hidden" id="resIdField" name="res_id">
                    <input type="hidden" id="status" name="status">
                    <div class="form-group">
                        <label for="invoice">Select Invoice</label>
                        <input type="file" class="form-control" name="invoice" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
