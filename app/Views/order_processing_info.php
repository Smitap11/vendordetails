
<div class="carousel-item">
      <div class="form-container">
        <h5 class="form-header">Order Processing Information</h5>
        <form id="" method="post">
        <?= csrf_field() ?>

        <div class="row mb-3">
            <div class="col-md-6">
              <label for="file" class="form-label"><b>1. How should we place the order?</b> <span style="color: red;">*</span></label>
                <select class="form-select" name="howToPlaceOrder" id="howToPlaceOrder" required>
                    <option value="Email" selected>Email</option>
                    <option value="Website">Website</option>
                    <option value="FTP">FTP</option>
                    <option value="EDI">EDI</option>
                    <option value="API">API</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="ltl-freight" class="form-label">PRIME order email: <span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="orderPrimeEmail" value="" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
              <label for="linkField1" class="form-label">Website Url <span style="color: red;">*</span></label>
                <div class="input-group">
                  <span class="input-group-text" id="basic-addon1">http://</span>
                  <input type="text" class="form-control" name="orderWebsite" placeholder="Ex. google.com" aria-label="website" aria-describedby="basic-addon1" required>  
              </div>
            </div>

            <div class="col-md-4">
                <label for="ltl-freight" class="form-label">Username <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="orderUsername" value="" required>
            </div>
            
            <div class="col-md-4">
                <label for="ltl-freight" class="form-label">Password <span style="color: red;">*</span></label>
                <input type="password" class="form-control" name="orderPassword" value="" required>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="ltl-freight" class="form-label">Email Id <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="websiteEmail" value="" required>
            </div>
            
            <div class="col-md-6">
            <label for="file" class="form-label">How should we place the order? <span style="color: red;">*</span></label>
              <select class="form-select" name="websiteHowToPlaceOrder" id="websiteHowToPlaceOrder" required>
                    <option value="AWS_SES" selected>AWS_SES</option>
                    <option value="Website">Website</option>
                    <option value="FTP">FTP</option>
                    <option value="EDI">EDI</option>
                    <option value="API">API</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="file" class="form-label"><b>2. Kindly specify the time to ship the order</b></label>
                <input type="text" class="form-control" name="timeToShip" value="" required>
            </div>
            
            <div class="col-md-4">
                <label for="ltl-freight" class="form-label">Shipping contact email</label>
                <input type="email" class="form-control" name="shippingContactEmail" value="" required>
            </div>
            
            <div class="col-md-4">
                <label for="ltl-freight" class="form-label">Inventory handling time</label>
                <input type="email" class="form-control" name="shippingContactEmail" value="" required>
            </div>
        </div>

        <div class="row mb-3">
          <label for="address" class="form-label"><b>3. Kindly provide us with the address from where the orders would be shipped</b></label>
          <div class="form-check mx-3">
              <input class="form-check-input" type="checkbox" value="1" id="warehouseAddr" name="warehouseAddr">
              <label class="form-check-label" for="warehouseAddr">
                  If wherehouse address is same as company address then click this checkbox
              </label>
          </div>  
        </div>

        
        <div class="d-flex mb-3">
          <div class="m-2">
              <label for="orderStreet" class="form-label">Street</label>
              <input type="text" class="form-control" id="orderStreet" name="orderStreet">
          </div>
          <div class="m-2">
              <label for="orderCity" class="form-label">City</label>
              <input type="text" class="form-control" id="orderCity" name="orderCity">
          </div>
          <div class="m-2">
              <label for="orderCountry" class="form-label">Contry</label>
              <select class="form-select" id="orderCountry" name="orderCountry">
                  <option value="1">United State</option>
                  <option value="0">No</option>
              </select>
          </div>
          <div class="m-2">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="orderState" name="orderState">
                  <option value="1">smndns</option>
                  <option value="0">No</option>
              </select>
          </div>
          <div class="m-2">
              <label for="Zipcode" class="form-label">Zipcode</label>
              <input type="number" class="form-control" id="orderZipcode" name="orderZipcode">
          </div>
      </div>

      
      <div class="row mb-3">
          <div class="col-md-4">
          <label for="file" class="form-label"><b>4. Do you ship order's to?</b></label>
            <div class="d-flex gap-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Alaska" id="alaska" name="alaska">
                <label class="form-check-label" for="warehouseAddr">
                    Alaska &nbsp;
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Hawaii" id="hawaii" name="Hawaii">
                <label class="form-check-label" for="warehouseAddr">
                    Hawaii &nbsp;
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Puerto Rico" id="puertoRico" name="puertoRico">
                <label class="form-check-label" for="warehouseAddr">
                    Puerto Rico
                </label>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <label for="Zipcode" class="form-label">PO BOX NO.</label>
            <input type="number" class="form-control" id="poBoxNo" name="poBoxNo">
          </div>

          <div class="col-md-4">
              <label for="state" class="form-label">Assigned email template</label>
              <select class="form-select" id="assgEmailTemp" name="assgEmailTemp">
                  <option value="1">smndns</option>
                  <option value="0">No</option>
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
              <option value="1">smndns</option>
              <option value="0">No</option>
          </select>
        </div>

        <div class="col-md-4">
          <label for="address" class="form-label"><b>If your shipping account than shipping carrier</b></label>
            <select class="form-select" name="shippingAcc">
                <option value="1">smndns</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="address" class="form-label"><b>b. LTL Shipment</b></label>
            <select class="form-select" name="ltlShipment">
                <option value="1">smndns</option>
                <option value="0">No</option>
            </select>
        </div>
      </div>  

      <div class="d-flex mb-3">
          <div class="m-2">
              <label for="Street" class="form-label">Tracking followup email id</label>
              <input type="text" class="form-control" name="trackingEmailt">
          </div>
          <div class="m-2">
              <label for="Email" class="form-label">Label send email id</label>
              <input type="text" class="form-control" id="city" name="labelEmail">
          </div>
          <div class="m-2">
              <label for="Contact Number" class="form-label">Label send phone no.</label>
              <select class="form-select" id="selectBox2" name="labelPhoneNo">
                  <option value="1">United State</option>
                  <option value="0">No</option>
              </select>
          </div>
          <div class="m-2">
              <label for="state" class="form-label">RRD Involved</label>
              <select class="form-select" id="selectBox2" name="rrdInvolved">
                  <option value="1">smndns</option>
                  <option value="0">No</option>
              </select>
          </div>
          <div class="m-2">
              <label for="Zipcode" class="form-label">Modified On</label>
              <input type="date" class="form-control" name="modifiedOn">
          </div>
          <div class="m-2">
              <label for="Zipcode" class="form-label">Modified By</label>
              <input type="date" class="form-control" name="modifiedBy">
          </div>
      </div>


      <div class="d-flex mb-3">
          <div class="m-2">
              <label for="Street" class="form-label">Cancellation email Id</label>
              <input type="text" class="form-control" name="cancellationEmail">
          </div>
          <div class="m-2">
              <label for="Email" class="form-label">Vendor query email Id</label>
              <input type="text" class="form-control" name="vendorQueryEmail">
          </div>
          <div class="m-2">
              <label for="Contact Number" class="form-label">Comments</label>
              <input type="text" class="form-control" name="orderComments">
          </div>
          <div class="m-2">
              <label for="state" class="form-label">Shipping Comments</label>
              <input type="text" class="form-control" name="shippingComments">
          </div>
          <div class="m-2">
              <label for="Zipcode" class="form-label">Shipment followup status</label>
              <input type="text" class="form-control" name="shipFollowStatus">
          </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="Zipcode" class="form-label">Shipment Followup Emai Ids</label>
          <input type="text" class="form-control" id="shipFollowEmails" name="shiplemtFollowupEmails" placeholder="Please enter comma separated">
        </div>
        <div class="col-md-6">
          <label for="state" class="form-label">Shipment Followup Templates</label>
          <select class="form-select" name="shipFollowTemplates">
              <option value="1">One</option>
              <option value="0">Two</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="state" class="form-label">EPG Address</label>
          <textarea class="form-control" id="epgAddress" name="epgAddress"></textarea>
        </div>
      </div>
          
          <button type="submit" class="btn gradient-custom">Save</button>

        </form>
      </div>
    </div>
