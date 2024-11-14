<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorFinanceModel extends Model
{
    protected $table = 'vendorfinancedetails';
    protected $primaryKey = 'vendorFinanceId';
    protected $allowedFields = [
        'invoiveSrcAllocation',
        'invoiveSrcLevel',
        'dropshipFee',
        'shippingTerm',
        'modeOfPayment',
        'skuPrefix',
        'businessId',
        'formStatus'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'createdAt';
    protected $updatedField = 'updatedAt';
}
