<?php

namespace App\Models;

use CodeIgniter\Model;

class FinancePayInfoModel extends Model
{
    protected $table = 'financeorpaymentinfo'; // Change to your table name
    protected $primaryKey = 'paymentId';

    protected $allowedFields = [
        'pocFlag',
        'financeAccManager',
        'financeEmail',
        'ContactNumber',
        'modeOfPayment',
        'paymentTerm',
        'paymentSelectAny',
        'chargingCompanyName',
        'chargeDropshipFee',
        'extraDropshipFee',
        'modifiedOn',
        'modifiedBy'
    ];
    

    protected $useTimestamps = true; // Enable automatic timestamping
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';

}
