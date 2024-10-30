<div class="carousel-item">
    <div class="form-container">
      <h5 class="form-header">Inventory Update</h5>
      <form id="inventoryUpdateForm" method="post">
      <?= csrf_field() ?>
      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label"><b>How would you be sending us Inventory Updates? <span style="color: red;">*</span></b></label>
          <select class="form-select" name="inventrySendingFrom" required>
            <option value="Email">Email</option>
            <option value="Website">Website</option>
            <option value="FTP">FTP</option>
            <option value="Made To Order">Made To Order</option>
            <option value="Desktop Application">Desktop Application</option>
            <option value="EDI">EDI</option>
            <option value="Link">Link</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="inventory_email" class="form-label">Email <span style="color: red;">*</span></label>
          <input type="email" class="form-control" id="inventory-email" name="inventoryEmail" value="<?= old('inventory-email') ?>" placeholder="Ex. sam@gmail.com" required>
        </div>
      </div>

      <div class="row mb-3">
      <label for="contact_number" class="form-label"><b>Inventory Cycle: Specify which days of week inventory file will be shared?</b> <span style="color: red;">*</span></label>
        <div class="col-md-6">
          <label for="time period" class="form-label">Select Time Period</label>
          <select class="form-select" name="timePeriod" required>
            <option value="Monthly">Monthly</option>
            <option value="Quarterly">Quarterly</option>
            <option value="FTP">Weekly</option>
            <option value="Made To Order">Daily</option>
          </select>
        </div>

        <div class="col-md-6">
          <label for="Comments" class="form-label">Comments</label>
          <input type="text" class="form-control" id="inventory-Comments" name="inventoryComments" value="<?= old('inventoryComments') ?>" required>
        </div>
      </div>

      <div class="row">
      <label class="form-label"><b>Whom should we contact for Inventory Update Details?</b></label>
        <div class="d-flex mb-3">
            <div class="m-2">
            <label for="Account Manager" class="form-label">Account Manager</label>
            <input type="text" class="form-control" name="accountManager" value="<?= old('accountManager') ?>">
            </div>
            <div class="m-2">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
            </div>
            <div class="m-2">
            <label for="Contact Number" class="form-label">Contact Number</label>
            <input type="number" class="form-control" id="inventoryContactNumber" name="contactNumber" value="">
            </div>
            <div class="m-2">
            <label for="modified On" class="form-label">Modified On</label>
            <input type="date" class="form-control" name="modifiedOn" value="<?= old('modifiedOn') ?>">
            </div>
            <div class="m-2">
            <label for="modified By" class="form-label">Modified By</label>
            <input type="text" class="form-control" name="modifiedBy" value="<?= old('modifiedBy') ?>">
            </div>
        </div> 
      </div> 

      <div class="m-2" id="inventoryErrMsg" style="color: red;"></div>

      <button type="submit" class="btn contact-info-save gradient-custom">Save</button>

        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="position: fixed; top: 10px; right: 10px; min-height: 200px;">
          <div class="toast" id="inventorySuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <strong class="me-auto">Success</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              Inventory Updated successfully.
            </div>
          </div>
        </div>

      </form>
      </div>
    </div>

  <!-- Define the URL using PHP -->

<script type="text/javascript">
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>'; 

    var saveInventoryUpdateUrl = "<?= base_url('InventoryUpdateController/saveInventoryUpdateFormData') ?>";

</script>
  