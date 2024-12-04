<?php

namespace App\Controllers;

use App\Models\BusinessDetailsModel;
use CodeIgniter\Controller;

class BusinessDetailsController extends Controller
{
    public function saveBusinessFormData()
    {
            $session = session();
            $concernArray = [];

            $jsonData = $this->request->getJSON();
            if($jsonData) {

                $modifiedOn = $jsonData->modifiedOn ? $jsonData->modifiedOn : date('Y-m-d');
                $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 

                $vendorConcern = $jsonData->vendorHeighlightedConcern;

                // Get company name and generate skuPrefix
                $companyName = $jsonData->companyName;
                $cleanedCompanyName = str_replace(' ', '', $companyName); // Remove all spaces
                $skuPrefix = strtoupper(substr($cleanedCompanyName, 0, 4). '-');


                if (is_array($vendorConcern)) {
                    $concernArray = $vendorConcern;
                }
                        
                $formData = [
                    'finalStatus' => $jsonData->finalStatus,
                    'rebate' => $jsonData->rebate,
                    'companyName' => $companyName,
                    'businessWebsite' => $jsonData->businessWebsite,
                    'accountManager' => $jsonData->accountManager,
                    'businessAccount' => $jsonData->businessAccount,
                    'modifiedOn' => $formattedDate,
                    'modifiedBy' => $jsonData->modifiedBy,
                    'vendorType' => $jsonData->vendorType,
                    'vendorBehaviour' => $jsonData->vendorBehaviour,
                    'vendorHeighlightedConcern' => json_encode($vendorConcern),
                    'businessBrand' => $jsonData->businessBrand,
                    'businessUnit' => $jsonData->businessUnit,
                    'businessCategory' => $jsonData->businessCategory,
                    'vendorDescription' => $jsonData->vendorDescription,
                    'skuPrefix' => $skuPrefix,
                    'formStatus' => 'incomplete'
                ];
                
            }   
            
            // Proceed to insert the data if validation passes
            $businessModel = new BusinessDetailsModel();
            $businessId = $businessModel->insert($formData);        

            // Insert data and log any errors
            if ($businessId) {

                // Set businessId in session
                $session->set('businessId', $businessId);

                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Business details saved successfully',
                    'skuPrefix' => $skuPrefix,
                    'businessId' => $businessId,    
                    'csrf_hash' => csrf_hash()
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
