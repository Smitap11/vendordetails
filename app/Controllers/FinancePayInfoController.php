<?php
namespace App\Controllers;

use App\Models\FinancePayInfoModel;
use App\Models\CompanyRmaInfoModel;
use CodeIgniter\Controller;

class FinancePayInfoController extends Controller
{
    public function saveFinancePayInfoFormData()
    {

        $session = session();
        // Check if the request is AJAX
        if ($this->request->isAJAX()) {

            $modifiedOn = $this->request->getPost('modifiedOn') ? $this->request->getPost('modifiedOn') : date('Y-m-d');
            $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 
            $skuPrefix       = $this->request->getPost('skuPrefix');

            $sessionBusinessId = $session->get('businessId');
            $businessId = $sessionBusinessId ?? $request->getPost('businessId');

            // Check if businessId is empty, if so, fetch it based on skuPrefix and latest bussinesId
            if (empty($businessId)) {
                $CompanyRmaInfoModel = new CompanyRmaInfoModel();
                $businessRecord = $CompanyRmaInfoModel
                    ->where('skuPrefix', $skuPrefix)
                    ->orderBy('businessId', 'DESC') // Get the latest record
                    ->first();

                if ($businessRecord) {
                    $businessId = $businessRecord['businessId'];
                }
            }
            
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
                'skuPrefix'       => $skuPrefix,
                'businessId'      => $businessId,
                'formStatus' => 'incomplete'
            ];    
            

            // Insert data and log any errors
            if ($financePayInfoModel->insert($formData)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Finance/Payment information saved successfully',
                    'skuPrefix' => $skuPrefix,
                    'businessId' => $businessId,    
                    'csrf_hash' => csrf_hash()
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
