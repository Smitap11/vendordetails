<?php

namespace App\Models;

use CodeIgniter\Model;

class BusinessDetailsModel extends Model
{
    protected $table      = 'businessdetails'; // Your database table name
    protected $primaryKey = 'businessId';

    protected $allowedFields = [
        'finalStatus', 
        'rebate',
        'fbmCompanyName', 
        'businessWebsite',
        'fbaCompanyName',
        'accountManager',
        'businessAccount',
        'modifiedOn',
        'modifiedBy',
        'vendorType',
        'vendorBehaviour',
        'vendorHeighlightedConcern',
        'businessBrand',
        'businessUnit',
        'vendorDescription',
        'createdAt', 
        'updatedAt'
    ];    

    protected $useTimestamps = true; // Enable automatic timestamping
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';

}
