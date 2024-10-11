<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BusinessDetailsModel;

class BusinessDetailsController extends Controller
{
    public function saveBusinessFormData()
    {
        // Load the form helper
        helper(['form', 'url']);
        
        // Validate form input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'final-status'       => 'required',
            'rebate'             => 'required',
            'business-website'   => 'required',
            'fbm-company-name'   => 'required',
            'fba-company-name'   => 'required',
            'account-manager'    => 'required',
            'business-unit'      => 'required'
        ]);

        if ($validation->withRequest($this->request)->run() === FALSE) {
            // Return validation errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Collect the form data
        $formData = [
            'final_status'                 => $this->request->getPost('final-status'),
            'rebate'                       => $this->request->getPost('rebate'),
            'fbm_company_name'             => $this->request->getPost('fbm-company-name'),
            'business_website'             => $this->request->getPost('business-website'),
            'fba_company_name'             => $this->request->getPost('fba-company-name'),
            'account_manager'              => $this->request->getPost('account-manager'),
            'business_account'             => $this->request->getPost('business-account'),
            'modified_on'                  => $this->request->getPost('modified-on'),
            'modified_by'                  => $this->request->getPost('modified-by'),
            'vendor_type'                  => $this->request->getPost('vendor-type'),
            'vendor_behaviour'             => $this->request->getPost('vendor-behaviour'),
            'vendor_heighlighted_concern'  => $this->request->getPost('vendor-heighlighted-concern'),
            'business_brand'               => $this->request->getPost('business-brand'),
            'business_unit'                => $this->request->getPost('business-unit'),
            'vendor_description'           => $this->request->getPost('vendor-description'),
        ];

        // Load the model and save the form data
        $bsModel = new BusinessDetailsModel();
        $bsModel->insert($formData);

    // echo '<pre>';
    // print_r($formData);
    // echo '</pre>';
    // exit(); // Prevent further processing


        // Redirect with success message

        return redirect()->back()->with('message', 'Form submitted successfully!');

    }
}
