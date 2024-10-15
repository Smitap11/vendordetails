<?php
namespace App\Models;

use CodeIgniter\Model;

class ShippingInformationModel extends Model
{
    protected $table = 'shipping_information';
    protected $primaryKey = 'shipping_information_id';
    
    // Define the fields to be inserted in the database
    protected $allowedFields = [
        'shipping_account', 
        'ltl_freight', 
        'share_label', 
        'rate_type', 
        'international_shipping',
        'push_company_name', 
        'comments', 
        'modified_on', 
        'modified_by', 
        'shipment_updating_type', 
        'shipping_tracking_source'
    ];
}
