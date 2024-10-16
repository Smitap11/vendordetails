<div class="carousel-item active">
      <div class="form-container">
        <h5>Business Details</h5>
        <form id="businessDetailsForm" method="post">
        <?= csrf_field() ?>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="selectBox1" class="form-label">Final Status</label>
              <select class="form-select final-status" id="final-status" name="final-status" aria-label="Default select example">
                <option value="not-approached">Not Approached</option>
                <option value="converted-or-pre-Qualified">Converted/Pre Qualified</option>
                <option value="dead-or-no-response">Dead/No Response</option>
                <option value="approached">Approached</option>
                <option value="onboard-vendor">Onboard Vendor</option>
                <option value="inprogress">In progress</option>
                <option value="dropped-by-vendor">Dropped By Vendor</option>
                <option value="dropped-by-us">Dropped By Us</option>
                <option value="document-issue">Document Issue</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="inputBox1" class="form-label">Rebate</label>
              <input type="text" class="form-control" id="rebate" name="rebate" placeholder="0">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="fbm-company-name" class="form-label">FBM Company Name <span style="color: red;">*</span></label>
              <input type="text" class="form-control" id="fbm-company-name" name="fbm-company-name" required>
            </div>

            <div class="col-md-6">
              <label for="linkField1" class="form-label">Website</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">http://</span>
                <input type="text" class="form-control" name="business-website" placeholder="Ex. google.com" aria-label="website" aria-describedby="basic-addon1">  
              </div>
            </div>

          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="fba-company-name" class="form-label">FBA Company Name <span style="color: red;">*</span></label>
              <input type="text" class="form-control" id="fba-company-name" name="fba-company-name" aria-label="FBA Company Name"  placeholder="Ex. " aria-describedby="basic-addon1" required>  
            </div>

            <div class="col-md-6">
              <label for="textField1" class="form-label">Not visible</label>
              <input type="text" class="form-control" id="fba-company-name" name="not-visible" aria-label="FBA Company Name"  placeholder="Ex. " aria-describedby="basic-addon1">  
            </div>  
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="dateField1" class="form-label">Account Manager</label>
              <input type="text" class="form-control" id="account-manager" name="account-manager" aria-label="Account Manager" aria-describedby="basic-addon1" placeholder="Ex. James Mary">
            </div>                

            <div class="col-md-6">
              <label for="dateField1" class="form-label">Account (if any)</label>
              <input type="text" class="form-control" id="business-account" name="business-account" aria-label="Account" aria-describedby="basic-addon1" placeholder="0">
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="dateField1" class="form-label">Modified On</label>
              <input type="date" class="form-control" id="modified-on" name="modified-on" aria-label="Modified On" aria-describedby="basic-addon1">
            </div>
            <div class="col-md-6">
              <label for="textField1" class="form-label">Modified By</label>
              <input type="text" class="form-control" id="modified-by" name="modified-by" aria-label="Modified By" placeholder="Ex. James Mary" aria-describedby="basic-addon1">  
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="selectBox1" class="form-label">Vendor Type</label>
              <select class="form-select vendor-type" id="vendor-type" name="vendor-type" aria-label="Default select example">
                <option value="Manufacturer/Producer" selected>Manufacturer/Producer</option>
                <option value="Converted/Pre Qualified">Converted/Pre Qualified</option>
                <option value="Dead/No Response">Dead/No Response</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="dateField1" class="form-label">Vendor Behaviour</label>
              <select class="form-select vendor-behaviour" id="vendor-behaviour" name="vendor-behaviour">
                <option value="Inactive" selected>Inactive</option>
                <option value="converted-or-pre-Qualified">Active</option>
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
              <label for="textField1" class="form-label">Brand</label>
              <input type="text" class="form-control" id="business-brand" name="business-brand" placeholder="Ex. Nike" aria-describedby="basic-addon1">  
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="dateField1" class="form-label">Business Unit</label>
              <select class="form-select business-unit" id="business-unit" name="business-unit" aria-label="Default select example">
                <option value="home-hobbies">Home & Hobbies</option>
                <option value="converted-or-pre-Qualified">Converted/Pre Qualified</option>
                <option value="dead-or-no-response">Dead/No Response</option>
                <option value="approached">Approached</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="textField1" class="form-label">Vendor Description</label>
              <input type="text" class="form-control" id="vendor-description" name="vendor-description" aria-label="Vendor Description"  placeholder="Describe here.." aria-describedby="basic-addon1">  
            </div>
          </div>

          <button type="submit" class="btn gradient-custom">Save</button>

        </form>
      </div>
    </div>


  <script type="text/javascript">
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>'; 

    var saveBusinessDetailsUrl = "<?= base_url('BusinessDetailsController/saveBusinessFormData') ?>";
    console.log('saveBusinessDetailsUrl URL: ' + saveBusinessDetailsUrl);
  </script>    