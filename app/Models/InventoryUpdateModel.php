<?php
namespace App\Models;

use CodeIgniter\Model;

class InventoryUpdateModel extends Model
{
    protected $table = 'inventoryupdate';
    protected $primaryKey = 'InventoryUpdateId';
    
    // Define the fields to be inserted in the database
    protected $allowedFields = [
        'inventrySendingFrom', 
        'inventoryEmail', 
        'timePeriod', 
        'inventoryComments', 
        'accountManager',
        'email', 
        'contactNumber', 
        'modifiedOn', 
        'modifiedBy',
        'skuPrefix',
        'businessId',
        'formStatus'
    ];    
    
    protected $useTimestamps = true; // Enable automatic timestamping
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';


}
