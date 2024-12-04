<?php

namespace App\Controllers;

use App\Models\VendorFinanceModel;
use CodeIgniter\HTTP\ResponseInterface;

class VendorFinanceController extends BaseController
{
    public function saveVendorFinanceFormData()
    {
        $session = session();
        // Get the request object
        $request = $this->request;
        
        $skuPrefix       = $request->getPost('skuPrefix');
        //$businessId      = $request->getPost('businessId');
        
        $sessionBusinessId = $session->get('businessId');
        $businessId = $sessionBusinessId ?? $request->getPost('businessId');

        // Capture form data using the request object
        $formData = [
            'invoiveSrcAllocation' => $request->getPost('invoiveSrcAllocation'),
            'invoiveSrcLevel'      => $request->getPost('invoiveSrcLevel'),
            'dropshipFee'          => $request->getPost('dropshipFee'),
            'shippingTerm'         => $request->getPost('shippingTerm'),
            'modeOfPayment'        => $request->getPost('modeOfPayment'),
            'skuPrefix'            => $skuPrefix,
            'businessId'           => $businessId,
            'formStatus'           => 'incomplete'
        ];

        // Initialize model
        $vendorFinanceModel = new VendorFinanceModel();
        
        // Insert data and log any errors
        if ($vendorFinanceModel->insert($formData)) {

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Shipping information saved successfully',
                'skuPrefix' => $skuPrefix,
                'businessId' => $businessId,    
                'csrf_hash' => csrf_hash()
            ]);

        } else {
            // Log the error and query
            log_message('error', 'Insert failed: ' . $vendorFinanceModel->errors());
            log_message('error', 'Last Query: ' . $vendorFinanceModel->getLastQuery());

            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to save shipping information'
            ]);
        }
    }
}
