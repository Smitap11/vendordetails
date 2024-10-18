<?php

namespace App\Controllers;

use App\Models\BusinessDetailsModel;
use CodeIgniter\Controller;

class BusinessDetailsController extends Controller
{
    public function saveBusinessFormData()
    {
        if ($this->request->isAJAX()) {
            
            $concernArray = [];

            $jsonData = $this->request->getJSON();
            if($jsonData) {

                $modifiedOn = $jsonData->modifiedOn ? $jsonData->modifiedOn : date('Y-m-d');
                $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 

                $vendorConcern = $jsonData->vendorHeighlightedConcern;

                if (is_array($vendorConcern)) {
                    $concernArray = $vendorConcern;
                }
                        
                $formData = [
                    'finalStatus' => $jsonData->finalStatus,
                    'rebate' => $jsonData->rebate,
                    'fbmCompanyName' => $jsonData->fbmCompanyName,
                    'businessWebsite' => $jsonData->businessWebsite,
                    'fbaCompanyName' => $jsonData->fbaCompanyName,
                    'accountManager' => $jsonData->accountManager,
                    'businessAccount' => $jsonData->businessAccount,
                    'modifiedOn' => $formattedDate,
                    'modifiedBy' => $jsonData->modifiedBy,
                    'vendorType' => $jsonData->vendorType,
                    'vendorBehaviour' => $jsonData->vendorBehaviour,
                    'vendorHeighlightedConcern' => json_encode($vendorConcern),
                    'businessBrand' => $jsonData->businessBrand,
                    'businessUnit' => $jsonData->businessUnit,
                    'vendorDescription' => $jsonData->vendorDescription
                ];
                
            }        

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
