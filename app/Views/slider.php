<div class="container">
  <!-- Carousel slider wrapped inside a custom container with border and shadow -->
  <div class="slider-container my-4">
    <div id="myCarousel" class="carousel slide">
      <!-- Carousel items with forms -->
      <div class="carousel-inner" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);background:#f2f4f8;">

        <!-- First form slide -->
        <?= $this->include("\business_details"); ?>
        
        <!-- Second form slide -->
        <?= $this->include("\contact_information"); ?>


        <!-- Third form slide -->
        <div class="carousel-item">
          <div class="form-container">
            <h5>Shipping Information</h5>
            <form>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Shipping Account</label>
                  <select class="form-select shipping-account" id="shipping-account">
                    <option value="Vendor Account" selected>Vendor Account</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="inputBox2" class="form-label">LTL/Freight Shipments</label>
                  <select class="form-select shipping-account" id="shipping-account">
                    <option value="Vendor Account" selected>Select LTL</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Need to share the Label</label>
                  <select class="form-select share-Label" id="share-label">
                    <option selected>Select One</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Rate Type</label>
                  <select class="form-select rate-type" id="rate-type">
                    <option selected>Select Rate Type</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">International Shipping</label>
                  <select class="form-select shipping-account" id="shipping-account">
                    <option value="Vendor Account" selected>Vendor Account</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Push CompanyName in AddressLine1 ?</label>
                  <select class="form-select shipping-account" id="shipping-account">
                    <option value="Vendor Account" selected>Vendor Account</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                </div>

              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Comments</label>
                  <textarea class="form-control" id="shipping-info-comments" rows="2"></textarea>
                </div>

                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Modified On</label>
                  <input type="date" class="form-control" id="dateField2">
                </div>
              </div>

              
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="Modified By" class="form-label">Modified By</label>
                  <input type="date" class="form-control" id="shipping-modified-on">
                </div>
                <div class="col-md-6">
                  <label for="Modified By" class="form-label">Shipment Updating Type</label>
                  <select class="form-select shipment-updating-type" id="shipment-updating-type">
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="Shipping Tracking Source" class="form-label">Shipping Tracking Source</label>
                  <input type="text" class="form-control" id="shipping-tracking-source">
                </div>
                
              </div>
              <button type="submit" class="btn gradient-custom">Save</button>

            </form>  
            </div>
        </div>


        <!-- Fourth form slide -->
        <div class="carousel-item">
          <div class="form-container">
            <h5>Vendor's Finanace Details</h5>
            <form>
              <div class="row mb-3">
                <div class="col-md-12"><b>Invoice Sourcing Details</b></div>
                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Allocation</label>
                  <select class="form-select" id="selectBox2">
                    <option selected>Select</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="inputBox2" class="form-label">Vendor Level</label>
                  <select class="form-select" id="vendor-level">
                    <option value="1">Level 1</option>
                    <option value="2">Level 2</option>
                    <option value="3">Level 3</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-12"><b>Dropship fee ans shiipping Details</b></div>
                <div class="col-md-6">
                  <label for="Dropship Fee" class="form-label">Dropship Fee</label>
                  <input type="text" class="form-control" id="dropship-fee">
                </div>

                <div class="col-md-6">
                  <label for="Shipping Terms - Ground" class="form-label">Shipping Terms - Ground</label>
                  <input type="text" class="form-control" id="shipping-terms" placeholder="Shipping Terms - Ground">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-12"><b>Charge Details</b></div>
                <div class="col-md-6">
                  <label for="textField2" class="form-label">Mode Of Payment</label>
                  <select class="form-select" id="mode-of-payment">
                    <option>Select Payment Mode</option>
                    <option value="2">Level 2</option>
                    <option value="3">Level 3</option>
                  </select>
                </div>

              </div>
              <button type="submit" class="btn gradient-custom">Save</button>

            </form>
          </div>
        </div>

        
        <!-- Fifth form slide -->
        <div class="carousel-item">
          <div class="form-container">
            <h5>Vendor Settings</h5>
            <form>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Type</label>
                  <select class="form-select" id="selectBox2">
                    <option value="fba" selected>FBA</option>
                    <option value="fbm">FBM</option>
                  </select>
                </div>

                <!-- Second column -->
                <div class="col-md-6">
                  <label for="inputBox2" class="form-label">FBA SKU</label>
                  <input type="text" class="form-control" id="fba-sku" placeholder="Ex. VVULK">
                </div>
              </div>

              <div class="row mb-3">
                <!-- First column -->
                <div class="col-md-6">
                  <label for="linkField2" class="form-label">Credit Card</label>
                  <input type="text" class="form-control" id="credit-card" placeholder="Ex. 982309872356">
                </div>

                <!-- Second column -->
                <div class="col-md-6">
                  <label for="Vendor Manager" class="form-label">Vendor Manager</label>
                  <select class="form-select" id="vendor-manager">
                    <option>Select Vendor Manager</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="Prime Eligible" class="form-label">Prime Eligible</label>
                  <select class="form-select" id="prime-eligible">
                    <option value="1" selected>YES</option>
                    <option value="0">No</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="dateField2" class="form-label">Our Shipping Account</label>
                  <select class="form-select" id="vendor-manager">
                    <option value="1" selected>YES</option>
                    <option value="0">No</option>
                  </select>
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="Shipping Account Detail" class="form-label">Shipping Account Detail</label>
                  <select class="form-select" id="shipping-account-detail">
                    <option value="usps" selected>USPS</option>
                    <option value="0">No</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="dateField2" class="form-label">Shipping Account Number</label>
                  <select class="form-select" id="shipping-account-number">
                    <option value="1" selected>YES</option>
                    <option value="0">No</option>
                  </select>
                </div>
              </div>

              
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="Shipping Account Detail" class="form-label">Need to share the Label</label>
                  <select class="form-select" id="vendor-share-label">
                    <option value="1" selected>YES</option>
                    <option value="0">No</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="dateField2" class="form-label">Modified On</label>
                  <input type="date" class="form-control" id="modified-on">
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="Shipping Account Detail" class="form-label">Modified By</label>
                  <select class="form-select" id="vendor-share-label">
                    <option value="1" selected>YES</option>
                    <option value="0">No</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="dateField2" class="form-label">Vendor Note</label>
                  <input type="date" class="form-control" id="modified-on">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="moq-flag">
                    <label class="form-check-label" for="flexCheckDefault">
                        MOQ Flag
                    </label>
                    </div>
                </div>
              </div>
              <button type="submit" class="btn gradient-custom">Save</button>

            </form>
          </div>
        </div>

        
        <!-- Sixth form slide -->
        <div class="carousel-item">
          <div class="form-container">
            <h5>Other Details</h5>
            <form>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="Modified On" class="form-label">Record added On</label>
                  <input type="date" class="form-control" id="record-added-on">
                </div>

                <div class="col-md-6">
                  <label for="Modified By" class="form-label">Record added By</label>
                  <input type="type" class="form-control" id="record-added-by">
                </div>
              </div>
              <button type="submit" class="btn gradient-custom">Save</button>

            </form>
          </div>
        </div>

        
        <!-- Seventh form slide -->
        <div class="carousel-item">
          <div class="form-container">
            <h5>Company RMA Information</h5>
            <form>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="selectBox2" class="form-label"><b>Do you offer additonal discount against No Return Policy? (Yes/No)</b></label>
                  <select class="form-select" id="selectBox2">
                    <option value="1" selected>Yes</option>
                    <option value="0">No</option>
                  </select>
                </div>

                <div class="col-md-6">
                    <label for="selectBox2" class="form-label"><b>Contact person for RMA.</b></label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="moq-flag">
                        <label class="form-check-label" for="rma-contact-person">
                            If POC is same as Account Manager , then click this checkbox
                        </label>
                    </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="Account Manager" class="form-label">Account Manager</label>
                  <input type="text" class="form-control" id="rma-acc-mangr">
                </div>

                <div class="col-md-4">
                  <label for="Email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="rma-email">
                </div>

                <div class="col-md-4">
                  <label for="Contact Number" class="form-label">Contact Number</label>
                  <input type="number" class="form-control" id="rma-contact-no">
                </div>

              </div>

              <div class="row mb-3">
                <div class="col-md-12">
                  <label for="days of delivery" class="form-label"><b>In how many days returns would be authorized from the date of delivery?</b></label>
                  <input type="text" class="form-control" id="days-of-delivery" placeholder="Ex. 2"></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-12">
                  <label for="dateField2" class="form-label"><b>Please provide us with the return address where customer should send defective/damaged items?</b></label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="return-add-check">
                    <label class="form-check-label" for="flexCheckDefault">
                        If return address is same as company address then click this checkbox.
                    </label>
                  </div>
                </div>
              </div>
              
            <div class="d-flex mb-3">
                <div class="m-2">
                    <label for="Street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street">
                </div>
                <div class="m-2">
                    <label for="Email" class="form-label">City</label>
                    <input type="email" class="form-control" id="city">
                </div>
                <div class="m-2">
                    <label for="Contact Number" class="form-label">Contry</label>
                    <select class="form-select" id="selectBox2">
                        <option value="1">United State</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="m-2">
                    <label for="Email" class="form-label">State</label>
                    <select class="form-select" id="selectBox2">
                        <option value="1">smndns</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="m-2">
                    <label for="Zipcode" class="form-label">Zipcode</label>
                    <input type="number" class="form-control" id="Zipcode">
                </div>
            </div>

              
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="days of delivery" class="form-label"><b>In how many days returns would be authorized from the date of delivery?</b></label>
                    <input type="text" class="form-control" id="days-of-delivery" placeholder="Ex. 2"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label for="dateField2" class="form-label"><b>Please advice the restocking fees in case of Buyer's Remourse</b></label>
                <div class="col-md-6">
                    <select class="form-select" id="selectBox2">
                        <option value="1" selected>%</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="days-of-delivery" placeholder="10"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                <label for="comments" class="form-label"><b>Comments</b></label>
                <textarea class="form-control" placeholder="Leave a comment here" id="comment"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="Modified On" class="form-label"><b>Modified On</b></label>
                    <input type="date" class="form-control" id="modified-on"/>
                </div>
                <div class="col-md-4">
                    <label for="Modified By" class="form-label"><b>Modified By</b></label>
                    <input type="text" class="form-control" id="modified-by">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="formFile" class="form-label"><b>Processed file</b></label>
                    <input class="form-control" type="file" id="formFile">
                    <label for="formFile" class="form-label m-1"><b>Processed file list:</b></label>
                </div>    
            </div>
            <button type="submit" class="btn gradient-custom">Save</button>

            </form>
          </div>
        </div>

        
        <!-- Eighth form slide -->
        <div class="carousel-item">
          <div class="form-container">
            <h5>Finanace/Payment Information</h5>
            <form>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="Input label" class="form-label"><b>Whom should we contact for finanace statements or invoices?</b></label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="moq-flag">
                        <label class="form-check-label" for="flexCheckDefault">
                            If POC is same as Account Manager , then click this checkbox
                        </label>
                    </div>
                </div>
              </div>


                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="Account Manager" class="form-label">Account Manager</label>
                        <input type="text" class="form-control" id="finance-acc-mag">
                    </div>

                    <div class="col-md-4">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="finance-email">
                    </div>

                    <div class="col-md-4">
                        <label for="Contact Number" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" id="finance-con-no">
                    </div>
                </div>      

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="Mode of Payment" class="form-label">Mode of Payment</label>
                        <select class="form-select" id="mode-of-payment">
                            <option value="1" selected>Select One</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="Email" class="form-label">Payment Term</label>
                        <select class="form-select" id="payment-term">
                            <option value="1" selected>Select Payment Term</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="Contact Number" class="form-label">Select any</label>
                        <select class="form-select" id="select-one">
                            <option value="1" selected>Select One</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                    <label for="linkField2" class="form-label"><b>Charging Company Name (How charge will reflect on our card system)</b></label>
                    <input type="text" class="form-control" id="linkField2">
                    </div>

                    <div class="col-md-6">
                    <label for="multiSelect2" class="form-label"><b>Do you charge Dropship fee?</b></label>
                    <select class="form-select" id="do-u-charge-drps-fee">
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                    </select>
                    </div>
                </div>

              <div class="row mb-3">
                <div class="col-md-12">
                    <label for="multiSelect2" class="form-label"><b>Please select if there are any extra charges applicable from your end apart from dropship</b></label>
                  <select class="form-select" id="extra-charge-drps-fee">
                    <option value="1">YES</option>
                    <option value="0">NO</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Modified On</label>
                  <input type="date" class="form-control" id="finanace-modified-on">
                </div>

                <div class="col-md-6">
                  <label for="selectBox2" class="form-label">Modified By</label>
                  <input type="text" class="form-control" id="finanace-modified-by">
                </div>    
              </div>
              <button type="submit" class="btn gradient-custom">Save</button>
            
            </form>
          </div>
        </div>

      </div>
    </div>

    <!-- Button Container Below the Slider -->
    <div class="button-container">
      <button class="custom-control custom-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev" id="prevButton">
        Previous
      </button>
      <button class="custom-control custom-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next" id="nextButton">
        Next
      </button>
    </div>
  </div>
</div>