<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactInformationModel extends Model
{
    protected $table = 'contactinformation';
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
        'skuPrefix',
        'businessId',
        'createdAt', 
        'updatedAt'
    ];
    

    protected $useTimestamps = true;
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';

}
