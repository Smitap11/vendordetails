<?php

namespace App\Controllers;
use App\Models\VendorDashboardModel;


class VendorDashboardController extends BaseController
{
    public function index(): string
    {
        $request = \Config\Services::request();

        $vendorModel = new VendorDashboardModel();
        
        $companyName = $this->request->getVar('companyName');
        $contactNumber = $this->request->getVar('contactNumber');
        $website = $this->request->getVar('website');
        $contactEmail = $this->request->getVar('contactEmail');
        $businessUnit = $this->request->getVar('businessUnit');
        $type = $this->request->getVar('type');
        $category = $this->request->getVar('category');

        // Call the model method to fetch the search results
        $data['vendors'] = $vendorModel->searchVendors(
            $companyName,
            $contactNumber,
            $website,
            $contactEmail,
            $businessUnit,
            $type,
            $category
        );


    return view('vendor_dashboard', $data);

    }

    public function vendorCategory()
    {
        $categoryModel = new VendorDashboardModel();
        $data['categories'] = $categoryModel->getCategories(); // Fetch categories

        log_message('info', 'VendorDashboard::index() method called');


        return view('vendor_dashboard', $data); // Pass categories to your view
    }

}
