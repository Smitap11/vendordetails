<?php
namespace App\Controllers;

use App\Models\ShippingInformationModel;
use CodeIgniter\Controller;

class ShippingInformationController extends Controller
{
    public function saveShippingInfoFormData()
    {

        // Check if the request is AJAX
        if ($this->request->isAJAX()) {

            $modifiedOn = $this->request->getPost('shippingModifiedOn') ? $this->request->getPost('shippingModifiedOn') : date('Y-m-d');
            $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 
            $skuPrefix       = $this->request->getPost('skuPrefix');
            $businessId      = $this->request->getPost('businessId');
            
            // Proceed to insert the data if validation passes
            $shippingModel = new ShippingInformationModel();

            $formData = [
                'shippingAccount'          => $this->request->getPost('shippingAccount'),
                'ltlFreight'               => $this->request->getPost('ltlFreight'),
                'shareLabel'               => $this->request->getPost('shareLabel'),
                'rateType'                 => $this->request->getPost('rateType'),
                'internationalShipping'     => $this->request->getPost('internationalShipping'),
                'pushCompanyName'          => $this->request->getPost('pushCompanyName'),
                'shippingInfoComments'     => $this->request->getPost('shippingInfoComments'),
                'shippingModifiedOn'       => $formattedDate,
                'shippingModifiedBy'       => $this->request->getPost('shippingModifiedBy'),
                'shipmentUpdatingType'     => $this->request->getPost('shipmentUpdatingType'),
                'shippingTrackingSource'   => $this->request->getPost('shippingTrackingSource'),
                'skuPrefix'       => $skuPrefix,
                'businessId'      => $businessId
            ];

            // Insert data and log any errors
            if ($shippingModel->insert($formData)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Shipping information saved successfully',
                    'skuPrefix' => $skuPrefix,
                    'businessId' => $businessId,    
                    'csrf_hash' => csrf_hash()
                    
                ]);
            } else {
                // Log the error and query
                log_message('error', 'Insert failed: ' . $shippingModel->errors());
                log_message('error', 'Last Query: ' . $shippingModel->getLastQuery());

                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to save shipping information'
                ]);
            }
        }
    }
}
