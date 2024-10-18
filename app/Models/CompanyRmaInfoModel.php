<?php
namespace App\Models;

use CodeIgniter\Model;

class CompanyRmaInfoModel extends Model
{
    protected $table = 'companyrmainfo';
    protected $primaryKey = 'companyRmaInfoId';
    
    // Define the fields to be inserted in the database
    protected $allowedFields = [
        'addDiscNoReturn', 'pocRmaFlag', 'rmaAccManager', 'rmaEmail', 'rmaContactNumber',
        'daysOfDelivery', 'returnAddFlag', 'rmaStreet', 'rmaCity', 'rmaCountry',
        'rmaState', 'rmaZipcode', 'restockingFeeUnit', 'restockingFee', 'Comments',
        'modifiedOn', 'modifiedBy', 'processedFile'
    ];
    
    protected $useTimestamps = true; // Enable automatic timestamping
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';

}
