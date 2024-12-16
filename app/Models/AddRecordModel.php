<?php

namespace App\Models;

use CodeIgniter\Model;

class AddRecordModel extends Model
{
    protected $table      = 'addrecord'; // Your database table name
    protected $primaryKey = 'recordId';

    protected $allowedFields = [
        'recordAddedOn',
        'recordAddedBy',
        'skuPrefix',
        'businessId',
        'formStatus',
        'createdAt', 
        'updatedAt'
    ];    

    protected $useTimestamps = true; // Enable automatic timestamping
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';

}


