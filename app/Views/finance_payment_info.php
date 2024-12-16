<div class="carousel-item">
    <div class="form-container">
    <h5 class="form-header">Finance/Payment Information</h5>
    <form id="financePaymentInfo" action="post">
        <?= csrf_field() ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="Input label" class="form-label"><b>Whom should we contact for finanace statements or invoices?</b></label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="poc-flag" name="pocFlag">
                    <label class="form-check-label" for="flexCheckDefault">
                        If POC is same as Account Manager , then click this checkbox
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="Account Manager" class="form-label">Account Manager</label>
                <input type="text" class="form-control" id="finance-acc-mag" name="financeAccManager">
            </div>

            <div class="col-md-4">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="finance-email" name="financeEmail">
            </div>

            <div class="col-md-4">
                <label for="Contact Number" class="form-label">Contact Number</label>
                <input type="number" class="form-control" id="paymentContactNo" name="contactNumber">
            </div>
        </div>      

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="Mode of Payment" class="form-label">Mode of Payment <span style="color: red;">*</span></label>
                <select class="form-select" id="mode-of-payment" name="modeOfPayment" required>
                    <option selected>Select One</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="Email" class="form-label">Payment Term</label>
                <select class="form-select" id="payment-term" name="paymentTerm">
                    <option selected>Select Payment Term</option>
                    <option value="Pre Payment">Pre Payment</option>
                    <option value="Net 7">Net 7</option>
                    <option value="Net 10">Net 10</option>
                    <option value="Net 15">Net 15</option>
                    <option value="Net 30">Net 30</option>
                    <option value="Net 60">Net 60</option>
                    <option value="Advanace Deposit">Advanace Deposit</option>
                    <option value="COD">COD</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="Contact Number" class="form-label">Select Any</label>
                <select class="form-select" id="select-one" name="paymentSelectAny">
                    <option selected>Select One</option>
                    <option value="Visa">Visa</option>
                    <option value="MasterCard">MasterCard</option>
                </select>
            </div>
        </div>

            <div class="row mb-3">
                <div class="col-md-6">
                <label for="linkField2" class="form-label"><b>Charging Company Name (How charge will reflect on our card system)</b> <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="charging-company-name" name="chargingCompanyName" required>
                </div>

                <div class="col-md-6">
                    <label for="chargeDropshipFee" class="form-label"><b>Do you charge Dropship fee?</b></label>
                    <select class="form-select" id="charge-dropship-fee" name="chargeDropshipFee">
                        <option selected>Select One</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>

              <div class="row mb-3">
                <div class="col-md-6">
                    <label for="multiSelect2" class="form-label"><b>Please select if there are any extra charges applicable from your end apart from dropship</b></label>
                    <select class="form-select" id="extra-dropship-fee" name="extraDropshipFee">
                        <option value="Yes">YES</option>
                        <option value="No">NO</option>
                    </select>
                    </div>
                </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Modified On</label>
                  <input type="date" class="form-control" id="modified-on" name="modifiedOn">
                </div>

                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Modified By</label>
                  <input type="text" class="form-control" id="finanace-modified-by" name="modifiedBy">
                </div>    
              </div>

              <div class="m-2" id="financeErrMsg" style="color: red;"></div>

              <button type="submit" class="btn gradient-custom">Save</button>
            
              <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center default-toast">
                <div class="toast" id="paymentSuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Finanace/Payment Information saved successfully.
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

    var saveFinancePayInfoUrl = "<?= base_url('FinancePayInfoController/saveFinancePayInfoFormData') ?>";
</script>
  