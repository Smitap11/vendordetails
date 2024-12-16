<?php
namespace App\Controllers;

use App\Models\VendorSettingModel;
use CodeIgniter\Controller;

class VendorSettingController extends Controller
{
    public function saveVendorSettingFormData()
    {
        $session = session();
        // Check if the request is AJAX
        if ($this->request->isAJAX()) {

            $modifiedOn = $this->request->getPost('modifiedOn') ? $this->request->getPost('modifiedOn') : date('Y-m-d');
            $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 
            
            $sessionBusinessId = $session->get('businessId');
            $sessionSkuPrefix  = $session->get('skuPrefix');
            $businessId = $sessionBusinessId ?? $this->request->getPost('businessId');
            $skuPrefix = $sessionSkuPrefix ?? $this->request->getPost('skuPrefix');
            
            // Proceed to insert the data if validation passes
            $vendorSettingModel = new VendorSettingModel();

            $formData = [
                'vendorSettingType'     => $this->request->getPost('vendorSettingType'),
                'fbaSku'                => $this->request->getPost('fbaSku'),
                'creditCard'            => $this->request->getPost('creditCard'),
                'vendorManager'         => $this->request->getPost('vendorManager'),
                'primeEligible'         => $this->request->getPost('primeEligible'),
                'ourShippingAccount'    => $this->request->getPost('ourShippingAccount'),
                'shippingAccountDetail' => $this->request->getPost('shippingAccountDetail'),
                'shippingAccountNumber' => $this->request->getPost('shippingAccountNumber'),
                'vendorShareLabel'      => $this->request->getPost('vendorShareLabel'),
                'modifiedOn'            => $formattedDate,
                'modifiedBy'            => $this->request->getPost('modifiedBy'),
                'vendorNote'            => $this->request->getPost('vendorNote'),
                'moqFlag'               => $this->request->getPost('moqFlag') ? 1 : 0,
                'skuPrefix'            => $skuPrefix,
                'businessId'           => $businessId,
                'formStatus'           => 'incomplete'
            ];    
            

            // Insert data and log any errors
            if ($vendorSettingModel->insert($formData)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Vendor Setting information saved successfully',
                    'skuPrefix' => $skuPrefix,
                    'businessId' => $businessId,    
                    'csrf_hash' => csrf_hash()
                ]);
            } else {
                // Log the error and query
                log_message('error', 'Insert failed: ' . $vendorSettingModel->errors());
                log_message('error', 'Last Query: ' . $vendorSettingModel->getLastQuery());

                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to save Vendor Setting information'
                ]);
            }
        }
    }
}
