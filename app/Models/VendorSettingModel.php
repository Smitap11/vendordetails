<?php
namespace App\Models;

use CodeIgniter\Model;

class VendorSettingModel extends Model
{
    protected $table = 'vendorsetting';
    protected $primaryKey = 'vendorSettingId';
    
    // Define the fields to be inserted in the database
    protected $allowedFields = [
        'vendorSettingType',
        'fbaSku',
        'creditCard',
        'vendorManager',
        'primeEligible',
        'ourShippingAccount',
        'shippingAccountDetail',
        'shippingAccountNumber',
        'vendorShareLabel',
        'modifiedOn',
        'modifiedBy',
        'vendorNote',
        'moqFlag',
        'skuPrefix',
        'businessId',
    ];
    
    protected $useTimestamps = true; // Enable automatic timestamping
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';

}
