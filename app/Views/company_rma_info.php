<div class="carousel-item">
    <div class="form-container">
        <h5 class="form-header">Company RMA Information</h5>
        <form id="companyRmaInfoForm" action="post">
            <?= csrf_field() ?>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="selectBox2" class="form-label"><b>Do you offer additonal discount against No Return
                            Policy? (Yes/No)</b></label>
                    <select class="form-select" id="add-disc-no-return" name="addDiscNoReturn">
                        <option value="YES" selected>Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="selectBox2" class="form-label"><b>Contact person for RMA.</b></label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="poc-rma-flag" name="pocRmaFlag">
                        <label class="form-check-label" for="rma-contact-person">
                            If POC is same as Account Manager , then click this checkbox
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="Account Manager" class="form-label">Account Manager <span
                            style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="rma-acc-mangr" name="rmaAccManager" required>
                </div>

                <div class="col-md-4">
                    <label for="Email" class="form-label">Email <span style="color: red;">*</span></label>
                    <input type="email" class="form-control" id="rma-email" name="rmaEmail" required>
                </div>

                <div class="col-md-4">
                    <label for="Contact Number" class="form-label">Contact Number <span
                            style="color: red;">*</span></label>
                    <input type="number" class="form-control" id="rmaContactNumber" name="rmaContactNumber" required>
                </div>

            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="days of delivery" class="form-label"><b>In how many days returns would be authorized
                            from the date of delivery?</b></label>
                    <input type="text" class="form-control" id="days-of-delivery" name="daysOfDelivery"
                        placeholder="Ex. 2"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="dateField2" class="form-label"><b>Please provide us with the return address where
                            customer should send defective/damaged items?</b></label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="return-add-flag"
                            name="returnAddFlag">
                        <label class="form-check-label" for="flexCheckDefault">
                            If return address is same as company address then click this checkbox.
                        </label>
                    </div>
                </div>
            </div>

            <div class="d-flex mb-3">
                <div class="m-2">
                    <label for="Street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="rmaStreet">
                </div>
                <div class="m-2">
                    <label for="Email" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="rmaCity">
                </div>
                <div class="m-2">
                    <label for="Contact Number" class="form-label">Contry</label>
                    <select class="form-select" id="selectBox2" name="rmaCountry">
                        <option value="1">United State</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="m-2">
                    <label for="state" class="form-label">State</label>
                    <select class="form-select" id="selectBox2" name="rmaState">
                        <option value="1">smndns</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="m-2">
                    <label for="Zipcode" class="form-label">Zipcode</label>
                    <input type="number" class="form-control" id="rmaZipcode" name="rmaZipcode">
                </div>
            </div>

            <div class="row mb-3">
                <label for="dateField2" class="form-label"><b>Please advice the restocking fees in case of Buyer's
                        Remourse</b></label>
                <div class="col-md-6">
                    <select class="form-select" id="selectBox2" name="restockingFeeUnit">
                        <option value="%" selected>%</option>
                        <option value="$">$</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="restocking-fee" name="restockingFee"
                        placeholder="10"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="comments" class="form-label"><b>Comments</b></label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="comment"
                        name="Comments"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="ModifiedOn" class="form-label"><b>Modified On</b></label>
                    <input type="date" class="form-control" id="modifiedOn" name="modifiedOn" />
                </div>
                <div class="col-md-4">
                    <label for="ModifiedBy" class="form-label"><b>Modified By</b></label>
                    <input type="text" class="form-control" id="modifiedBy" name="modifiedBy">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="file" class="form-label"><b>Processed file</b></label>
                    <input class="form-control" type="file" id="file" name="file" />
                    <label for="formFile" class="form-label m-1"><b>Processed file list:</b></label>
                </div>
            </div>

            <div class="m-2" id="rma-error-message" style="color: red;"></div>

            <button type="submit" class="btn gradient-custom">Save</button>

            <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center"
                style="position: fixed; top: 10px; right: 10px; min-height: 200px;">
                <div class="toast" id="rmaSuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Success</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Company RMA information saved successfully.
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

var saveCompanyRmaInfoUrl = "<?= base_url('CompanyRmaInfoController/saveCompanyRmaFormData') ?>";
</script>