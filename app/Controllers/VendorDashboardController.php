<?php

namespace App\Controllers;

use App\Models\VendorDashboardModel;
use App\Models\ContactInformationModel;
use App\Models\VendorSettingModel;
use CodeIgniter\Controller;

class VendorDashboardController extends Controller
{
    public function index()
    {
        // Load models for data retrieval
        $VendorDashboardModel = new VendorDashboardModel();

        // Fetch categories for the category dropdown
        $data['categories'] = $VendorDashboardModel->getAllCategories();

        return view('vendor_dashboard', $data);
    }

    public function fetchVendorData()
    {
        $VendorDashboardModel = new VendorDashboardModel();

        // Capture search filters from request
        $filters = [
            'companyName' => $this->request->getPost('companyName'),
            'contactNumber' => $this->request->getPost('contact'),
            'category' => $this->request->getPost('category'),
            'vendorManager' => $this->request->getPost('vendorManager'),
            'email' => $this->request->getPost('email'),
            'sku' => $this->request->getPost('sku'),
            'website' => $this->request->getPost('website'),
            'businessUnit' => $this->request->getPost('businessUnit'),
        ];

        // Query database based on filters
        $vendorData = $VendorDashboardModel->getFilteredData($filters);

        echo "<pre>";
        print_r($vendorData);
        echo "</pre>";
        exit(); // Stop further execution for debugging purposes
    

        // Return data as JSON for DataTables
        return $this->response->setJSON(['data' => $vendorData]);
    }
}