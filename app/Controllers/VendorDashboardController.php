<?php

namespace App\Controllers;
use App\Models\VendorDashboardModel;


class VendorDashboardController extends BaseController
{
    public function index(): string
    {
        $categoryModel = new VendorDashboardModel();
        $data['categories'] = $categoryModel->getCategories(); // Fetch categories

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
