<?php
namespace App\Controllers;

use App\Models\InventoryUpdateModel;
use CodeIgniter\Controller;

class InventoryUpdateController extends Controller
{
    public function saveInventoryUpdateFormData()
    {

        // Check if the request is AJAX
        if ($this->request->isAJAX()) {

            $modifiedOn = $this->request->getPost('modifiedOn') ? $this->request->getPost('modifiedOn') : date('Y-m-d');
            $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 
            
            // Proceed to insert the data if validation passes
            $inventoryUpdateModel = new InventoryUpdateModel();

            $formData = [
                'inventrySendingFrom' => $this->request->getPost('inventrySendingFrom'),
                'inventoryEmail' => $this->request->getPost('inventoryEmail'),
                'timePeriod' => $this->request->getPost('timePeriod'),
                'inventoryComments' => $this->request->getPost('inventoryComments'),
                'accountManager' => $this->request->getPost('accountManager'),
                'email' => $this->request->getPost('email'),
                'contactNumber' => $this->request->getPost('contactNumber'),
                'modifiedOn' => $formattedDate,
                'modifiedBy' => $this->request->getPost('modifiedBy'),
            ];    
            
            // Insert data and log any errors
            if ($inventoryUpdateModel->insert($formData)) {

                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Inventory Updated successfully'
                ]);
            } else {
                // Log the error and query
                log_message('error', 'Insert failed: ' . $inventoryUpdateModel->errors());
                log_message('error', 'Last Query: ' . $inventoryUpdateModel->getLastQuery());

                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to update Inventory'
                ]);
            }
        }
    }
}