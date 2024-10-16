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
            // $validation->setRules([
            //     'final-status' => 'required',
            //     'rebate' => 'required|numeric',
            //     'fbm-company-name' => 'required',
            //     'business-website' => 'required',
            //     'fba-company-name' => 'required',
            //     'account-manager' => 'required'
            // ]);

            // if (!$validation->withRequest($this->request)->run()) {
            //     // If validation fails, return JSON error response
            //     return $this->response->setJSON([
            //         'success' => false,
            //         'error' => $validation->getErrors()
            //     ]);
            // }
            
            $concernArray = [];

            $jsonData = $this->request->getJSON();
            if($jsonData) {

                $modifiedOn = $jsonData->modified_on;
                $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 

                $vendorConcern = $jsonData->vendor_heighlighted_concern;

                if (is_array($vendorConcern)) {
                    // The $vendorConcern is already an array, so no need for explode()
                    $concernArray = $vendorConcern;
                }
                        
                $formData = [
                    'final_status' => $jsonData->final_status,
                    'rebate' => $jsonData->rebate,
                    'fbm_company_name'  => $jsonData->fbm_company_name,
                    'business_website'  => $jsonData->business_website,
                    'fba_company_name'  => $jsonData->fba_company_name,
                    'account_manager'   => $jsonData->account_manager,
                    'business_account' => $jsonData->business_account,
                    'modified_on' => $formattedDate,
                    'modified-by' => $jsonData->modified_by,
                    'vendor-type' => $jsonData->vendor_type,
                    'vendor-type' => $jsonData->vendor_type,
                    'vendor-behaviour' => $jsonData->vendor_behaviour,
                    'business-brand' => $jsonData->business_brand,
                    'business-unit' => $jsonData->business_unit,
                    'vendor_description' => $jsonData->vendor_description,
                    'vendor_highlighted_concern' => json_encode($vendorConcern)
                ];
            
            }        

            echo '<pre>';
            var_dump($formData);
            echo '</pre>';
            // exit;

            // Proceed to insert the data if validation passes
            $businessModel = new BusinessDetailsModel();

            var_dump($businessModel); exit;

            // Insert data and log any errors
            if ($businessModel->insert($formData)) {


                echo 'query = ' . $businessModel->getLastQuery();
                $lastQuery = $businessModel->db->getLastQuery();
                log_message('info', 'Last Query: ' . $lastQuery);

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
