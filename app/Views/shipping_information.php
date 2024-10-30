
<div class="carousel-item">
    <div class="form-container">
        <h5 class="form-header">Shipping Information</h5>
        <form method="post" id="shippingInfoForm">
        <?= csrf_field() ?>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="shipping-account" class="form-label">Shipping Account</label>
                    <select class="form-select" name="shippingAccount" id="shipping-account">
                        <option value="Vendor Account" selected>Vendor Account</option>
                        <option value="Option 2">Option 2</option>
                        <option value="Option 3">Option 3</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="ltl-freight" class="form-label">LTL/Freight Shipments</label>
                    <select class="form-select" name="ltlFreight" id="ltl-freight">
                        <option value="Select LTL" selected>Select LTL</option>
                        <option value="Option 2">Option 2</option>
                        <option value="Option 3">Option 3</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="share-label" class="form-label">Need to share the Label</label>
                    <select class="form-select" name="shareLabel" id="share-label">
                        <option selected>Select One</option>
                        <option value="Option 2">Option 2</option>
                        <option value="Option 3">Option 3</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="rate-type" class="form-label">Rate Type</label>
                    <select class="form-select" name="rateType" id="rate-type">
                        <option selected>Select Rate Type</option>
                        <option value="Option 2">Option 2</option>
                        <option value="Option 3">Option 3</option>
                    </select>
                </div>
            </div>

          <div class="row mb-3">
                <div class="col-md-6">
                    <label for="international-shipping" class="form-label">International Shipping</label>
                    <select class="form-select" name="internationalShipping" id="international-shipping">
                        <option value="Vendor Account" selected>Vendor Account</option>
                        <option value="Option 2">Option 2</option>
                        <option value="Option 3">Option 3</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="push-company-name" class="form-label">Push CompanyName in AddressLine1?</label>
                    <select class="form-select" name="pushCompanyName" id="push-company-name">
                        <option value="Vendor Account" selected>Vendor Account</option>
                        <option value="Option 2">Option 2</option>
                        <option value="Option 3">Option 3</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="shipping-info-comments" class="form-label">Comments</label>
                    <textarea class="form-control" name="shippingInfoComments" id="shipping-info-comments" rows="2"></textarea>
                </div>

                <div class="col-md-6">

                    <label for="shippingModifiedOn" class="form-label">Modified On</label>
              <!-- <input type="date" class="form-control" id="shippingModifiedOn" name="modifiedOn" aria-label="Modified On" aria-describedby="basic-addon1"> -->
              <input type="date" class="form-control" id="shippingModifiedOn" name="modifiedOn" aria-label="Modified On" aria-describedby="basic-addon1">


                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="shipping-modified-by" class="form-label">Modified By</label>
                    <input type="text" class="form-control" name="shippingModifiedBy" id="shipping-modified-by">
                </div>
                <div class="col-md-6">
                    <label for="shipment-updating-type" class="form-label">Shipment Updating Type</label>
                    <select class="form-select" name="shipmentUpdatingType" id="shipment-updating-type">
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="shipping-tracking-source" class="form-label">Shipping Tracking Source</label>
                    <input type="text" class="form-control" name="shippingTrackingSource" id="shipping-tracking-source">
                </div>
            </div>

            <button type="submit" id="saveShippingInfoBtn" class="btn gradient-custom">Save</button>

            <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="position: fixed; top: 10px; right: 10px; min-height: 200px;">
                <div class="toast" id="shippingSuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Shipping information saved successfully.
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

    var saveShippingInfoUrl = "<?= base_url('ShippingInformationController/saveShippingInfoFormData') ?>";
 </script>
  