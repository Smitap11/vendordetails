<div class="carousel-item">
      <div class="form-container">
        <h5 class="form-header">Business Details</h5>
        <form id="businessDetailsForm" method="post">
          <?= csrf_field() ?>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="selectBox1" class="form-label">Final Status</label>
              <select class="form-select final-status" id="final-status" name="finalStatus" aria-label="Default select example">
                <option value="not-approached">Not Approached</option>
                <option value="Converted/Pre Qualified">Converted/Pre Qualified</option>
                <option value="Dead/No Response">Dead/No Response</option>
                <option value="Approached">Approached</option>
                <option value="Onboard Vendor">Onboard Vendor</option>
                <option value="In progress">In progress</option>
                <option value="Dropped By Vendor">Dropped By Vendor</option>
                <option value="Dropped By Us">Dropped By Us</option>
                <option value="Document Issue">Document Issue</option>
                <option value="Waiting/No Response">Waiting/No Response</option>
                <option value="Contact In Future">Contact In Future</option>
                <option value="Cancelled/Lost">Cancelled/Lost</option>
                <option value="Registered">Registered</option>
                <option value="Reverted/In Progress">Reverted/In Progress</option>
                <option value="Declined By Us">Declined By Us</option>
                <option value="Declined By Vendor">Declined By Vendor</option>
                <option value="Rejected By Bulkbuy">Rejected By Bulkbuy</option>
                <option value="TO Sent">TO Sent</option>
                <option value="PO Sent">PO Sent</option>
                <option value="Pending at 2nd Level">Pending at 2nd Level</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="inputBox1" class="form-label">Rebate</label>
              <input type="text" class="form-control" id="rebate" name="rebate" placeholder="0">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="company-name" class="form-label">Company Name<span style="color: red;">*</span></label>
              <input type="text" class="form-control" id="company-name" name="companyName" required>
            </div>

            <div class="col-md-6">
              <label for="linkField1" class="form-label">Website</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">http://</span>
                <input type="text" class="form-control" name="businessWebsite" placeholder="Ex. google.com" aria-label="website" aria-describedby="basic-addon1">  
              </div>
            </div>

          </div>

          <div class="row mb-3">
            
          <div class="col-md-6">
              <label for="textField1" class="form-label">Category</label>
              <!-- <input type="text" class="form-control" id="businessCategory" name="businessCategory" placeholder="Ex. Electronics" aria-describedby="basic-addon1">   -->
              <select class="form-select" id="businessCategory" name="businessCategory" aria-label="Default select example">
                <option value="Accessories and Apparels">Accessories and Apparels</option>
                <option value="Appliance">Appliance</option>
                <option value="Arts, Crafts & Sewing">Arts, Crafts & Sewing</option>
                <option value="Automotive & Industrial Scientific">Automotive & Industrial Scientific</option>
                <option value="Baby & Baby Care">Baby & Baby Care</option>
                <option value="Beauty, Personal & Health Care">Beauty, Personal & Health Care</option>
                <option value="Bed, Bath & Linon">Bed, Bath & Linon</option>
                <option value="Electronics">Electronics</option>
                <option value="Furniture">Furniture</option>
                <option value="Grocery & Gourmet Food">Grocery & Gourmet Food</option>
                <option value="Hardware & Tools">Hardware & Tools</option>
                <option value="Health Care">Health Care</option>
                <option value="Home & Decor">Home & Decor</option>
                <option value="Kitchen & Dining">Kitchen & Dining</option>
                <option value="Lamps & Lightings">Lamps & Lightings</option>
                <option value="Miscellaneous">Miscellaneous</option>
                <option value="Musical Instruments">Musical Instruments</option>
                <option value="Outdoor & Garden">Outdoor & Garden</option>
                <option value="Pet & Pet Care">Pet & Pet Care</option>
                <option value="Sports & Fitness">Sports & Fitness</option>
                <option value="Toys & Games">Toys & Games</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="textField1" class="form-label">Brand</label>
              <input type="text" class="form-control" id="business-brand" name="businessBrand" placeholder="Ex. Nike" aria-describedby="basic-addon1">  
            </div>  
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="dateField1" class="form-label">Account Manager</label>
              <input type="text" class="form-control" id="account-manager" name="accountManager" aria-label="Account Manager" aria-describedby="basic-addon1" placeholder="Ex. James Mary">
            </div>                

            <div class="col-md-6">
              <label for="dateField1" class="form-label">Account (if any)</label>
              <input type="text" class="form-control" id="business-account" name="businessAccount" aria-label="Account" aria-describedby="basic-addon1" placeholder="0">
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="dateField1" class="form-label">Modified On</label>
              <input type="date" class="form-control" id="modified-on" name="modifiedOn" aria-label="Modified On" aria-describedby="basic-addon1">
            </div>
            <div class="col-md-6">
              <label for="textField1" class="form-label">Modified By</label>
              <input type="text" class="form-control" id="modified-by" name="modifiedBy" aria-label="Modified By" placeholder="Ex. James Mary" aria-describedby="basic-addon1">  
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="selectBox1" class="form-label">Vendor Type</label>
              <select class="form-select vendor-type" id="vendor-type" name="vendorType" aria-label="Default select example">
                <option value="Manufacturer/Producer" selected>Manufacturer/Producer</option>
                <option value="Converted/Pre Qualified">Distributor</option>
                <option value="Wholeseller">Wholeseller</option>
                <option value="Converted/Pre Qualified">Distributor</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="dateField1" class="form-label">Vendor Behaviour</label>
              <select class="form-select vendor-behaviour" id="vendor-behaviour" name="vendorBehaviour">
                <option value="Normal" selected>Normal</option>
                <option value="Complex">Complex</option>
                <option value="Demanded">Demanded</option>
                <option value="Critical">Critical</option>
                <option value="Slow in Response">Slow in Response</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="select" class="form-label">Vendor Highlighted Concern</label>
              <div class="multi-select-container vendor-heigh-con">
                <div class="multi-select-input form-control" id="multiSelectInput">
                  <input type="text" id="vendorHeighConcern" placeholder="Select Options" readonly>
                </div>
                <ul class="dropdown-menu" id="dropdownMenu">
                  <li class="dropdown-item" data-value="Option 1">Option 1</li>
                  <li class="dropdown-item" data-value="Option 2">Option 2</li>
                  <li class="dropdown-item" data-value="Option 3">Option 3</li>
                  <li class="dropdown-item" data-value="Option 4">Option 4</li>
                  <li class="dropdown-item" data-value="Option 5">Option 5</li>
                  <li class="dropdown-item" data-value="Option 6">Option 6</li>
                  <li class="dropdown-item" data-value="Option 7">Option 7</li>
                  <li class="dropdown-item" data-value="Option 8">Option 8</li>
                  <li class="dropdown-item" data-value="Option 9">Option 9</li>
                  <li class="dropdown-item" data-value="Option 10">Option 10</li>
                </ul>
              </div>
            </div>

            <div class="col-md-6">
              <label for="businessUnit" class="form-label">Business Unit</label>
              <select class="form-select business-unit" id="businessUnit" name="businessUnit" aria-label="Default select example">
                <option value="home-hobbies">Home & Hobbies</option>
                <option value="converted-or-pre-Qualified">Converted/Pre Qualified</option>
                <option value="dead-or-no-response">Dead/No Response</option>
                <option value="approached">Approached</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="textField1" class="form-label">Vendor Description</label>
              <input type="text" class="form-control" id="vendor-description" name="vendorDescription" aria-label="Vendor Description"  placeholder="Describe here.." aria-describedby="basic-addon1">  
            </div>
          </div>

          <button type="submit" class="btn gradient-custom">Save</button>

          <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center default-toast">
            <div class="toast" id="businessSuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Business Details saved successfully.
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>


  <script type="text/javascript">
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>'; 

    var saveBusinessDetailsUrl = "<?= base_url('BusinessDetailsController/saveBusinessFormData') ?>";
  </script>    
