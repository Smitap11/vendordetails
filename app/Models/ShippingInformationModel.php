<?php
namespace App\Models;

use CodeIgniter\Model;

class ShippingInformationModel extends Model
{
    protected $table = 'shippinginformation';
    protected $primaryKey = 'shippinginfoid';
    
    // Define the fields to be inserted in the database
    protected $allowedFields = [
        'shippingAccount', 
        'ltlFreight', 
        'shareLabel', 
        'rateType', 
        'internationalShipping',
        'pushCompanyName', 
        'shippingInfoComments', 
        'shippingModifiedOn', 
        'shippingModifiedBy', 
        'shipmentUpdatingType', 
        'shippingTrackingSource',
        'skuPrefix',
        'businessId',
    ];    
    
    protected $useTimestamps = true; // Enable automatic timestamping
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';


}
