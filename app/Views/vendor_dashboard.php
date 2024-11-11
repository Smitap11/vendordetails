<?= $this->extend("layout/base"); ?>

<?= $this->section("content"); ?>

<section>

<div class="container m-2 p-3">
    <h4>Vendor Dashboard</h4>

    <div class="search-section">
        <form id="searchForm" class="search-section" action="post">
            <?= csrf_field() ?>

            <div>
                <label>Company / Brand Name</label>
                <input type="text" id="companyName" placeholder="Ex. NIKE PVT. LTD.">
            </div>
            <div>
                <label>Contact No.</label>
                <input type="text" id="contact" placeholder="Ex. 5439777654">
            </div>
            <div>
                <label>Category</label>
                <select id="category">
                    <option value="">Select Category</option>
                    <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= esc($category['categoryName']); ?>"><?= esc($category['categoryName']); ?>
                    </option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div>
                <label>Vendor Manager</label>
                <select id="vendorManager">
                    <option value="">Select Vendor Manager</option>
                    <option value="Smita Parab">Smita Parab</option>
                    <option value="Shahrukh Khan">Shahrukh Khan</option>
                    <option value="Karan Rajput">Karan Rajput</option>
                </select>
            </div>
            <div>
                <label>Email ID</label>
                <input type="email" id="email" placeholder="Ex. lary@yahoo.com">
            </div>
            <div>
                <label>Assign SKU</label>
                <input type="text" id="sku" placeholder="Ex. GTRE456YTR">
            </div>
            <div>
                <label>Website</label>
                <input type="text" id="website" placeholder="Ex. www.google.com">
            </div>
            <div>
                <label>Business Unit</label>
                <select id="businessUnit">
                    <option value="">Select Business Unit</option>
                    <option value="Home & Hobbies">Home & Hobbies</option>
                </select>
            </div>
            <div>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <div><button type="submit" class="btn gradient-custom" id="vendorSearchBtn">Search</button></div>
            </div>
        </form>
    </div>

    <!-- Data Table -->
    <table id="vendorTable" class="display">
        <thead>
            <tr>
                <th>Business Unit</th>
                <th>Company Name</th>
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

<!-- Define the URL using PHP -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
    /* Initialize DataTables */
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>'; 

    var saveVendoDashUrl = "<?= base_url('VendorDashboardController/fetchVendorData') ?>";

        // Initialize DataTable
        var vendorTable = $('#vendorTable').DataTable({
        columns: [
            { data: "businessUnit", title: "Business Unit" },
            { data: "companyName", title: "Company Name" },
            { data: "contactEmail", title: "Order Processing Email" },
            { data: "website", title: "Website" },
            { data: "category", title: "Category" },
            { data: "skuPrefix", title: "Assign SKU" },
            { data: "vendorManager", title: "Vendor Manager" }
        ],
        data: [] // Initialize with empty data
    });



    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        console.log('button clicked');
        // Collect form data
        var searchData = $('#searchForm').serialize(); // Automatically serializes form data

        // AJAX call
        $.ajax({
            url: saveVendoDashUrl,
            type: 'POST',
            data: searchData,
            dataType: 'json',
            cache: false,
            success: function(response) {
                // Clear and add new data
                vendorTable.clear().rows.add(response.data).draw();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
            }
        });


    });

})
</script>

</section>

<?= $this->endSection(); ?>