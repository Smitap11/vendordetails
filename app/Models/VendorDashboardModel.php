<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorDashboardModel extends Model
{
    protected $table = 'businessdetails';
    protected $primaryKey = 'businessId';

    public function getAllCategories()
    {
        return $this->db->table('vendordashboardcategory')->select('categoryName')->get()->getResultArray();
    }

    public function getFilteredData($filters)
    {
        $builder = $this->db->table('businessdetails')
        ->join('contactinformation', 'contactinformation.businessId = businessdetails.businessId', 'left')
        ->join('vendorsetting', 'vendorsetting.businessId = businessdetails.businessId', 'left')
        ->select('businessdetails.businessUnit, 
                  businessdetails.companyName, 
                  MAX(contactinformation.contactEmail) as contactEmail,
                  businessdetails.businessWebsite AS website, 
                  businessdetails.businessCategory AS category, 
                  vendorsetting.skuPrefix,
                  vendorsetting.vendorManager')
        ->groupBy('businessdetails.businessId');  // Group by businessId to get a unique row
    

        // Apply filters if provided
        if (!empty($filters['companyName'])) $builder->like('businessdetails.companyName', $filters['companyName'], 'both'); // 'both' applies wildcard around the search term
        if (!empty($filters['contactNumber'])) $builder->like('contactinformation.contactNumber', $filters['contactNumber'], 'both');
        if (!empty($filters['category'])) $builder->where('businessdetails.businessCategory', $filters['category']);
        if (!empty($filters['vendorManager'])) $builder->where('vendorsetting.vendorManager', $filters['vendorManager']);
        if (!empty($filters['email'])) $builder->like('contactinformation.contactEmail', $filters['email'], 'both');
        if (!empty($filters['sku'])) $builder->like('vendorsetting.skuPrefix', $filters['sku'], 'both');
        if (!empty($filters['website'])) $builder->like('businessdetails.businessWebsite', $filters['website'], 'both');
        if (!empty($filters['businessUnit'])) $builder->where('businessdetails.businessUnit', $filters['businessUnit']);

        return $builder->get()->getResultArray();
    }

    }
