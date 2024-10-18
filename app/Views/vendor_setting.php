<div class="carousel-item">
    <div class="form-container">
    <h5>Vendor Settings</h5>
    <form id="vendorSettingForm" method="post">
        <?= csrf_field() ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="selectBox2" class="form-label">Type</label>
                <select class="form-select" id="selectBox2" name="vendorSettingType">
                <option value="fba" selected>FBA</option>
                <option value="fbm">FBM</option>
                </select>
            </div>

            <!-- Second column -->
            <div class="col-md-6">
                <label for="inputBox2" class="form-label">FBA SKU</label>
                <input type="text" class="form-control" id="fba-sku" name="fbaSku" placeholder="Ex. VVULK">
            </div>
        </div>
 
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="linkField2" class="form-label">Credit Card</label>
                <input type="text" class="form-control" id="credit-card" name="creditCard" placeholder="Ex. 982309872356">
            </div>

            <div class="col-md-6">
                <label for="Vendor Manager" class="form-label">Vendor Manager</label>
                <select class="form-select" id="vendor-manager" name="vendorManager">
                <option>Select Vendor Manager</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="Prime Eligible" class="form-label">Prime Eligible</label>
                <select class="form-select" id="prime-eligible" name="primeEligible">
                <option value="1" selected>YES</option>
                <option value="0">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="dateField2" class="form-label">Our Shipping Account</label>
                <select class="form-select" id="vendor-manager" name="ourShippingAccount">
                <option value="1" selected>YES</option>
                <option value="0">No</option>
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="Shipping Account Detail" class="form-label">Shipping Account Detail</label>
                <select class="form-select" id="shipping-account-detail" name="shippingAccountDetail">
                <option value="usps" selected>USPS</option>
                <option value="0">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="dateField2" class="form-label">Shipping Account Number</label>
                <select class="form-select" id="shipping-account-number" name="shippingAccountNumber">
                <option value="1" selected>YES</option>
                <option value="0">No</option>
                </select>
            </div>
        </div>

        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="Shipping Account Detail" class="form-label">Need to share the Label</label>
                <select class="form-select" id="vendor-share-label" name="vendorShareLabel">
                <option value="1" selected>YES</option>
                <option value="0">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="dateField2" class="form-label">Modified On</label>
                <input type="date" class="form-control" id="modified-on" name="modifiedOn">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="Shipping Account Detail" class="form-label">Modified By</label>
                <select class="form-select" id="vendor-share-label" name="modifiedBy">
                <option value="1" selected>YES</option>
                <option value="0">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="dateField2" class="form-label">Vendor Note</label>
                <input type="input" class="form-control" id="modified-on" name="vendorNote">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="moq-flag" name="moqFlag">
                    <label class="form-check-label" for="moq-flag">
                        MOQ Flag
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn gradient-custom">Save</button>

        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="position: fixed; top: 10px; right: 10px; min-height: 200px;">
            <div class="toast" id="successToast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Vendor Setting details saved successfully.
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

    var saveVendorSettingUrl = "<?= base_url('VendorSettingController/saveVendorSettingFormData') ?>";
 </script>
  