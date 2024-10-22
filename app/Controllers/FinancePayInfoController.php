<?php
namespace App\Controllers;

use App\Models\FinancePayInfoModel;
use CodeIgniter\Controller;

class FinancePayInfoController extends Controller
{
    public function saveFinancePayInfoFormData()
    {

        // Check if the request is AJAX
        if ($this->request->isAJAX()) {

            $modifiedOn = $this->request->getPost('modifiedOn') ? $this->request->getPost('modifiedOn') : date('Y-m-d');
            $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 
            
            // Proceed to insert the data if validation passes
            $financePayInfoModel = new FinancePayInfoModel();

            $formData = [
                'pocFlag' => $this->request->getPost('pocFlag') ? '1' : '0', // Ensuring it is saved as string '0' or '1'
                'financeAccManager' => $this->request->getPost('financeAccManager'),
                'financeEmail' => $this->request->getPost('financeEmail'),
                'contactNumber' => $this->request->getPost('contactNumber'),
                'modeOfPayment' => $this->request->getPost('modeOfPayment'),
                'paymentTerm' => $this->request->getPost('paymentTerm'),
                'paymentSelectAny' => $this->request->getPost('paymentSelectAny'),
                'chargingCompanyName' => $this->request->getPost('chargingCompanyName'),
                'chargeDropshipFee' => $this->request->getPost('chargeDropshipFee'),
                'extraDropshipFee' => $this->request->getPost('extraDropshipFee'),
                'modifiedOn' => $formattedDate,
                'modifiedBy' => $this->request->getPost('modifiedBy'),
            ];    
            

            // Insert data and log any errors
            if ($financePayInfoModel->insert($formData)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Finance/Payment information saved successfully'
                ]);
            } else {
                // Log the error and query
                log_message('error', 'Insert failed: ' . $financePayInfoModel->errors());
                log_message('error', 'Last Query: ' . $financePayInfoModel->getLastQuery());

                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to save Finance/Payment information'
                ]);
            }
        }
    }
}
