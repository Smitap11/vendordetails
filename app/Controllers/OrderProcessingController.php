<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\OrderProcessingModel;

class OrderProcessingController extends Controller
{
    
    public function saveOrderProcessingFormData()
    {
        $session = session();

        $response = ['status' => 'error', 'message' => 'Failed to save order processing data.'];

        if ($this->request->getPost()) {

            $modifiedOn = $this->request->getPost('modifiedOn') ? $this->request->getPost('modifiedOn') : date('Y-m-d');
            $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 
            $shippingDestinations = $this->request->getPost('shippingDestinations');
            
            $sessionBusinessId = $session->get('businessId');
            $sessionSkuPrefix  = $session->get('skuPrefix');
            $businessId = $sessionBusinessId ?? $this->request->getPost('businessId');
            $skuPrefix = $sessionSkuPrefix ?? $this->request->getPost('skuPrefix');

            if (is_array($shippingDestinations)) {
                $shippingDestinations = implode(',', $shippingDestinations);
            } else {
                $shippingDestinations = null;
            }
            
            
            // Prepare data for saving
            $orderData = [
                'howToPlaceOrder' => $this->request->getPost('howToPlaceOrder'),
                'orderPrimeEmail' => $this->request->getPost('orderPrimeEmail'),

                // website section
                'websiteUrl' => $this->request->getPost('websiteUrl') ?? null,
                'websiteUsername' => $this->request->getPost('websiteUsername') ?? null,
                'websitePassword' => $this->request->getPost('websitePassword') ?? null,

                // email section
                'emailEmailId' => $this->request->getPost('emailEmailId') ?? null,
                'emailHowToPlaceOrder' => $this->request->getPost('emailHowToPlaceOrder') ?? null,

                //ftp section
                'ftpHost' => $this->request->getPost('ftpHost') ?? null,
                'ftpUsername' => $this->request->getPost('ftpUsername') ?? null,
                'ftpPassword' => $this->request->getPost('ftpPassword') ?? null,

                'timeToShip' => $this->request->getPost('timeToShip'),
                'shippingContactEmail' => $this->request->getPost('shippingContactEmail'),
                'inventoryHandlingTime' => $this->request->getPost('inventoryHandlingTime'),
                'warehouseAddr' => $this->request->getPost('warehouseAddr') ? 1 : 0,
                'orderStreet' => $this->request->getPost('orderStreet'),
                'orderCity' => $this->request->getPost('orderCity'),
                'orderCountry' => $this->request->getPost('orderCountry'),
                'orderState' => $this->request->getPost('orderState'),
                'orderZipcode' => $this->request->getPost('orderZipcode'),
                'shippingDestinations' => $shippingDestinations,
                'poBoxNo' => $this->request->getPost('poBoxNo'),
                'assgEmailTemp' => $this->request->getPost('assgEmailTemp'),
                'groundShipment' => $this->request->getPost('groundShipment'),
                'shippingAcc' => $this->request->getPost('shippingAcc'),
                'ltlShipment' => $this->request->getPost('ltlShipment'),
                'trackingEmail' => $this->request->getPost('trackingEmail'),
                'labelEmail' => $this->request->getPost('labelEmail'),
                'labelPhoneNo' => $this->request->getPost('labelPhoneNo'),
                'rrdInvolved' => $this->request->getPost('rrdInvolved'),
                'modifiedOn' => $formattedDate,
                'modifiedBy' => $this->request->getPost('modifiedBy'),
                'cancellationEmail' => $this->request->getPost('cancellationEmail'),
                'vendorQueryEmail' => $this->request->getPost('vendorQueryEmail'),
                'orderComments' => $this->request->getPost('orderComments'),
                'shippingComments' => $this->request->getPost('shippingComments'),
                'shipFollowEmails' => $this->request->getPost('shipFollowEmails'),
                'shipFollowTemplates' => $this->request->getPost('shipFollowTemplates'),
                'epgAddress' => $this->request->getPost('epgAddress'),
                'businessId'             => $businessId,
                'skuPrefix'              => $skuPrefix,
                'formStatus'             => 'incomplete'
            ];
        
            // Save to the database
            $orderModel = new OrderProcessingModel();
            $orderId = $orderModel->insert($orderData);

            if ($orderId) {
                $response = [
                    'status' => 'success',
                    'message' => 'Order Processing Information saved successfully.',
                    'businessId' => $businessId, 
                    'skuPrefix'  => $skuPrefix,  
                    'csrf_hash' => csrf_hash()
                ];
            } else {
                $response['message'] = 'Failed to save order processing data due to database error.';
            }
        }

        return $this->response->setJSON($response);
    }
}
