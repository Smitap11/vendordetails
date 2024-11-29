<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\OrderProcessingModel;

class OrderProcessingController extends Controller
{
    public function saveOrderProcessingFormData()
    {
        $response = ['status' => 'error', 'message' => 'Failed to save order processing data.'];

        // Get the JSON data from the request
        $jsonData = $this->request->getJSON();
        if ($jsonData) {

            $modifiedOn = $jsonData->modifiedOn ? $jsonData->modifiedOn : date('Y-m-d');
            $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 

            
            // Prepare data for saving
            $orderData = [
                'howToPlaceOrder' => $this->request->getPost('howToPlaceOrder'),
                'orderPrimeEmail' => $this->request->getPost('orderPrimeEmail'),
                'orderWebsite' => $this->request->getPost('orderWebsite'),
                'orderUsername' => $this->request->getPost('orderUsername'),
                'orderPassword' => $this->request->getPost('orderPassword'),
                'websiteEmail' => $this->request->getPost('websiteEmail'),
                'websiteHowToPlaceOrder' => $this->request->getPost('websiteHowToPlaceOrder'),
                'timeToShip' => $this->request->getPost('timeToShip'),
                'shippingContactEmail' => $this->request->getPost('shippingContactEmail'),
                'inventoryHandlingTime' => $this->request->getPost('inventoryHandlingTime'),
                'warehouseAddr' => $this->request->getPost('warehouseAddr') ? 1 : 0,
                'orderStreet' => $this->request->getPost('orderStreet'),
                'orderCity' => $this->request->getPost('orderCity'),
                'orderCountry' => $this->request->getPost('orderCountry'),
                'orderState' => $this->request->getPost('orderState'),
                'orderZipcode' => $this->request->getPost('orderZipcode'),
                'shippingDestinations' => implode(',', $this->request->getPost('shippingDestinations') ?? []),
                'poBoxNo' => $this->request->getPost('poBoxNo'),
                'assgEmailTemp' => $this->request->getPost('assgEmailTemp'),
                'groundShipment' => $this->request->getPost('groundShipment'),
                'shippingAcc' => $this->request->getPost('shippingAcc'),
                'ltlShipment' => $this->request->getPost('ltlShipment'),
                'trackingEmailt' => $this->request->getPost('trackingEmailt'),
                'labelEmail' => $this->request->getPost('labelEmail'),
                'labelPhoneNo' => $this->request->getPost('labelPhoneNo'),
                'rrdInvolved' => $this->request->getPost('rrdInvolved'),
                'modifiedOn' => $formattedDate,
                'modifiedBy' => $this->request->getPost('modifiedBy'),
                'cancellationEmail' => $this->request->getPost('cancellationEmail'),
                'vendorQueryEmail' => $this->request->getPost('vendorQueryEmail'),
                'orderComments' => $this->request->getPost('orderComments'),
                'shippingComments' => $this->request->getPost('shippingComments'),
                'shipFollowStatus' => $this->request->getPost('shipFollowStatus'),
                'shiplemtFollowupEmails' => $this->request->getPost('shiplemtFollowupEmails'),
                'shipFollowTemplates' => $this->request->getPost('shipFollowTemplates'),
                'epgAddress' => $this->request->getPost('epgAddress'),
                'businessId'             => $businessId,
                'formStatus'             => 'incomplete'
            ];
        

            // Save to the database
            $orderModel = new OrderProcessingModel();
            $orderId = $orderModel->insert($orderData);

            if ($orderId) {
                $response = [
                    'status' => 'success',
                    'message' => 'Order Processing Information saved successfully.',
                    'orderId' => $orderId,
                    'businessId' => $businessId,    
                    'csrf_hash' => csrf_hash()
                ];
            } else {
                $response['message'] = 'Failed to save order processing data due to database error.';
            }
        }

        return $this->response->setJSON($response);
    }
}
