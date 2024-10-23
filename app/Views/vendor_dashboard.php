<?= $this->extend("layout/base"); ?>

<?= $this->section("content"); ?>

<div class="container m-2 p-3">
<h4>Vendor Dashboard</h4>

<div class="search-section">
    <div>
        <label>Company / Brand Name</label>
        <input type="text" id="company" placeholder="Ex. NIKE PVT. LTD.">
    </div>
    <div>
        <label>Contact No.</label>
        <input type="text" id="contact" placeholder="Ex. 5439777654">
    </div>
    <div>
        <label>Category</label>
        <select id="category">
        <option value="">Select Category</option>
        <?php var_dump($categories); ?>
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <option value="<?= esc($category['categoryName']); ?>"><?= esc($category['categoryName']); ?></option>
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
        <div><button class="btn gradient-custom" id="searchBtn">Search</button></div>
    </div>
</div>

<!-- Data Table -->
<table id="vendorTable" class="display">
    <thead>
        <tr>
            <th>Business Unit</th>
            <th>Type</th>
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

<?= $this->endSection(); ?>
