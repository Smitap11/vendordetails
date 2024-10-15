<?php

namespace App\Controllers;

use App\Models\BusinessDetailsModel;
use CodeIgniter\Controller;

class BusinessDetailsController extends Controller
{
    public function saveBusinessFormData()
    {
        if ($this->request->isAJAX()) {

            // Validate form data
            $validation = \Config\Services::validation();
            $validation->setRules([
                'final-status' => 'required',
                'rebate' => 'required|numeric',
                'fbm-company-name' => 'required|min_length[3]',
                'business-website' => 'required|valid_url',
                // 'fba-company-name' => 'required|min_length[3]',
                // 'account-manager' => 'required',
                // 'business-account' => 'required|numeric',
                // 'modified-on' => 'required|valid_date',
                // 'modified-by' => 'required',
                // 'vendor-type' => 'required',
                // 'vendor-behaviour' => 'required',
                // 'business-brand' => 'required|min_length[2]',
                // 'business-unit' => 'required',
                // 'vendor-description' => 'required|min_length[5]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // If validation fails, return JSON error response
                return $this->response->setJSON([
                    'success' => false,
                    'error' => $validation->getErrors()
                ]);
            }

            // Form inputs
            $formData = [
                'final_status' => $this->request->getPost('final-status'),
                'rebate' => $this->request->getPost('rebate'),
                'fbm_company_name' => $this->request->getPost('fbm-company-name'),
                'business_website' => $this->request->getPost('business-website'),
                // 'fba_company_name' => $this->request->getPost('fba-company-name'),
                // 'account_manager' => $this->request->getPost('account-manager'),
                // 'business_account' => $this->request->getPost('business-account'),
                // 'modified_on' => $this->request->getPost('modified-on'),
                // 'modified_by' => $this->request->getPost('modified-by'),
                // 'vendor_type' => $this->request->getPost('vendor-type'),
                // 'vendor_behaviour' => $this->request->getPost('vendor-behaviour'),
                // 'business_brand' => $this->request->getPost('business-brand'),
                // 'business_unit' => $this->request->getPost('business-unit'),
                // 'vendor_description' => $this->request->getPost('vendor-description'),
            ];
            

            echo '<pre>';
            var_dump($formData);
            echo '</pre>';
            exit;

            // Proceed to insert the data if validation passes
            $businessModel = new BusinessDetailsModel();

            // Insert data and log any errors
            if ($businessModel->insert($formData)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Business details saved successfully'
                ]);
            } else {
                // Log the error and query
                log_message('error', 'Insert failed: ' . $businessModel->errors());
                log_message('error', 'Last Query: ' . $businessModel->getLastQuery());

                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to save business details'
                ]);
            }


        }

    }
}
