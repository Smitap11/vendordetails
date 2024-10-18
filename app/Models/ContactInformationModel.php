<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactInformationModel extends Model
{
    protected $table = 'contactinformation'; // Change to your table name
    protected $primaryKey = 'contactInfoId';

    protected $allowedFields = [
        'contactEmail', 
        'additionalEmail', 
        'contactNumber', 
        'altContactNumber', 
        'contactZipcode', 
        'contactCity', 
        'contactStreet', 
        'contactCountry', 
        'inventoryEmail', 
        'inventoryContactNo', 
        'inventoryState', 
        'inventoryModifiedOn', 
        'inventoryModifiedBy',
        'createdAt', 
        'updatedAt'
    ];
    

    protected $useTimestamps = true; // Enable automatic timestamping
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';

}
