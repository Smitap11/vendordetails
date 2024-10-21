<div class="carousel-item active">
    <div class="form-container">
      <h5 class="form-header">Contact Information</h5>
      <form id="contactInfoForm" method="post">
      <?= csrf_field() ?>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="email" class="form-label">Email <span style="color: red;">*</span></label>
          <input type="email" class="form-control" id="contact-email" name="contactEmail" value="<?= old('contact-email') ?>" required>
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="col-md-6">
          <label for="additional_email" class="form-label">Additional Email</label>
          <input type="email" class="form-control" id="additional-email" name="additionalEmail" value="<?= old('additional-email') ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="contact_number" class="form-label">Contact Number <span style="color: red;">*</span></label>
          <input type="number" class="form-control" id="contactNumber" name="contactNumber" value="<?= old('contact-number') ?>" required>
        </div>

        <div class="col-md-6">
          <label for="alt_contact_number" class="form-label">Alternate Number</label>
          <input type="number" class="form-control" id="alternateNumber" name="altContactNumber" value="<?= old('alt-contact-number') ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-3">
          <label for="zipcode" class="form-label">Zipcode <span style="color: red;">*</span></label>
          <input type="number" class="form-control" id="contactZipcode" name="contactZipcode" value="<?= old('contactZipcode') ?>" required>
        </div>
        <div class="col-md-3">
          <label for="business_city" class="form-label">City <span style="color: red;">*</span></label>
          <input type="text" class="form-control" name="contactCity" value="<?= old('contactCity') ?>" required>
        </div>
        <div class="col-md-3">
          <label for="business_street" class="form-label">Street <span style="color: red;">*</span></label>
          <input type="text" class="form-control" name="contactStreet" value="<?= old('contactStreet') ?>" required>
        </div>
        <div class="col-md-3">
          <label for="business_country" class="form-label">Country <span style="color: red;">*</span></label>
          <select class="form-select" name="contactCountry" required>
            <option value="United States">United States</option>
            <option value="Option 2">Option 2</option>
          </select>
        </div>
      </div>  

      <div class="row mb-3">
        <div class="col-md-3 m-2">
          <label for="inventory_email" class="form-label">Inventory Email</label>
          <input type="email" class="form-control" name="inventoryEmail" value="<?= old('inventoryEmail') ?>">
        </div>
        <div class="col-md-3 m-2">
          <label for="inventory_contact_no" class="form-label">Inventory Contact Number</label>
          <input type="number" class="form-control" id="inventoryContactNo" name="inventoryContactNo" value="<?= old('inventoryContactNo') ?>">
        </div>
        <div class="col-md-3 m-2">
          <label for="inventory_state" class="form-label">State <span style="color: red;">*</span></label>
          <select class="form-select" name="inventoryState" required>
            <option value="State1">State1</option>
            <option value="State2">State2</option>
            <option value="State3">State3</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="inventory_modified_on" class="form-label">Modified On</label>
          <input type="date" class="form-control" name="inventoryModifiedOn" value="<?= old('inventoryModifiedOn') ?>">
        </div>

        <div class="col-md-6">
          <label for="inventory_modified_by" class="form-label">Modified By</label>
          <input type="text" class="form-control" name="inventoryModifiedBy" value="<?= old('inventoryModifiedBy') ?>">
        </div>
      </div>

      <div class="m-2" id="error-message" style="color: red;"></div>


        <button type="submit" class="btn contact-info-save gradient-custom">Save</button>

        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="position: fixed; top: 10px; right: 10px; min-height: 200px;">
          <div class="toast" id="contactSuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <strong class="me-auto">Success</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              Contact information saved successfully.
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

    var saveContactInfoUrl = "<?= base_url('ContactInformationController/saveContactInfoFormData') ?>";
</script>
  