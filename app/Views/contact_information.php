<div class="carousel-item">
    <div class="form-container">
      <h5>Contact Information</h5>
      <form id="contactInfoForm" method="post">
      <?= csrf_field() ?>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="contact-email" name="contactEmail" value="<?= old('contact-email') ?>">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="col-md-6">
          <label for="additional_email" class="form-label">Additional Email</label>
          <input type="email" class="form-control" id="additional-email" name="additionalEmail" value="<?= old('additional-email') ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="contact_number" class="form-label">Contact Number</label>
          <input type="number" class="form-control" id="contact-number" name="contactNumber" value="<?= old('contact-number') ?>">
        </div>

        <div class="col-md-6">
          <label for="alt_contact_number" class="form-label">Alternate Number</label>
          <input type="number" class="form-control" id="alt-contact-number" name="altContactNumber" value="<?= old('alt-contact-number') ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-3">
          <label for="zipcode" class="form-label">Zipcode</label>
          <input type="number" class="form-control" name="contactZipcode" value="<?= old('contactZipcode') ?>">
        </div>
        <div class="col-md-3">
          <label for="business_city" class="form-label">City</label>
          <input type="text" class="form-control" name="contactCity" value="<?= old('contactCity') ?>">
        </div>
        <div class="col-md-3">
          <label for="business_street" class="form-label">Street</label>
          <input type="text" class="form-control" name="contactStreet" value="<?= old('contactStreet') ?>">
        </div>
        <div class="col-md-3">
          <label for="business_country" class="form-label">Country</label>
          <select class="form-select" name="contactCountry">
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
          <input type="number" class="form-control" name="inventoryContactNo" value="<?= old('inventoryContactNo') ?>">
        </div>
        <div class="col-md-3 m-2">
          <label for="inventory_state" class="form-label">State</label>
          <select class="form-select" name="inventoryState">
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

        <button type="submit" class="btn contact-info-save gradient-custom">Save</button>

        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="position: fixed; top: 10px; right: 10px; min-height: 200px;">
          <div class="toast" id="successToast" role="alert" aria-live="assertive" aria-atomic="true">
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
  