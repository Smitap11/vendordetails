<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ContactInformationModel;

class ContactInformationController extends Controller
{
    public function saveContactInfoFormData()
    {
        // Load the validation library
        $validation = \Config\Services::validation();

        // Set validation rules
        $validation->setRules([
            'contact-email' => 'required|valid-email',
            'additional-email' => 'required|valid-email',
            'contact-number' => 'required|numeric|min_length[10]|max_length[15]',
            'alt_contact_number' => 'required|numeric|min_length[10]|max_length[15]',
            'contact-zipcode' => 'required|numeric|exact_length[5]',
            'inventory-email' => 'required|valid_email',
            'inventory-contact-no' => 'required|numeric|min_length[10]|max_length[15]',
        ]);

        // Check if form validation passed
        if (!$this->validate($validation->getRules())) {
            // Redirect back to the form page with errors
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

            // Validate CSRF
        if (!$this->request->is('post')) {
            return $this->response->setStatusCode(403, 'Forbidden');
        }

        // Get data from the request
        $formData = $this->request->getPost();


        // Collect form data
        $formData = [
            'contact-email' => $this->request->getPost('contact_email'),
            'additional-email' => $this->request->getPost('additional_email'),
            'contact-number' => $this->request->getPost('contact_number'),
            'alt-contact-number' => $this->request->getPost('alt_contact_number'),
            'contact-zipcode' => $this->request->getPost('zipcode'),
            'contact-city' => $this->request->getPost('business_city'),
            'contact-street' => $this->request->getPost('business_street'),
            'contact-country' => $this->request->getPost('business_country'),
            'inventory-email' => $this->request->getPost('inventory_email'),
            'inventory-contact-no' => $this->request->getPost('inventory_contact_no'),
            'inventory-state' => $this->request->getPost('inventory_state'),
            'modified-on' => $this->request->getPost('modified_on'),
            'modified-by' => $this->request->getPost('modified_by'),
        ];

        
    echo '<pre>';
    print_r($formData);
    echo '</pre>';
    exit(); // Prevent further processing

        // Save the form data in the database
        $model = new ContactInformationModel();
        if ($model->save($formData)) {
            return redirect()->back()->with('message', 'Form submitted successfully!');
        } else {
            return redirect()->back()->with('message', 'Error saving form data.');
        }
    }
}
