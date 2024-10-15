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
            // Define validation rules
            $validationRules = [
                'shipping-account'          => 'required',
                'ltl-freight'               => 'required',
                'share-label'               => 'required',
                'rate-type'                 => 'required',
                'international-shipping'    => 'required',
                'push-company-name'         => 'required',
                'shipping-info-comments'    => 'permit_empty|string|max_length[255]',
                'shipping-modified-on'      => 'required|valid_date',
                'shipping-modified-by'      => 'required|string|max_length[100]',
                'shipment-updating-type'    => 'required|in_list[1,2,3]',
                'shipping-tracking-source'  => 'required|string|max_length[100]'
            ];

            // Validate the form data
            if (!$this->validate($validationRules)) {
                // Get validation errors
                $validation = \Config\Services::validation();
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validation->getErrors()
                ]);
            }

            // Proceed to insert the data if validation passes
            $shippingModel = new ShippingInformationModel();

            $data = [
                'shipping_account'          => $this->request->getPost('shipping-account'),
                'ltl_freight'               => $this->request->getPost('ltl-freight'),
                'share_label'               => $this->request->getPost('share-label'),
                'rate_type'                 => $this->request->getPost('rate-type'),
                'international_shipping'    => $this->request->getPost('international-shipping'),
                'push_company_name'         => $this->request->getPost('push-company-name'),
                'comments'                  => $this->request->getPost('shipping-info-comments'),
                'modified_on'               => $this->request->getPost('shipping-modified-on'),
                'modified_by'               => $this->request->getPost('shipping-modified-by'),
                'shipment_updating_type'    => $this->request->getPost('shipment-updating-type'),
                'shipping_tracking_source'  => $this->request->getPost('shipping-tracking-source')
            ];

            // Insert data and log any errors
            if ($shippingModel->insert($data)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Shipping information saved successfully'
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
