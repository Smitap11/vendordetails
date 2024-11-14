<?php
namespace App\Controllers;

use App\Models\CompanyRmaInfoModel;
use App\Models\ContactInformationModel;
use CodeIgniter\Controller;

class CompanyRmaInfoController extends Controller
{
    public function saveCompanyRmaFormData()
    {

        // Check if the request is AJAX
        if ($this->request->isAJAX()) {

            $modifiedOn = $this->request->getPost('modifiedOn') ? $this->request->getPost('modifiedOn') : date('Y-m-d');
            $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 
            $skuPrefix       = $this->request->getPost('skuPrefix');

            echo 'BId = '.$businessId = $request->getPost('businessId') ?? null;

            // Check if businessId is empty, if so, fetch it based on skuPrefix and latest bussinesId
            if (empty($businessId)) {
                $ContactInformationModel = new ContactInformationModel();
                $businessRecord = $ContactInformationModel
                    ->where('skuPrefix', $skuPrefix)
                    ->orderBy('businessId', 'DESC') // Get the latest record
                    ->first();

                if ($businessRecord) {
                    $businessId = $businessRecord['businessId'];
                }
            }
        
            
            $path = WRITEPATH . 'uploads';
            $file = $this->request->getFile('file');
            $originalFileName = '';
            
            if ($file && $file->isValid()) {
                $originalFileName = $file->getClientName(); // Keep the original file name
    
                // Move the file to the specified path without renaming
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                $file->move($path, $originalFileName);
                $filePath = $path . $originalFileName;
            
            }    
            
            // Proceed to insert the data if validation passes
            $companyRmaInfoModel = new CompanyRmaInfoModel();

            $formData = [
                'addDiscNoReturn' => $this->request->getPost('addDiscNoReturn'),
                'pocRmaFlag' => $this->request->getPost('pocRmaFlag') ?? '0', // Default to '0' if not checked
                'rmaAccManager' => $this->request->getPost('rmaAccManager'),
                'rmaEmail' => $this->request->getPost('rmaEmail'),
                'rmaContactNumber' => $this->request->getPost('rmaContactNumber'),
                'daysOfDelivery' => $this->request->getPost('daysOfDelivery'),
                'returnAddFlag' => $this->request->getPost('returnAddFlag') ?? '0', // Default to '0' if not checked
                'rmaStreet' => $this->request->getPost('rmaStreet'),
                'rmaCity' => $this->request->getPost('rmaCity'),
                'rmaCountry' => $this->request->getPost('rmaCountry'),
                'rmaState' => $this->request->getPost('rmaState'),
                'rmaZipcode' => $this->request->getPost('rmaZipcode'),
                'restockingFeeUnit' => $this->request->getPost('restockingFeeUnit'),
                'restockingFee' => $this->request->getPost('restockingFee'),
                'Comments' => $this->request->getPost('Comments'),
                'modifiedOn' => $formattedDate,
                'modifiedBy' => $this->request->getPost('modifiedBy'),
                'processedFile'   => $originalFileName,
                'skuPrefix'       => $skuPrefix,
                'businessId'      => $businessId,
                'formStatus'      => 'incomplete'
            ];    


            // Insert data and log any errors
            if ($companyRmaInfoModel->insert($formData)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Finance/Payment information saved successfully',
                    'skuPrefix' => $skuPrefix,
                    'businessId' => $businessId,    
                    'csrf_hash' => csrf_hash()
                ]);
            } else {
                // Log the error and query
                log_message('error', 'Insert failed: ' . $companyRmaInfoModel->errors());
                log_message('error', 'Last Query: ' . $companyRmaInfoModel->getLastQuery());

                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to save Finance/Payment information'
                ]);
            }
        }
    }



}