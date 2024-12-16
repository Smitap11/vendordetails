
<div class="carousel-item">
      <div class="form-container">
        <h5 class="form-header">Order Processing Information</h5>
        <form id="OrderProcessingInfo" method="post">
        <?= csrf_field() ?>

        <div class="row mb-3">
            <div class="col-md-6">
              <label for="howToPlaceOrder" class="form-label"><b>1. How should we place the order?</b> <span style="color: red;">*</span></label>
                <select class="form-select" name="howToPlaceOrder" id="howToPlaceOrder" required>
                    <option value="email" selected>Email</option>
                    <option value="website">Website</option>
                    <option value="ftp">FTP</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="ltl-freight" class="form-label">PRIME order email: <span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="orderPrimeEmail" value="" required>
            </div>
        </div>


        <div id="emailSection" class="row mb-3 order-section">
            <div class="col-md-6">
                <label for="ltl-freight" class="form-label">Email Id <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="emailEmailId" value="">
            </div>
            <div class="col-md-6">
                <label for="websiteHowToPlaceOrder" class="form-label">How should we place the order? <span style="color: red;">*</span></label>
                <select class="form-select" name="emailHowToPlaceOrder" id="websiteHowToPlaceOrder">
                    <option selected>Select One</option>
                    <option value="AWS_SES">AWS_SES</option>
                    <option value="Win-Some_Wood">Win-Some_Wood</option>
                    <option value="Twilio">Twilio</option>
                </select>
            </div>
        </div>

        <div id="websiteSection" class="row mb-3 order-section" style="display: none;">
            <div class="col-md-4">
                <label for="linkField1" class="form-label">Website Url <span style="color: red;">*</span></label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">http://</span>
                    <input type="text" class="form-control" name="orderWebsite" placeholder="Ex. google.com" aria-label="website" aria-describedby="basic-addon1">  
                </div>
            </div>
            <div class="col-md-4">
                <label for="ltl-freight" class="form-label">Username <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="orderUsername" value="">
            </div>
            <div class="col-md-4 form-group">
                <label for="ltl-freight" class="form-label">Password <span style="color: red;">*</span></label>
                <input type="password" class="form-control" name="orderPassword" value="">
            </div>
        </div>
            

        <div id="ftpSection" class="order-section row mb-3" style="display: none;">
            <div class="col-md-4">
                <label for="ftpHost">FTP Host <span style="color: red;">*</span></label>
                <input type="text" id="ftpHost" name="ftpHost" class="form-control" placeholder="Enter FTP host">
            </div>
            <div class="col-md-4">
                <label for="ftpUsername">Username <span style="color: red;">*</span></label>
                <input type="text" id="ftpUsername" name="ftpUsername" class="form-control" placeholder="Enter username">
            </div>
            <div class="col-md-4">
                <label for="ftpPassword">Password <span style="color: red;">*</span></label>
                <input type="password" id="ftpPassword" name="ftpPassword" class="form-control" placeholder="Enter password">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="file" class="form-label"><b>2. Kindly specify the time to ship the order</b></label>
                <input type="text" class="form-control" name="timeToShip" value="" placeholder="Ex. 2-4 days">
            </div>
            
            <div class="col-md-4">
                <label for="shippingContactEmail" class="form-label">Shipping Contact Email</label>
                <input type="email" class="form-control" name="shippingContactEmail" value="">
            </div>
            
            <div class="col-md-4">
                <label for="inventoryHandlingTime" class="form-label">Inventory Handling Time</label>
                <input type="time" class="form-control" id="inventoryHandlingTime" name="inventoryHandlingTime">
            </div>
        </div>

        <div class="row mb-3">
          <label for="address" class="form-label"><b>3. Kindly provide us with the address from where the orders would be shipped</b></label>
          <div class="form-check mx-3">
              <input class="form-check-input" type="checkbox" value="1" id="warehouseAddr" name="warehouseAddr">
              <label class="form-check-label" for="warehouseAddr">
                  If wearhouse address is same as company address then click this checkbox
              </label>
          </div>  
        </div>

        
        <div class="d-flex mb-3 inline-block gap-5">
          <div class="m-2">
              <label for="orderStreet" class="form-label">Street</label>
              <input type="text" class="form-control" name="orderStreet">
          </div>
          <div class="m-2">
              <label for="orderCity" class="form-label">City</label>
              <input type="text" class="form-control" name="orderCity">
          </div>
          <div class="m-2">
              <label for="orderCountry" class="form-label">Contry</label>
              <input type="text" class="form-control" name="orderCountry">
          </div>
          <div class="m-2">
              <label for="state" class="form-label">State</label>
              <input type="text" class="form-control" name="orderState">
          </div>
          <div class="m-2">
              <label for="Zipcode" class="form-label">Zipcode</label>
              <input type="number" class="form-control" id="orderZipcode" name="orderZipcode">
          </div>
      </div>

      
      <div class="row mb-3">
          <div class="col-md-4">
            <div class="form-group">
                <label for="shippingDestinations"><b>4. Do you ship order's to?</b></label>
                <div class="d-flex inline-block gap-4 my-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="alaska" name="shippingDestinations[]" value="Alaska">
                        <label class="form-check-label" for="alaska">Alaska</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hawaii" name="shippingDestinations[]" value="Hawaii">
                        <label class="form-check-label" for="hawaii">Hawaii</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="puertoRico" name="shippingDestinations[]" value="Puerto Rico">
                        <label class="form-check-label" for="puertoRico">Puerto Rico</label>
                    </div>
                </div>
            </div>
          </div>

          <div class="col-md-4">
            <label for="Zipcode" class="form-label">PO BOX NO.</label>
            <input type="text" class="form-control" id="poBoxNo" name="poBoxNo">
          </div>

          <div class="col-md-4">
              <label for="state" class="form-label">Assigned email template</label>
              <select class="form-select" id="assgEmailTemp" name="assgEmailTemp">
                  <option value="Amazon connect call complete" selected>Amazon connect call complete</option>
                  <option value="ANGL Corp with CC Card Attachment">ANGL Corp with CC Card Attachment</option>

                  <option value="Auto follow up Tracking for Email and FTP">Auto follow up Tracking for Email and FTP</option>
                  <option value="Auto followup Tracking for Website">Auto followup Tracking for Website</option>
                  <option value="BRC01: Buyer's Remorse_Customer no longer need the item">BRC01 - Buyer's Remorse_Customer no longer need the item</option>
                  <option value="BRV2: Request RA# and Return address">BRV2 - Request RA# and Return address</option>
                  <option value="BRV4: Customer returned the same item gave Tracking">BRV4 - Customer returned the same item gave Tracking</option>
                  <option value="BRV5: Customer returned the item gave tracking - First Reminder">BARV5: Customer returned the item gave tracking - First Reminder</option>
                  <option value="BRV: 1 Return request - (RA# & return address)">BRV: 1 Return request - (RA# & return address)</option>
                  <option value="Credit Memo">Credit Memo</option>
                  <option value="CRM (Credit Due)">CRM (Credit Due)</option>
                  <option value="CRM (No response from vendor)">CRM (No response from vendor)</option>
                  <option value="CRV16: No shipment - Shipped post cancellation confirmation">CRV16: No shipment - Shipped post cancellation confirmation</option>
                  <option value="CRV10: No shipment - Request to ship the order">CRV10: No shipment - Request to ship the order</option>
                  <option value="CRV11: Either ship or cancel the order">CRV11: Either ship or cancel the order</option>
                  <option value="CRV12: Cancel due to item being OOS">CRV16: No shipment - Shipped post cancellation confirmation</option>
                  <option value="CRV13: Cancelled at our end, vendor to confirm">CRV13: Cancelled at our end, vendor to confirm</option>
                  <option value="CRV14: Cancelled at our end, vendor to confirm - Follow up">CRV14: Cancelled at our end, vendor to confirm - Follow up</option>
                  <option value="CRV15: Order cancelled at our end, No confirmation from the vendor">CRV15: Order cancelled at our end, No confirmation from the vendor</option>
                  <option value="CRV1: Customer request - Cancellation">CRV1: Customer request - Cancellation</option>                  
                  <option value="CRV2: Delay in providing tracking">CRV2: Delay in providing tracking</option>
                  <option value="CRV3: Cancellation request for delay in shipment">CRV3: Cancellation request for delay in shipment</option>
                  <option value="CRV4: Process the order">CRV4: Process the order</option>
                  <option value="CRV5: Cancellation follow up">CRV5: Cancellation follow up</option>
                  <option value="CRV6: To keep the order on hold for OOS">CRV6: To keep the order on hold for OOS</option>
                  <option value="CRV7: Tracking# does not show any update">CRV7: Tracking# does not show any update</option>
                  <option value="CRV8: Fraud Order">CRV8: Fraud Order</option>
                  <option value="CRV9: Either provide tracking or cancel the order">CRV9: Either provide tracking or cancel the order</option>
                  <option value="Customer phone number is missing">Customer phone number is missing</option>
                  <option value="Customer refused the package">Customer refused the package</option>
                  <option value="Customize template for JEWE">Customize template for JEWE</option>
                  <option value="Daily Analysis Report Template">Daily Analysis Report Template</option>
                  <option value="Damage issue (Vendor denied credit #vendor name">Damage issue (Vendor denied credit) #vendor name</option>
                  <option value="Damage reported">Damage reported</option>
                  <option value="Damage in Transit">Damage in Transit</option>
                  <option value="DBST order placing template">DBST order placing template</option>
                  <option value="Defective package issue (Vendor denied credit) #vendor name">Defective package issue (Vendor denied credit) #vendor name</option>
                  <option value="Delay in shipment Home & Hobbies">Delay in shipment Home & Hobbies</option>
                  <option value="Delete PO request initiated">Delete PO request initiated</option>
                  <option value="DFV1: Defective_Refund">DFV1: Defective_Refund</option>
                  <option value="DFV2: Defective_First Reminder">DFV2: Defective_First Reminder</option>
                  <option value="DFV2: Defective second reminder">DFV2: Defective second reminder</option>
                  <option value="DMTV1: Damaged in Transit">DMTV1: Damaged in Transit</option>
                  <option value="DMV1: Damaged_Cx received damaged item">DMV1: Damaged_Cx received damaged item</option>
              </select>
          </div>
      </div>

      <div class="row mb-2">
          <label for="address" class="form-label"><b>5. Shipping Account</b></label>
      </div>
      <div class="row mb-3">    
        <div class="col-md-4">
          <label for="address" class="form-label"><b>a. Ground Shipment</b></label>
          <select class="form-select" name="groundShipment">
              <option value="Home & Hobbies" selected>Home & Hobbies</option>
              <option value="Vendor Account">Vendor Account</option>
          </select>
        </div>

        <div class="col-md-4">
          <label for="address" class="form-label"><b>If your shipping account than shipping carrier</b></label>
            <select class="form-select" name="shippingAcc">
                <option value="No Shipment Details" selected>No Shipment Details</option>
                <option value="UPS">UPS</option>
                <option value="USPS">USPS</option>
                <option value="FedEx">FedEx</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="address" class="form-label"><b>b. LTL Shipment</b></label>
            <select class="form-select" name="ltlShipment">
                <option value="Yes" selected>Yes</option>
                <option value="No">No</option>
            </select>
        </div>
      </div>  

      <div class="d-flex mb-3 inline-block">
          <div class="m-2 ">
              <label for="trackingEmail" class="form-label">Tracking Followup Email Id</label>
              <input type="text" class="form-control" name="trackingEmail">
          </div>
          <div class="m-2">
              <label for="labelEmail" class="form-label">Label Send Email Id</label>
              <input type="text" class="form-control" id="labelEmail" name="labelEmail">
          </div>
          <div class="m-2">
              <label for="labelPhoneNo" class="form-label">Label Send Phone No.</label>
              <input type="text" class="form-control" id="labelPhoneNo" name="labelPhoneNo">
          </div>
          <div class="m-2">
              <label for="state" class="form-label">RRD Involved</label>
              <select class="form-select" id="rrdInvolved" name="rrdInvolved">
                  <option value="Yes" selected>Yes</option>
                  <option value="No">No</option>
              </select>
          </div>
          <div class="m-2">
              <label for="modifiedOn" class="form-label">Modified On</label>
              <input type="date" class="form-control" name="modifiedOn">
          </div>
          <div class="m-2">
              <label for="modifiedBy" class="form-label">Modified By</label>
              <input type="type" class="form-control" name="modifiedBy">
          </div>
      </div>


      <div class="d-flex mb-3 inline-block gap-5">
          <div class="m-2">
              <label for="Street" class="form-label">Cancellation Email Id</label>
              <input type="text" class="form-control" name="cancellationEmail">
          </div>
          <div class="m-2">
              <label for="vendorQueryEmail" class="form-label">Vendor Query Email Id</label>
              <input type="text" class="form-control" name="vendorQueryEmail">
          </div>
          <div class="m-2">
              <label for="orderComments" class="form-label">Comments</label>
              <input type="text" class="form-control" name="orderComments">
          </div>
          <div class="m-2">
              <label for="shippingComments" class="form-label">Shipping Comments</label>
              <input type="text" class="form-control" name="shippingComments">
          </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="shipFollowEmails" class="form-label">Shipment Followup Email Ids</label>
          <input type="text" class="form-control" id="shipFollowEmails" name="shipFollowEmails" placeholder="Please enter comma separated emails">
        </div>
        <div class="col-md-4">
          <label for="state" class="form-label">Shipment Followup Templates</label>
          <select class="form-select" name="shipFollowTemplates">
              <option value="Shipment Followup" selected>Shipment Followup</option>
              <option value="Shipment Reminder">Shipment Reminder</option>
              <option value="Shipment details required_Frank A Edmunds & Co, Inc">Shipment details required_Frank A Edmunds & Co, Inc</option>
              <option value="Shipment details required_simply home">Shipment details required_simply home</option>
              <option value="FRES - Email Follow up">FRES - Email Follow up</option>
              <option value="LEIB - email follow up">LEIB - email follow up</option>
              <option value="COPI - email follow up">COPI - email follow up</option>
              <option value="GOBO - email follow up">GOBO - email follow up</option>
              <option value="AIMS - email follow up">AIMS - email follow up</option>
              <option value="GLBA - email follow up">GLBA - email follow up</option>
              <option value="WRBU_FOLLOW UP">WRBU_FOLLOW UP</option>
              <option value="Order update_WRBU">Order update_WRBU</option>
              <option value="Need order update_ADOR">Need order update_ADOR</option>
              <option value="Need order update_DOVM">Need order update_DOVM</option>
              <option value="Need order update_VIZA">Need order update_VIZA</option>
              <option value="Need order update_CUBI">Need order update_CUBI</option>
              <option value="Need order update_COWA">Need order update_COWA</option>
              <option value="Need order update_ANDE">Need order update_ANDE</option>
              <option value="Need order update_CHIL">Need order update_CHIL</option>
              <option value="Need order update_SPTA">Need order update_SPTA</option>
              <option value="Need order update_GOWO">Need order update_GOWO</option>
              <option value="Need order update_RCLG">Need order update_RCLG</option>
              <option value="Need order update_CARE">Need order update_CARE</option>
              <option value="Need order update_ACHI">Need order update_ACHI</option>
              <option value="Need order update_BLOE">Need order update_BLOE</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="epgAddress" class="form-label">EPG Address</label>
          <textarea class="form-control" name="epgAddress"></textarea>
        </div>

      </div>

        <div class="m-2" id="orderErrMsg" style="color: red;"></div>
          
          <button type="submit" class="btn gradient-custom">Save</button>

          <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center default-toast">
            <div class="toast" id="orderSuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Order Processing Information saved successfully.
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>


  <script type="text/javascript">
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>'; 

    var saveOrderProcessingUrl = "<?= base_url('OrderProcessingController/saveOrderProcessingFormData') ?>";
  </script>    
