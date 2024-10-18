<?php

namespace App\Controllers;

use App\Models\ContactInformationModel;
use CodeIgniter\Controller;

class ContactInformationController extends Controller
{
    public function saveContactInfoFormData()
    {
        // Load the request and validation service
        $request = \Config\Services::request();
        
        
        // Save data to the database
        $contactModel = new ContactInformationModel();

        $modifiedOn = $request->getPost('inventoryModifiedOn');
        $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 

        // Gather data from the form
        $contactData = [
            'contactEmail'           => $request->getPost('contactEmail'),
            'additionalEmail'        => $request->getPost('additionalEmail'),
            'contactNumber'          => $request->getPost('contactNumber'),
            'altContactNumber'       => $request->getPost('altContactNumber'),
            'contactZipcode'         => $request->getPost('contactZipcode'),
            'contactCity'            => $request->getPost('contactCity'),
            'contactStreet'          => $request->getPost('contactStreet'),
            'contactCountry'         => $request->getPost('contactCountry'),
            'inventoryEmail'         => $request->getPost('inventoryEmail'),
            'inventoryContactNo'     => $request->getPost('inventoryContactNo'),
            'inventoryState'         => $request->getPost('inventoryState'),
            'inventoryModifiedOn'    => $formattedDate,
            'inventoryModifiedBy'    => $request->getPost('inventoryModifiedBy')
        ];
        

        // Insert data and log any errors
        if ($contactModel->insert($contactData)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Contact information saved successfully'
            ]);
        } else {
            // Log the error and query
            log_message('error', 'Insert failed: ' . $contactModel->errors());
            log_message('error', 'Last Query: ' . $contactModel->getLastQuery());

            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to save Contact information'
            ]);
        }


    }
}
