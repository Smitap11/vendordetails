<?php

namespace App\Controllers;

use App\Models\AddRecordModel;
use CodeIgniter\Controller;

class AddRecordController extends Controller
{
    public function saveAddRecordFormData()
    {
            $session = session();

            // Load the request and validation service
            $request = \Config\Services::request();

            $recordAddedOn = $request->getPost('recordAddedOn') ? $request->getPost('recordAddedOn') : date('Y-m-d');
            $formattedDate = date('Y-m-d', strtotime($recordAddedOn));
    
            $sessionBusinessId = $session->get('businessId');
            $sessionSkuPrefix  = $session->get('skuPrefix');
            $businessId = $sessionBusinessId ?? $request->getPost('businessId');
            $skuPrefix = $sessionSkuPrefix ?? $request->getPost('skuPrefix');     
                    
            $formData = [
                'recordAddedOn' => $formattedDate,
                'recordAddedBy' => $request->getPost('recordAddedBy'),
                'skuPrefix'     => $skuPrefix,
                'businessId'   => $businessId,
                'formStatus' => 'complete'
            ];
            
            // Proceed to insert the data if validation passes
            $addRecordModel = new AddRecordModel();
            $businessId = $addRecordModel->insert($formData);        

            // Insert data and log any errors
            if ($businessId) {

                // Set businessId in session
                $session->set('businessId', $businessId);

                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Record added successfully',
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
                    'message' => 'Failed to add record'
                ]);
            }

    }
}
