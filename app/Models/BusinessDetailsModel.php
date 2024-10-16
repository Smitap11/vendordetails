<?php

namespace App\Models;

use CodeIgniter\Model;

class BusinessDetailsModel extends Model
{
    protected $table      = 'business_details'; // Your database table name
    protected $primaryKey = 'business_id';

    protected $allowedFields = [
        'final_status',
        'rebate',
        'fbm_company_name',
        'business_website',
        'fba_company_name',
        'account_manager',
        'business_account',
        'modified_on',
        'modified_by',
        'vendor_type',
        'vendor_behaviour',
        'vendor_heighlighted_concern',
        'business_brand',
        'business_unit',
        'vendor_description',
        'created_at', 
        'updated_at'
    ];

    protected $useTimestamps = true; // Enable automatic timestamping
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
