<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorDashboardModel extends Model
{

    protected $table = 'businessdetails';
    
    public function searchVendors($companyName = null, $contactNumber = null, $website = null, $contactEmail = null, $businessUnit = null, $type = null, $category = null)
{
    $builder = $this->db->table('businessdetails as bd');
    $builder->select('
        bd.businessUnit, 
        vs.vendorSettingType AS type, 
        bd.companyName, 
        NULL AS orderProcessingEmail, 
        bd.businessWebsite AS website, 
        bd.businessCategory AS category, 
        NULL AS assignSKU, 
        vs.vendorManager
    ');
    
    // Update the join condition based on actual relationship
    $builder->join('contactinformation ci', 'bd.businessId = ci.businessId', 'left'); 
    $builder->join('vendorsetting vs', 'bd.companyName = vs.companyName', 'left');

    // Apply conditions for each search field
    if ($companyName) {
        $builder->like('bd.companyName', $companyName);
    }
    if ($contactNumber) {
        $builder->like('ci.contactNumber', $contactNumber);
    }
    if ($website) {
        $builder->like('bd.businessWebsite', $website);
    }
    if ($contactEmail) {
        $builder->like('ci.contactEmail', $contactEmail);
    }
    if ($businessUnit) {
        $builder->like('bd.businessUnit', $businessUnit);
    }
    if ($type) {
        $builder->like('vs.vendorSettingType', $type);
    }
    if ($category) {
        $builder->like('bd.businessCategory', $category);
    }

    // Execute and return the result
    $query = $builder->get();
    return $query->getResult();
}

    



    
    // public function getCategories()
    // {
    //     protected $table = 'vendordashboardcategory';
    //     protected $primaryKey = 'categoryId';
    //     protected $allowedFields = ['categoryName'];

    //     return $this->findAll();
    // }

    
}
