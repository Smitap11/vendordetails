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
        $validation = \Config\Services::validation();

        // Define validation rules
        $validationRules = [
            'contact-email'          => 'required',
            'additional-email'       => 'required',
            'contact-number'         => 'required|numeric',
            'alt-contact-number'     => 'permit_empty|numeric',
            'contact-zipcode'        => 'required|numeric|min_length[5]',
            'contact-city'           => 'required',
            'contact-street'         => 'required',
            'contact-country'        => 'required',
            'inventory-email'        => 'permit_empty|valid_email',
            'inventory-contact-no'   => 'permit_empty|numeric',
            'inventory-state'        => 'permit_empty',
            'inventory-modified-on'  => 'permit_empty|valid_date[Y-m-d]',
            'inventory-modified-by'  => 'required'
        ];

        // Set validation rules
        $validation->setRules($validationRules);

        // Validate input data
        if (!$this->validate($validationRules)) {
            // Validation failed, return errors
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()
            ]);
        }

        
        // Save data to the database
        $contactModel = new ContactInformationModel();

        $modifiedOn = $request->getPost('inventory-modified-on');
        $formattedDate = date('Y-m-d', strtotime($modifiedOn)); 

        // Gather data from the form
        $contactData = [
            'contact_email'           => $request->getPost('contact-email'),
            'additional_email'        => $request->getPost('additional-email'),
            'contact_number'          => $request->getPost('contact-number'),
            'alt_contact_number'      => $request->getPost('alt-contact-number'),
            'contact_zipcode'         => $request->getPost('contact-zipcode'),
            'contact_city'            => $request->getPost('contact-city'),
            'contact_street'          => $request->getPost('contact-street'),
            'contact_country'         => $request->getPost('contact-country'),
            'inventory_email'         => $request->getPost('inventory-email'),
            'inventory_contact_no'    => $request->getPost('inventory-contact-no'),
            'inventory_state'         => $request->getPost('inventory-state'),
            'inventory_modified_on'   => $formattedDate,
            'inventory_modified_by'   => $request->getPost('inventory-modified-by')
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
