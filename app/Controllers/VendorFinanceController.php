<?php

namespace App\Controllers;

use App\Models\VendorFinanceModel;
use CodeIgniter\HTTP\ResponseInterface;

class VendorFinanceController extends BaseController
{
    public function saveVendorFinanceFormData()
    {
        // Get the request object
        $request = $this->request;

        log_message('info', 'Controller index method called');

        // Capture form data using the request object
        $formData = [
            'invoiveSrcAllocation' => $request->getPost('invoiveSrcAllocation'),
            'invoiveSrcLevel'      => $request->getPost('invoiveSrcLevel'),
            'dropshipFee'          => $request->getPost('dropshipFee'),
            'shippingTerm'         => $request->getPost('shippingTerm'),
            'modeOfPayment'        => $request->getPost('modeOfPayment'),
        ];


        echo '<pre>';
        var_dump($formData);
        echo '</pre>';


        // exit;

        // Initialize model
        $vendorFinanceModel = new VendorFinanceModel();
        
        // Insert data and log any errors
        if ($vendorFinanceModel->insert($formData)) {
            log_message('info', 'Last Query: ' . $vendorFinanceModel->getLastQuery());

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Shipping information saved successfully'
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
