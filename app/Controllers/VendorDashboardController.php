<?php

namespace App\Controllers;

use App\Models\VendorDashboardModel;
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
            'contactNumber' => $this->request->getPost('contactNumber'),
            'category' => $this->request->getPost('category'),
            'vendorManager' => $this->request->getPost('vendorManager'),
            'email' => $this->request->getPost('email'),
            'sku' => $this->request->getPost('sku'),
            'website' => $this->request->getPost('website'),
            'businessUnit' => $this->request->getPost('businessUnit'),
        ];

        // Execute the query
        $vendorData = $VendorDashboardModel->getFilteredData($filters);

        // echo "<pre>";
        // var_dump($vendorData);
        // echo "</pre>";
        // exit;

        if (!empty($vendorData)) {
            // Success response
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data retrieved successfully',
                'data' => $vendorData,
                'csrf_hash' => csrf_hash()
            ]);
        } else {
            // Log errors if available
            $errors = $VendorDashboardModel->errors();
            if (!empty($errors)) {
                log_message('error', 'Query errors: ' . print_r($errors, true));
            }

            // Log the last compiled query for debugging
            $query = $VendorDashboardModel->getLastQuery();
            log_message('error', 'Last Query: ' . (is_string($query) ? $query : print_r($query, true)));

            // Failure response with empty data to show "No data available" in DataTables
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No data available',
                'data' => [],
                'csrf_hash' => csrf_hash()
            ]);
        }

    }
}