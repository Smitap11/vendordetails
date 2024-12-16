<div class="carousel-item" style="height:400px">
    <div class="form-container">
    <h5 class="form-header">Add Record</h5>
    <form id="addRecordForm" action="post">
        <?= csrf_field() ?>

        <div class="row mb-3">
            <div class="col-md-6">
            <label for="Modified On" class="form-label">Record added On</label>
            <input type="date" class="form-control" id="record-added-on" name="recordAddedOn">
            </div>

            <div class="col-md-6">
            <label for="Modified By" class="form-label">Record added By</label>
            <input type="type" class="form-control" id="record-added-by" name="recordAddedBy">
            </div>
        </div>

        <div class="m-2" id="recordErrMsg" style="color: red;"></div>

        <button type="submit" class="btn gradient-custom">Save</button>

        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center default-toast">
            <div class="toast" id="addRecordSuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Record added successfully.
                </div>
            </div>
        </div>

        </form>
    </div>
</div>


<script type="text/javascript">
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>'; 

    var saveAddRecordUrl = "<?= base_url('AddRecordController/saveAddRecordFormData') ?>";
  </script>    
