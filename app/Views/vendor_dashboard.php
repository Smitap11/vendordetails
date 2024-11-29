<?= $this->extend("layout/base"); ?>

<?= $this->section("content"); ?>

<section>

    <div class="form-container">
        <h4>Vendor Dashboard</h4>

        <div class="search-section p-3 m-3">
            <form id="searchForm" action="post">
                <?= csrf_field() ?>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Company / Brand Name</label>
                        <input type="text" id="companyName" name="companyName" placeholder="Ex. NIKE PVT. LTD.">
                    </div>
                    <div class="col-md-3">
                        <label>Contact No.</label>
                        <input type="text" id="contactNumber" name="contactNumber" placeholder="Ex. 5439777654">
                    </div>
                    <div class="col-md-3">
                        <label>Category</label>
                        <select id="category" name="category">
                            <option value="">Select Category</option>
                            <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                            <option value="<?= esc($category['categoryName']); ?>"><?= esc($category['categoryName']); ?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Vendor Manager</label>
                        <select id="vendorManager" name="vendorManager">
                            <option value="">Select Vendor Manager</option>
                            <option value="Smita Parab">Smita Parab</option>
                            <option value="Shahrukh Khan">Shahrukh Khan</option>
                            <option value="Karan Rajput">Karan Rajput</option>
                        </select>
                    </div>
                </div>
                <div class="row">    
                    <div class="col-md-3">
                        <label>Email ID</label>
                        <input type="email" id="email" name="email" placeholder="Ex. lary@yahoo.com">
                    </div>
                    <div class="col-md-3">
                        <label>Assign SKU</label>
                        <input type="text" id="sku" name="sku" placeholder="Ex. GTRE456YTR">
                    </div>
                    <div class="col-md-3">
                        <label>Website</label>
                        <input type="text" id="website" name="website" placeholder="Ex. www.google.com">
                    </div>
                    <div class="col-md-3">
                        <label>Business Unit</label>
                        <select id="businessUnit" name="businessUnit">
                            <option value="">Select Business Unit</option>
                            <option value="Home & Hobbies">Home & Hobbies</option>
                        </select>
                    </div>
                    <div style="text-align: center" class="py-3">
                        <button type="submit" class="btn gradient-custom align-right" id="vendorSearchBtn">Search</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="border my-3 p-3 table-responsive position-relative">
            <div id="dataTableLoader" 
                class="spinner-overlay d-none position-absolute" 
                style="z-index: 10;">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>


            <table id="vendorTable" class="display py-3">
                <thead>
                    <tr>
                        <th>Business Unit</th>
                        <th>Company Name</th>
                        <th>Contact Number</th>
                        <th>Order Processing Email</th>
                        <th>Website</th>
                        <th>Category</th>
                        <th>Assign SKU</th>
                        <th>Vendor Manager</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be fetched dynamically using DataTables -->
                </tbody>
            </table>
        </div>

    </div>



    <!-- Define the URL using PHP -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        // After each successful response, update the CSRF token
        function updateCsrfToken(response) {
            if (response.csrf_hash) {
                $('input[name="csrf_test_name"]').val(response.csrf_hash);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': response.csrf_hash
                    }
                });
            }
        }

        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = '<?= csrf_hash() ?>';

        // Initialize DataTable
        var vendorTable = $('#vendorTable').DataTable({
            columns: [{
                    data: "businessUnit",
                    title: "Business Unit"
                },
                {
                    data: "companyName",
                    title: "Company Name"
                },
                {
                    data: "contactNumber",
                    title: "Contact Number"
                },
                {
                    data: "contactEmail",
                    title: "Order Processing Email"
                },
                {
                    data: "website",
                    title: "Website"
                },
                {
                    data: "category",
                    title: "Category"
                },
                {
                    data: "skuPrefix",
                    title: "Assign SKU"
                },
                {
                    data: "vendorManager",
                    title: "Vendor Manager"
                }
            ],
            data: [],
            language: {
                emptyTable: "No data available" // Custom message
            }

        });


        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            console.log('button clicked');
        
            // Disable the search button
            var $searchBtn = $('#vendorSearchBtn');
            $searchBtn.prop('disabled', true);
            
            // Show the DataTable spinner
            $('#dataTableLoader').removeClass('d-none');

            // Collect form data
            var searchData = $('#searchForm').serialize(); // Automatically serializes form data
            
            var saveVendoDashUrl = "<?= base_url('VendorDashboardController/fetchVendorData') ?>";

            // console.log('searchData = ', searchData);

            // AJAX call
            $.ajax({
                url: saveVendoDashUrl,
                type: 'POST',
                data: searchData,
                dataType: 'json',
                success: function(response) {

                    // console.log('response.status = ', response.data);
                    updateCsrfToken(response);

                    if (response.status === 'error' || response.data.length === 0) {
                        // Clear the DataTable and show "No data available" message
                        vendorTable.clear().draw(); // Clear the table
                    } else if (response.status === 'success') {
                        vendorTable.clear().rows.add(response.data).draw();

                        setTimeout(() => {
                            document.getElementById('searchForm').reset();
                        }, 100);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                },
                complete: function () {
                    // Re-enable the search button
                    $searchBtn.prop('disabled', false);

                    // Hide the DataTable spinner
                    $('#dataTableLoader').addClass('d-none');
                }

            });


        });

    })
    </script>

</section>

<?= $this->endSection(); ?>