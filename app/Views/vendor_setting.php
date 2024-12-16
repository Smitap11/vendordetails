<div class="carousel-item">
    <div class="form-container" >
    <h5 class="form-header">Vendor Settings</h5>
    <form id="vendorSettingForm" method="post">
        <?= csrf_field() ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="vendorSettingType" class="form-label">Type</label>
                <select class="form-select" id="vendorSettingType" name="vendorSettingType">
                <option value="FBA" selected>FBA</option>
                <option value="Dropship">Dropship</option>
                <option value="Both">Both</option>
                </select>
            </div>

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
                <option value="Karan Singh Chauhan">Karan Singh Chauhan</option>
                <option value="Shahrukh Khan">Shahrukh Khan</option>
                <option value="Smita Parab">Smita Parab</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="Prime Eligible" class="form-label">Prime Eligible</label>
                <select class="form-select" id="prime-eligible" name="primeEligible">
                <option value="Yes" selected>Yes</option>
                <option value="No">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="ourShippingAccount" class="form-label">Our Shipping Account <span style="color: red;">*</span></label>
                <select class="form-select" id="ourShippingAccount" name="ourShippingAccount" required>
                    <option value="Yes" selected>Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="Shipping Account Detail" class="form-label">Shipping Account Detail</label>
                <select class="form-select" id="shipping-account-detail" name="shippingAccountDetail">
                    <option value="USPS" selected>USPS</option>
                    <option value="No Ship Details">No Ship Details</option>
                    <option value="UPS">UPS</option>
                    <option value="FedEx">FedEx</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="dateField2" class="form-label">Shipping Account Number</label>
                <select class="form-select" id="shipping-account-number" name="shippingAccountNumber">
                <option value="Yes" selected>YES</option>
                <option value="No">No</option>
                </select>
            </div>
        </div>

        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="Shipping Account Detail" class="form-label">Need to share the Label</label>
                <select class="form-select" id="vendor-share-label" name="vendorShareLabel">
                <option value="N/A">N/A</option>
                <option value="No" selected>No</option>
                <option value="Yes">Yes</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="dateField2" class="form-label">Modified On</label>
                <input type="date" class="form-control" id="modified-on" name="modifiedOn">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="modified By" class="form-label">Modified By</label>
                <input type="text" class="form-control" name="modifiedBy" id="modifiedBy">
            </div>

            <div class="col-md-6">
                <label for="vendorNote" class="form-label">Vendor Note</label>
                <input type="input" class="form-control" id="vendorNote" name="vendorNote">
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

        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center default-toast">
            <div class="toast" id="vendorSuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
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
  