<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactInformationModel extends Model
{
    protected $table = 'contact_information'; // Change to your table name
    protected $primaryKey = 'contact_info_id';

    protected $allowedFields = [
        'contact_email', 'additional_email', 'contact_number', 'alt_contact_number', 
        'contact_zipcode', 'contact_city', 'contact_street', 'contact_country', 'inventory_email', 
        'inventory_contact_no', 'inventory_state', 'inventory_modified_on', 'inventory_modified_by',
        'created_at', 'updated_at'
    ];

    protected $useTimestamps = true; // Enable automatic timestamping
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
