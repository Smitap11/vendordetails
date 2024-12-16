<div class="carousel-item">
    <div class="form-container">
    <h5 class="form-header">Vendors Finanace Details</h5>
    <form id="vendorFinanceForm" action="post">
    <?= csrf_field() ?>

        <div class="row mb-3">
        <div class="col-md-12"><b>Invoice Sourcing Details</b></div>
        <div class="col-md-6">
            <label for="invoiveSrcAllocation" class="form-label">Allocation</label>
            <select class="form-select" id="invoiveSrcAllocation" name="invoiveSrcAllocation">
            <option selected>Select</option>
            <option value="Karan Singh Chauhan">Karan Singh Chauhan</option>
            <option value="Shahrukh Khan">Shahrukh Khan</option>
            <option value="Smita Parab">Smita Parab</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="vendor-level" class="form-label">Vendor Level</label>
            <select class="form-select" id="vendor-level" name="invoiveSrcLevel">
              <option selected>Select Level</option>
              <option value="Level 1">Level 1</option>
              <option value="Level 2">Level 2</option>
              <option value="Level 3">Level 3</option>
            </select>
        </div>
        </div>

        <div class="row mb-3">
        <div class="col-md-12"><b>Dropship fee and shipping Details</b></div>
        <div class="col-md-6">
            <label for="Dropship Fee" class="form-label">Dropship Fee</label>
            <input type="text" class="form-control" id="dropship-fee" name="dropshipFee">
        </div>

        <div class="col-md-6">
            <label for="Shipping Terms - Ground" class="form-label">Shipping Terms - Ground</label>
            <input type="text" class="form-control" id="shipping-terms" name="shippingTerm" placeholder="Shipping Terms - Ground">
        </div>
        </div>

        <div class="row mb-3">
        <div class="col-md-12"><b>Charge Details</b></div>
        <div class="col-md-6">
            <label for="textField2" class="form-label">Mode Of Payment</label>
            <select class="form-select" id="mode-of-payment" name="modeOfPayment">
              <option>Select Payment Mode</option>
              <option value="Credit Card">Credit Card</option>
              <option value="Credit Card with Net Terms">Credit Card with Net Terms</option>
              <option value="ACH with Net Terms">ACH with Net Terms</option>
              <option value="PayPal with Net Terms">PayPal with Net Terms</option>
              <option value="Advance">Advance</option>
            </select>
        </div>

        </div>
        <button type="submit" class="btn gradient-custom">Save</button>

        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center default-toast">
            <div class="toast" id="financeSuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Vendor Finance details saved successfully.
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

    var saveVendorFinanceUrl = "<?= base_url('VendorFinanceController/saveVendorFinanceFormData') ?>";
 </script>
  