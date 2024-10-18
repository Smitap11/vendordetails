<?php
namespace App\Controllers;

use App\Models\CompanyRmaInfoModel;
use CodeIgniter\Controller;

class CompanyRmaInfoController extends Controller
{
    public function saveCompanyRmaFormData()
    {

        // Check if the request is AJAX
        if ($this->request->isAJAX()) {

            $modifiedOn = $this->request->getPost('modifiedOn') ? $this->request->getPost('modifiedOn') : date('Y-m-d');
            $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 

            var_dump($this->request->getFiles());
            var_dump($this->request->getPost());
            
            


            // $path = WRITEPATH . 'uploads';

            $file = $this->request->getFile('processedFile');

            // if($file->isValid()) {
            //     $file = $this->uploadFile($path, $file);
            // } else {
            //     $this->response->setJSON = [
            //     'message' => 'Please select valid file',
            //     'status'  => false
            //     ];
            // }
            
            // function uploadFile($path, $file) {
            //     if(!is_dir($path))
            //         mkdir($path, 0777, TRUE);

            //     if($file->isValid() && $file->hasMoved()){
            //         $file->move('./', $path, $newfile);
            //         return $path.$file-getName();
            //     }
            //     return false;

            // }

            // Proceed to insert the data if validation passes
            $companyRmaInfoModel = new CompanyRmaInfoModel();

            $formData = [
                'addDiscNoReturn' => $this->request->getPost('addDiscNoReturn'),
                'pocRmaFlag' => $this->request->getPost('pocRmaFlag') ?? '0', // Default to '0' if not checked
                'rmaAccManager' => $this->request->getPost('rmaAccManager'),
                'rmaEmail' => $this->request->getPost('rmaEmail'),
                'rmaContactNumber' => $this->request->getPost('rmaContactNumber'),
                // 'daysOfDelivery' => $this->request->getPost('daysOfDelivery'),
                // 'returnAddFlag' => $this->request->getPost('returnAddFlag') ?? '0', // Default to '0' if not checked
                // 'rmaStreet' => $this->request->getPost('rmaStreet'),
                // 'rmaCity' => $this->request->getPost('rmaCity'),
                // 'rmaCountry' => $this->request->getPost('rmaCountry'),
                // 'rmaState' => $this->request->getPost('rmaState'),
                // 'rmaZipcode' => $this->request->getPost('rmaZipcode'),
                // 'restockingFeeUnit' => $this->request->getPost('restockingFeeUnit'),
                // 'restockingFee' => $this->request->getPost('restockingFee'),
                // 'Comments' => $this->request->getPost('Comments'),
                // 'modifiedOn' => $formattedDate,
                // 'modifiedBy' => $this->request->getPost('modifiedBy'),
                // 'processedFile' => $file,
            ];    

            var_dump($formData);

            

            // Insert data and log any errors
            if ($companyRmaInfoModel->insert($formData)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Finance/Payment information saved successfully'
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
